<?php

namespace App\Http\Controllers\Api\User;

use Str;
use Auth;


use Cart;
use Mail;
use Session;
use Redirect;
use Exception;
use Carbon\Carbon;
use App\Models\Order;
use Razorpay\Api\Api;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Language;


use App\Models\Schedule;
Use Stripe;
use App\Models\OrderItem;
use App\Helpers\MailHelper;
use App\Models\BankPayment;
use App\Models\Flutterwave;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

use App\Models\EmailTemplate;


use App\Models\PaypalPayment;
use App\Models\StripePayment;
use App\Mail\OrderSuccessfully;
use App\Models\BreadcrumbImage;
use App\Models\PaymongoPayment;
use App\Models\RazorpayPayment;
use App\Models\InstamojoPayment;
use App\Models\AdditionalService;
use App\Models\PaystackAndMollie;
use App\Models\SslcommerzPayment;
use Illuminate\Support\Facades\DB;
use Mollie\Laravel\Facades\Mollie;
use App\Models\AppointmentSchedule;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('razorpay_webview_payment','webview_success_payment','webview_faild_payment','flutterwave_webview_payment','mollie_webview_payment','paystack_webview_payment','instamojo_webview_payment');
    }

    public function translator($lang_code){
        $front_lang = Session::put('front_lang', $lang_code);
        config(['app.locale' => $lang_code]);
    }

    public function payment_info(){

        $paypal = PaypalPayment::with('currency')->first();
        $stripe = StripePayment::with('currency')->first();
        $razorpay = RazorpayPayment::with('currency')->first();
        $paystack = PaystackAndMollie::with('paystackcurrency')->first();
        $mollie = PaystackAndMollie::with('molliecurrency')->first();
        $instamojo = InstamojoPayment::with('currency')->first();
        $flutterwave = Flutterwave::with('currency')->first();
        $bankPayment = BankPayment::first();
        $sslcommerz = SslcommerzPayment::with('currency')->first();

        return response()->json([
            'paypal' => $paypal,
            'stripe' => $stripe,
            'razorpay' => $razorpay,
            'paystack' => $paystack,
            'mollie' => $mollie,
            'instamojo' => $instamojo,
            'flutterwave' => $flutterwave,
            'bankPayment' => $bankPayment,
            'sslcommerz' => $sslcommerz,
        ]);
    }


    public function bankPayment(Request $request){
        $this->translator($request->lang_code);
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('user_validation.This Is Demo Version. You Can Not Change Anything');
            return response()->json(['message' => $notification], 403);
        }

        $rules = [
            'tnx_info'=>'required',
        ];
        $customMessages = [
            'tnx_info.required' => trans('user_validation.Transaction is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user=Auth::guard('api')->user();

        $coupon_code = '';
        $coupon_amount = 0;
        if($request->coupon_code && $request->coupon_amount){
            $coupon_code = $request->coupon_code;
            $coupon_amount = $request->coupon_amount;
        }


        $this->store_order($user, 'bank_account', 'pending', $request->tnx_info, $coupon_code, $coupon_amount);

        $notification = trans('user_validation.Your order has been submited, wait for admin approval');
        return response()->json(['message' => $notification]);
    }

    public function payWithStripe(Request $request){
        $this->translator($request->lang_code);
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('user_validation.This Is Demo Version. You Can Not Change Anything');
            return response()->json(['message' => $notification], 403);
        }
    
        
        $rules = [
            "card_number" => "required",
            "year" => "required",
            "month" => "required",
            "cvc" => "required",
        ];

        $customMessages = [
            "card_number.required" => trans('user_validation.Card number is required'),
            "year.required" => trans('user_validation.Year is required'),
            "month.required" => trans('user_validation.Month is required'),
            "cvc.required" => trans('user_validation.CVC is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $stripe = StripePayment::with('currency')->first();

        $user=Auth::guard('api')->user();

        $coupon_code = '';
        $coupon_amount = 0;
        if($request->coupon_code && $request->coupon_amount){
            $coupon_code = $request->coupon_code;
            $coupon_amount = $request->coupon_amount;
        }

        $calculate_amount = $this->calculate_total_price($user, $coupon_code, $coupon_amount);

        $payableAmount = round($calculate_amount['total_amount'] * $stripe->currency->currency_rate, 2);
        Stripe\Stripe::setApiKey($stripe->stripe_secret);

        $token = Stripe\Token::create([
            "card" => [
                "number" => $request->card_number,
                "exp_month" => $request->month,
                "exp_year" => $request->year,
                "cvc" => $request->cvc,
            ],
        ]);

        return $token;
        try {
            $token = Stripe\Token::create([
                "card" => [
                    "number" => $request->card_number,
                    "exp_month" => $request->month,
                    "exp_year" => $request->year,
                    "cvc" => $request->cvc,
                ],
            ]);
        } catch (Exception $e) {
            return response()->json(
                ["error" => trans('user_validation.Please provide valid card information')],
                403
            );
        }

        if (!isset($token["id"])) {
            return response()->json(["error" => trans('user_validation.Payment Failed')], 403);
        }

        

        $result = Stripe\Charge::create([
            "card" => $token["id"],
            "currency" => $stripe->currency->currency_code,
            "amount" => $payableAmount * 100,
            "description" => env("APP_NAME"),
        ]);

        if ($result["status"] != "succeeded") {
            return response()->json(["error" => trans('user_validation.Payment Failed')], 403);
        }

        $transaction_id = $result["balance_transaction"];

        $this->store_order($user, 'Stripe', 'success', $transaction_id, $coupon_code, $coupon_amount);

        $notification = trans('user_validation.Thanks for your new order');
        return response()->json(['message' => $notification]);
    }

    public function razorpay_webview(Request $request){
        $this->translator($request->lang_code);
        Session::forget('lang_code');
        $razorpay = RazorpayPayment::with('currency')->first();

        $user = Auth::guard('api')->user();

        Session::put('auth_user', $user);

        $coupon_code = '';
        $coupon_amount = 0;
        if($request->coupon_code && $request->coupon_amount){
            $coupon_code = $request->coupon_code;
            $coupon_amount = $request->coupon_amount;
        }
        
        
        $calculate_amount = $this->calculate_total_price($user, $coupon_code, $coupon_amount);

        Session::put('coupon_code', $coupon_code);
        Session::put('coupon_amount', $coupon_amount);
        Session::put('lang_code', $request->lang_code);
        return view('razorpay_webview', compact('razorpay','user','calculate_amount'));
    }

    public function razorpay_webview_payment(Request $request){
        
        $user = Session::get('auth_user');
        $razorpay = RazorpayPayment::with('currency')->first();
        $input = $request->all();
        $api = new Api($razorpay->key,$razorpay->secret_key);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $payId = $response->id;

                $coupon_code = '';
                $coupon_amount = 0;

                $session_coupon_code = Session::get('coupon_code');
                $session_coupon_amount = Session::get('coupon_amount');

                if($session_coupon_code && $session_coupon_amount){
                    $coupon_code = $session_coupon_code;
                    $coupon_amount = $session_coupon_amount;
                }

                $this->store_order($user, 'Razorpay', 'success', $payId, $coupon_code, $coupon_amount);

                return redirect()->route('payment-api.webview-success-payment');

            }catch (Exception $e) {
                return redirect()->route('payment-api.webview-faild-payment');
            }
        }else{
            return redirect()->route('payment-api.webview-faild-payment');
        }
    }

    public function flutterwave_webview(Request $request){
        
        $this->translator($request->lang_code);
        Session::forget('lang_code');
        Session::put('lang_code', $request->lang_code);

        $flutterwave = Flutterwave::with('currency')->first();

        $user = Auth::guard('api')->user();

        Session::put('auth_user', $user);

        $coupon_code = '';
        $coupon_amount = 0;
        if($request->coupon_code && $request->coupon_amount){
            $coupon_code = $request->coupon_code;
            $coupon_amount = $request->coupon_amount;
        }

        $calculate_amount = $this->calculate_total_price($user, $coupon_code, $coupon_amount);

        Session::put('coupon_code', $coupon_code);
        Session::put('coupon_amount', $coupon_amount);

        return view('flutterwave_webview', compact('flutterwave','user','calculate_amount'));
    }

    public function flutterwave_webview_payment(Request $request){
        $lang_code = Session::get('lang_code');

        $this->translator($lang_code);

        $user = Session::get('auth_user');

        $flutterwave = Flutterwave::with('currency')->first();
        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $flutterwave->secret_key;
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if($response->status == 'success'){

            $coupon_code = '';
            $coupon_amount = 0;

            $session_coupon_code = Session::get('coupon_code');
            $session_coupon_amount = Session::get('coupon_amount');

            if($session_coupon_code && $session_coupon_amount){
                $coupon_code = $session_coupon_code;
                $coupon_amount = $session_coupon_amount;
            }

            $this->store_order($user, 'Flutterwave', 'success', $tnx_id, $coupon_code, $coupon_amount);

            $notification = trans('user_validation.Thanks for your new order');
            return response()->json(['status' => 'success' , 'message' => $notification]);
        }else{
            $notification = trans('Payment Faild');
            return response()->json(['status' => 'faild' , 'message' => $notification]);
        }
    }

    public function mollie_webview(Request $request){
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

        $mollie = PaystackAndMollie::with('molliecurrency')->first();
        $price = $calculate_amount['total_amount'] * $mollie->molliecurrency->currency_rate;
        $price = round($price,2);
        $price = sprintf('%0.2f', $price);

        $mollie_api_key = $mollie->mollie_key;
        $currency = strtoupper($mollie->molliecurrency->currency_code);
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $currency,
                'value' => ''.$price.'',
            ],
            'description' => env('APP_NAME'),
            'redirectUrl' => route('payment-api.mollie-webview-payment'),
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);
        session()->put('payment_id',$payment->id);
        session()->put('auth_user',$user);
        Session::put('coupon_code', $coupon_code);
        Session::put('coupon_amount', $coupon_amount);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function mollie_webview_payment(Request $request){

        $user = Session::get('auth_user');
        $mollie = PaystackAndMollie::with('molliecurrency')->first();
        $mollie_api_key = $mollie->mollie_key;
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments->get(session()->get('payment_id'));
        if ($payment->isPaid()){

            $coupon_code = '';
            $coupon_amount = 0;

            $session_coupon_code = Session::get('coupon_code');
            $session_coupon_amount = Session::get('coupon_amount');

            if($session_coupon_code && $session_coupon_amount){
                $coupon_code = $session_coupon_code;
                $coupon_amount = $session_coupon_amount;
            }

            $this->store_order($user, 'Mollie', 'success', session()->get('payment_id'), $coupon_code, $coupon_amount);

            return redirect()->route('payment-api.webview-success-payment');
        }else{
            return redirect()->route('payment-api.webview-faild-payment');
        }
    }

    public function paystack_webview(Request $request){

        $this->translator($request->lang_code);
        Session::forget('lang_code');
        Session::put('lang_code', $request->lang_code);

        $mollie = PaystackAndMollie::with('paystackcurrency')->first();
        $paystack = $mollie;

        $user = Auth::guard('api')->user();

        $coupon_code = '';
        $coupon_amount = 0;
        if($request->coupon_code && $request->coupon_amount){
            $coupon_code = $request->coupon_code;
            $coupon_amount = $request->coupon_amount;
        }

        $calculate_amount = $this->calculate_total_price($user, $coupon_code, $coupon_amount);

        Session::put('auth_user', $user);
        Session::put('coupon_code', $coupon_code);
        Session::put('coupon_amount', $coupon_amount);

        return view('paystack_webview', compact('paystack','user','calculate_amount'));
    }

    public function paystack_webview_payment(Request $request){

        $lang_code = Session::get('lang_code');
        $this->translator($lang_code);

        $user = Session::get('auth_user');
        $paystack = PaystackAndMollie::with('paystackcurrency')->first();

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $paystack->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST =>0,
            CURLOPT_SSL_VERIFYPEER =>0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $final_data = json_decode($response);
        if($final_data->status == true) {

            $coupon_code = '';
            $coupon_amount = 0;

            $session_coupon_code = Session::get('coupon_code');
            $session_coupon_amount = Session::get('coupon_amount');

            if($session_coupon_code && $session_coupon_amount){
                $coupon_code = $session_coupon_code;
                $coupon_amount = $session_coupon_amount;
            }

            $this->store_order($user, 'Paystack', 'success', $transaction, $coupon_code, $coupon_amount);

            $notification = trans('user_validation.Thanks for your new order');
            return response()->json(['status' => 'success' , 'message' => $notification]);
        }else{
            $notification = trans('user_validation.Payment Faild');
            return response()->json(['status' => 'faild' , 'message' => $notification]);
        }
    }


    public function instamojo_webview(Request $request){

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

        $instamojoPayment = InstamojoPayment::with('currency')->first();
        $price = $calculate_amount['total_amount'] * $instamojoPayment->currency->currency_rate;
        $price = round($price,2);

        $environment = $instamojoPayment->account_mode;
        $api_key = $instamojoPayment->api_key;
        $auth_token = $instamojoPayment->auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url.'payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $payload = Array(
            'purpose' => env("APP_NAME"),
            'amount' => $price,
            'phone' => '918160651749',
            'buyer_name' => Auth::user()->name,
            'redirect_url' => route('payment-api.instamojo-webview-payment'),
            'send_email' => true,
            'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => Auth::user()->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        Session::put('auth_user', $user);
        Session::put('coupon_code', $coupon_code);
        Session::put('coupon_amount', $coupon_amount);

        return redirect($response->payment_request->longurl);
    }

    public function instamojo_webview_payment(Request $request){

        $lang_code = Session::get('lang_code');
        $this->translator($lang_code);
        
        $user = Session::get('auth_user');

        $input = $request->all();
        $instamojoPayment = InstamojoPayment::with('currency')->first();
        $environment = $instamojoPayment->account_mode;
        $api_key = $instamojoPayment->api_key;
        $auth_token = $instamojoPayment->auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.'payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            return redirect()->route('payment-api.webview-faild-payment');
        } else {
            $data = json_decode($response);
        }

        if($data->success == true) {
            if($data->payment->status == 'Credit') {

                $coupon_code = '';
                $coupon_amount = 0;

                $session_coupon_code = Session::get('coupon_code');
                $session_coupon_amount = Session::get('coupon_amount');

                if($session_coupon_code && $session_coupon_amount){
                    $coupon_code = $session_coupon_code;
                    $coupon_amount = $session_coupon_amount;
                }

                $this->store_order($user, 'Instamojo', 'success', $request->get('payment_id'), $coupon_code, $coupon_amount);

                return redirect()->route('payment-api.webview-success-payment');
            }
        }else{
            return redirect()->route('payment-api.webview-faild-payment');
        }
    }

    public function webview_success_payment(){
        $lang_code = Session::get('lang_code');
        $this->translator($lang_code);
        $notification = trans('user_validation.Thanks for your new order');
        return response()->json(['message' => $notification]);

    }

    public function webview_faild_payment(){
        $lang_code = Session::get($lang_code);
        $this->translator($request->lang_code);
        $notification = trans('Payment Faild');
        return response()->json(['message' => $notification],403);
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
        $order->discount_amount = $discount_amount;
        $order->sub_total_amount = $sub_total_amount;
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
