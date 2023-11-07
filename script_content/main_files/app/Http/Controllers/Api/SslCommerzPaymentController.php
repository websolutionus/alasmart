<?php

namespace App\Http\Controllers\Api;

use DB;
use Auth;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Language;
use App\Models\OrderItem;
use App\Helpers\MailHelper;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Mail\OrderSuccessfully;
use App\Models\SslcommerzPayment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller
{

    public function translator($lang_code){
        $front_lang = Session::put('front_lang', $lang_code);
        config(['app.locale' => $lang_code]);
    }

    public function sslUrl(){
        config(['sslcommerz.success_url' => '/payment-api/success']);
        config(['sslcommerz.failed_url' => '/payment-api/fail']);
        config(['sslcommerz.cancel_url' => '/payment-api/cancel']);
        config(['sslcommerz.ipn_url' => '/payment-api/ipn']);
    }

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function sendMailToUser($order_details){
        
        MailHelper::setMailConfig();

        $sslcommerz=SslcommerzPayment::first();
        $setting = Setting::first();
        $user = User::whereId($order_details->user_id)->first();
        $order = Order::where('order_id', $order_details->order_id)->first();
        $template=EmailTemplate::where('id',8)->first();
        $subject=$template->subject;
        $message=$template->description;
        $message = str_replace('{{name}}',$user->name,$message);
        $message = str_replace('{{amount}}',$sslcommerz->currency->currency_icon.$order->total_amount * $sslcommerz->currency->currency_rate,$message);
        $message = str_replace('{{order_id}}',$order->order_id,$message);
        Mail::to($user->email)->send(new OrderSuccessfully($message,$subject));
    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        $this->translator($request->lang_code);
        $this->sslUrl();

        $sslcommerz=SslcommerzPayment::with('currency')->first();
        $user=Auth::guard('api')->user();
        $coupon_code = '';
        $coupon_amount = 0;
        if($request->coupon_code && $request->coupon_amount){
            $coupon_code = $request->coupon_code;
            $coupon_amount = $request->coupon_amount;
        }

        Session::put('coupon_code', $coupon_code);
        Session::put('coupon_amount', $coupon_amount);
        

        $calculate_amount = $this->calculate_total_price($user, $coupon_code, $coupon_amount);

        $post_data = array();
        $post_data['total_amount'] = $calculate_amount['total_amount'] * $sslcommerz->currency->currency_rate; # You cant not pay less than 10
        $post_data['currency'] = $sslcommerz->currency->currency_code;
        $post_data['currency_rate'] = $sslcommerz->currency->currency_rate;
        $post_data['tran_id'] = uniqid(); // tran_id must be unique
        

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $user->name;
        $post_data['cus_email'] = $user->email;
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = $sslcommerz->currency->country_code;
        $post_data['cus_phone'] = $user->phone;
        $post_data['cus_fax'] = "";
        $post_data['order_id'] = mt_rand(100000,999999);
        $post_data['user_id'] = $user->id;
        $post_data['payment_method'] = 'sslcommerz';
        $post_data['payment_status'] = 'pending';
        $post_data['currency_icon'] = $sslcommerz->currency->country_icon;
        $post_data['order_status'] = 0;
        $post_data['order_date'] = 0;
        $post_data['order_month'] = 0;
        $post_data['order_year'] = 0;
        $post_data['cart_qty'] = $calculate_amount['cart_qty'];

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transection_id', $post_data['tran_id'])
            ->updateOrInsert([
                'order_id' => $post_data['order_id'],
                'user_id' => $post_data['user_id'],
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'payment_method' => $post_data['payment_method'],
                'payment_status' => $post_data['payment_status'] ,
                'currency_icon' => $post_data['currency_icon'],
                'order_date' => $post_data['order_date'],
                'order_month' => $post_data['order_month'],
                'order_year' => $post_data['order_year'],
                'cart_qty' => $post_data['cart_qty'],
                'total_amount' => $post_data['total_amount'] / $sslcommerz->currency->currency_rate,
                'order_status' => $post_data['order_status'],
                'transection_id' => $post_data['tran_id'],
                'currency_code' => $post_data['currency'],
                'currency_rate' => $post_data['currency_rate'],
                'country_code' => $post_data['cus_country']
            ]);
        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }


    public function success(Request $request)
    {
        $this->sslUrl();
        //echo "Transaction is Successful";
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_details = DB::table('orders')
            ->where('transection_id', $tran_id)
            ->select('id', 'transection_id', 'order_status', 'currency_code', 'total_amount', 'order_id', 'user_id')->first();
        
        if ($order_details->order_status == 0) {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);
            
            if ($validation) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('orders')
                    ->where('transection_id', $tran_id)
                    ->update(['order_status' => 1, 'payment_status' => 'success']);

            $user=Auth::guard('api')->user();

            $coupon_code = '';
            $coupon_amount = 0;

            $session_coupon_code = Session::get('coupon_code');
            $session_coupon_amount = Session::get('coupon_amount');

            if($session_coupon_code && $session_coupon_amount){
                $coupon_code = $session_coupon_code;
                $coupon_amount = $session_coupon_amount;
            }
            
            $this->store_order($user, $order_details, $coupon_code, $coupon_amount);
            }
            return redirect()->route('payment-api.webview-success-payment');
        } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            return redirect()->route('payment-api.webview-faild-payment');
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            return redirect()->route('payment-api.webview-faild-payment');
            echo "Invalid Transaction";
        }


    }

    public function store_order($user, $order_details, $coupon_code, $coupon_amount){
        $carts = ShoppingCart::with('author','category','variant','product')->where('user_id', $order_details->user_id)->get();

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
            $orderItem->order_id=$order_details->order_id;
            $orderItem->product_id=$cart->product_id;
            $orderItem->author_id=$product->author_id;
            $orderItem->user_id=$order_details->user_id;
            $orderItem->product_type=$cart->product_type;
            $orderItem->price_type=$cart->price_type;
            $orderItem->variant_id=$cart->variant_id;
            $orderItem->variant_name= $cart->variant ? $cart->variant->name : '';
            $orderItem->price=$single_price;
            $orderItem->qty=1;
            $orderItem->save();
        }
        $this->sendMailToUser($order_details);

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
        $cart_qty = $carts->count();
        return array(
            'sub_total_amount' => $sub_total_amount,
            'discount_amount' => $discount_amount,
            'total_amount' => $total_amount,
            'cart_qty' => $cart_qty,
        );
    }

    public function fail(Request $request)
    {
        $this->sslUrl();
        $notification = trans('user_validation.Payment Failed!');
        return response()->json(['message' => $notification], 403);
    }

    public function cancel(Request $request)
    {
        $this->sslUrl();
        $notification = trans('user_validation.Payment Canceled!');
        return response()->json(['message' => $notification], 403);
    }

    public function ipn(Request $request)
    {
        $this->sslUrl();
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

    

}
