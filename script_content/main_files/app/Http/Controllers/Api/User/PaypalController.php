<?php

namespace App\Http\Controllers\Api\User;

use Str;
use Auth;
use Cart;
use Mail;
use Session;
use Carbon\Carbon;
use PayPal\Api\Item;
use App\Models\Order;
use PayPal\Api\Payer;
use App\Models\Coupon;
use PayPal\Api\Amount;
use App\Models\Product;
use App\Models\Service;

use App\Models\Setting;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use App\Models\Language;
use PayPal\Api\ItemList;
use App\Models\OrderItem;
use App\Helpers\MailHelper;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\Models\EmailTemplate;
use App\Models\PaypalPayment;
use App\Mail\OrderSuccessfully;
use App\Models\BreadcrumbImage;
use PayPal\Api\PaymentExecution;
use App\Models\AdditionalService;
use App\Http\Controllers\Controller;
use PayPal\Auth\OAuthTokenCredential;

class PaypalController extends Controller
{

    private $apiContext;
    public function __construct()
    {
        $account = PaypalPayment::first();
        $paypal_conf = \Config::get('paypal');
        $this->apiContext = new ApiContext(new OAuthTokenCredential(
            $account->client_id,
            $account->secret_id,
            )
        );

        $setting=array(
            'mode' => $account->account_mode,
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'ERROR'
        );
        $this->apiContext->setConfig($setting);
    }

    public function translator($lang_code){
        $front_lang = Session::put('front_lang', $lang_code);
        config(['app.locale' => $lang_code]);
    }

    public function paypal_webview(Request $request){
        
        $this->translator($request->lang_code);
        Session::forget('lang_code');
        Session::put('lang_code', $request->lang_code);

        $user = Auth::guard('api')->user();

        $coupon_code = '';
        $coupon_amount = 0;
        if($request->coupon_code && $request->coupon_amount){
            $coupon_code = $request->coupon_code;
            $coupon_amount = $request->coupon_amount;
        }

        $calculate_amount = $this->calculate_total_price($user, $coupon_code, $coupon_amount);
        
        $paypalSetting = PaypalPayment::with('currency')->first();
        $payableAmount = round($calculate_amount['total_amount'] * $paypalSetting->currency->currency_rate,2);

        $name = env('APP_NAME');

        // set payer
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // set amount total
        $amount = new Amount();
        $amount->setCurrency($paypalSetting->currency->currency_code)
            ->setTotal($payableAmount);

        // transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription(env('APP_NAME'));

        // redirect url
        $redirectUrls = new RedirectUrls();

        $redirectUrls->setReturnUrl(route('payment-api.paypal-webview-success'))
            ->setCancelUrl(route('payment-api.webview-faild-payment'));

        // payment
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            return redirect()->route('payment-api.webview-faild-payment');
        }

        // get paymentlink
        $approvalUrl = $payment->getApprovalLink();

        Session::put('auth_user', $user);
        Session::put('coupon_code', $coupon_code);
        Session::put('coupon_amount', $coupon_amount);

        return redirect($approvalUrl);
    }

    public function paypal_webview_success(Request $request){

        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            return redirect()->route('payment-api.webview-faild-payment');
        }

        $payment_id=$request->get('paymentId');
        $payment = Payment::get($payment_id, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {

            $user = Session::get('auth_user');

            $coupon_code = '';
            $coupon_amount = 0;

            $session_coupon_code = Session::get('coupon_code');
            $session_coupon_amount = Session::get('coupon_amount');

            if($session_coupon_code && $session_coupon_amount){
                $coupon_code = $session_coupon_code;
                $coupon_amount = $session_coupon_amount;
            }

            $this->store_order($user, 'Paypal', 'success', $payment_id, $coupon_code, $coupon_amount);

            return redirect()->route('payment-api.webview-success-payment');

        }else{
            return redirect()->route('payment-api.webview-faild-payment');
        }
    }

    public function store_order($user, $payment_method, $payment_status, $transection, $coupon_code, $coupon_amount){
        $carts = ShoppingCart::with('author','category','variant','product')->where('user_id', $user->id)->get();

        $sub_total_amount = 0.00;
        foreach($carts as $cart){
            if($cart->product_type == 'script'){
                if($cart->price_type == 'regular_price'){
                    $sub_total_amount += $cart->product->regular_price;
                }elseif($cart->price_type == 'extend_price'){
                    $sub_total_amount += $cart->product->extend_price;
                }
            }else{
                $sub_total_amount += $cart->variant->price;
            }
        }

        $discount_amount = 0.00;

        if($coupon_code){
            $coupon = Coupon::where('coupon_name', $coupon_code)->where('coupon_validity','>=', Carbon::now()->format('Y-m-d'))->where('status', 1)->first();
            if($coupon){
                $discount_amount = $coupon_amount;
            }
        }

        $total_amount = $sub_total_amount - $discount_amount;


        $order= new Order();
        $order->order_id=mt_rand(100000,999999);
        $order->user_id=$user->id;
        $order->total_amount = $total_amount;
        $order->payment_method=$payment_method;
        $order->payment_status= $payment_status;
        $order->transection_id= $transection;
        $order->order_status= $payment_status == 'pending' ? 0 : 1;
        $order->order_date=Carbon::now()->format('Y-m-d');
        $order->order_month=Carbon::now()->format('m');
        $order->order_year=Carbon::now()->format('Y');
        $order->cart_qty=$carts->count();
        $order->save();

        foreach($carts as $cart){
            $product=Product::where('id', $cart->product_id)->first();

            $single_price = 0.00;

            if($cart->product_type == 'script'){
                if($cart->price_type == 'regular_price'){
                    $single_price = $cart->product->regular_price;
                }elseif($cart->price_type == 'extend_price'){
                    $single_price = $cart->product->extend_price;
                }
            }else{
                $single_price = $cart->variant->price;
            }


            $orderItem = new OrderItem();
            $orderItem->order_id=$order->id;
            $orderItem->product_id=$cart->product_id;
            $orderItem->author_id=$product->author_id;
            $orderItem->user_id=$user->id;
            $orderItem->product_type=$cart->product_type;
            $orderItem->price_type=$cart->price_type;
            $orderItem->variant_id=$cart->variant_id;
            $orderItem->variant_name= $cart->variant ? $cart->variant->name : '';
            $orderItem->price=$single_price;
            $orderItem->qty=1;
            $orderItem->save();
        }
        $this->sendMailToUser($user, $order);

        Session::forget('coupon_code');
        Session::forget('coupon_amount');
        // ShoppingCart::where('user_id', $user->id)->delete();
    }

    public function calculate_total_price($user, $coupon_code, $coupon_amount){
        $carts = ShoppingCart::with('variant','product')->where('user_id', $user->id)->get();
        $sub_total_amount = 0.00;
        foreach($carts as $cart){
            if($cart->product_type == 'script'){
                if($cart->price_type == 'regular_price'){
                    $sub_total_amount += $cart->product->regular_price;
                }elseif($cart->price_type == 'extend_price'){
                    $sub_total_amount += $cart->product->extend_price;
                }
            }else{
                $sub_total_amount += $cart->variant->price;
            }
        }

        $discount_amount = 0.00;

        if($coupon_code){
            $coupon = Coupon::where('coupon_name', $coupon_code)->where('coupon_validity','>=', Carbon::now()->format('Y-m-d'))->where('status', 1)->first();
            if($coupon){
                $discount_amount = $coupon_amount;
            }
        }

        $total_amount = $sub_total_amount - $discount_amount;

        return array(
            'sub_total_amount' => $sub_total_amount,
            'discount_amount' => $discount_amount,
            'total_amount' => $total_amount,
        );
    }

    public function sendMailToUser($user, $order){
        MailHelper::setMailConfig();

        $setting = Setting::first();

        $template=EmailTemplate::where('id',8)->first();
        $subject=$template->subject;
        $message=$template->description;
        $message = str_replace('{{name}}',$user->name,$message);
        $message = str_replace('{{amount}}',$setting->currency_icon.$order->total_amount,$message);
        $message = str_replace('{{order_id}}',$order->order_id,$message);
        Mail::to($user->email)->send(new OrderSuccessfully($message,$subject));
    }


}