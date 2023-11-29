<?php

namespace App\Http\Controllers\Api\User;

use Auth;
use Session;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Language;
use App\Models\BankPayment;
use App\Models\Flutterwave;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\PaypalPayment;
use App\Models\StripePayment;
use App\Models\RazorpayPayment;
use App\Models\InstamojoPayment;
use App\Models\PaystackAndMollie;
use App\Models\SslcommerzPayment;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function translator($lang_code){
        $front_lang = Session::put('front_lang', $lang_code);
        config(['app.locale' => $lang_code]);
    }

    public function addToCart(Request $request){

        $this->translator($request->lang_code);

        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        $product_id = $request->product_id;
        $product=Product::findOrFail($product_id);
        $user = Auth::guard('api')->user();
        $shopping_carts = ShoppingCart::get();

        $itemExist = false;

        if($product->product_type=='script'){

            $exist_item = ShoppingCart::where(['user_id' => $user->id, 'product_id' => $product_id, 'price_type' => $request->price_type])->count();

            if($exist_item > 0) {
                $notification = trans('user_validation.Item already exist');
                return response()->json(['message' => $notification], 403);
            }

            $item = new ShoppingCart();
            $item->user_id = $user->id;
            $item->product_id = $product_id;
            $item->category_id = $product->category_id;
            $item->product_type = $request->product_type;
            $item->price_type = $request->price_type;
            $item->author_id = $product->author_id;
            $item->save();

            $notification = trans('user_validation.Product added successfully');
            return response()->json(['message' => $notification]);
        }else{

            $exist_item = ShoppingCart::where(['user_id' => $user->id, 'product_id' => $product_id, 'product_type' => $request->product_type, 'variant_id' => $request->variant_id])->count();

            if($exist_item > 0) {
                $notification = trans('user_validation.Item already exist');
                return response()->json(['message' => $notification], 403);
            }

            $item = new ShoppingCart();
            $item->user_id = $user->id;
            $item->product_id = $product_id;
            $item->variant_id = $request->variant_id;
            $item->category_id = $product->category_id;
            $item->product_type = $request->product_type;
            $item->author_id = $product->author_id;
            $item->save();

            $notification = trans('user_validation.Product added successfully');
            return response()->json(['message' => $notification]);
        }
    }

    public function miniCart(){
        $user = Auth::guard('api')->user();
        $cart_qty=ShoppingCart::where('user_id', $user->id)->get()->count();
        return response()->json([
            'cart_qty' => $cart_qty,
        ]);
    }

    public function cartView(Request $request){
        $this->translator($request->lang_code);
        $setting=Setting::first();
        $carts = ShoppingCart::get();
        $product_arr=[];
        foreach($carts as $cart){
            $product_arr[]=$cart->id;
        }
        $products=Product::whereIn('id', $product_arr)->groupBy('category_id')->select('category_id')->get();
        $category_arr=[];
        foreach($products as $product){
            $category_arr[]=$product->category_id;
        }
        $products=Product::with('productlangfrontend','category', 'author', 'variants')->whereIn('category_id', $category_arr)->whereNotIn('id', $product_arr)->where('status', 1)->get()->take(3);


        return response()->json([
            'carts' => $carts,
            'related_products' => $products,
        ]);
    }

    public function cartItem(Request $request){

        $this->translator($request->lang_code);

        $user = Auth::guard('api')->user();

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
        $total_amount = $sub_total_amount - $discount_amount;

        $product_arr=[];
        foreach($carts as $cart){
            $product_arr[]=$cart->id;
        }
        $products=Product::whereIn('id', $product_arr)->groupBy('category_id')->select('category_id')->get();
        $category_arr=[];
        foreach($products as $product){
            $category_arr[]=$product->category_id;
        }
        $products=Product::with('productlangfrontend','category', 'author', 'variants')->whereIn('category_id', $category_arr)->whereNotIn('id', $product_arr)->where('status', 1)->get()->take(3);

        return response()->json([
            'cart_items' => $carts,
            'sub_total_amount' => $sub_total_amount,
            'discount_amount' => $discount_amount,
            'total_amount' => $total_amount,
            'related_products' => $products,
        ]);
    }

    public function cartRemove(Request $request, $cart_id){
        $this->translator($request->lang_code);
        $cart=ShoppingCart::findOrFail($cart_id);
        $cart->delete();
        $notification = trans('user_validation.Product remove successfully');
        return response()->json(['message' => $notification]);
    }

    public function couponApply(Request $request){
        $this->translator($request->lang_code);
        $rules = [
        'coupon_name' => 'required',
        ];
        $customMessages = [
            'coupon_name.required' => trans('user_validation.Coupon name is required'),
        ];

        $this->validate($request, $rules,$customMessages);

        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity','>=', Carbon::now()->format('Y-m-d'))->where('status', 1)->first();
        $setting=Setting::first();
        $user = Auth::guard('api')->user();
        $carts=ShoppingCart::where('user_id', $user->id)->get();
        if($coupon){
            $coupon_name = $coupon->coupon_name;
            $coupon_discount = $coupon->coupon_discount;

            $notification = trans('user_validation.Coupon apply successfully');

            return response()->json([
                'coupon_name' => $coupon_name,
                'coupon_discount' => $coupon_discount,
                'message' => $notification,
            ]);
        }else{
            $notification = trans('user_validation.Invalid coupon');
            return response()->json(['message' => $notification], 403);
        }
    }

    public function couponCalculation(){
        $this->translator();
        $setting=Setting::select('currency_icon')->first();
        $cartTotal = str_replace(',', '', Cart::total());
        $currencyPosition= session()->get('currency_position');
        $currencyIcon= session()->get('currency_icon');
        if(Session::has('coupon')){
            return response()->json(array(
                'sub_total' => $cartTotal * session()->get('currency_rate'),
                'coupon_name' =>  Session()->get('coupon')['coupon_name'],
                'discount_amount' =>  round(Session()->get('coupon')['discount_amount'] * session()->get('currency_rate'), 2),
                'total_amount' =>  round(Session()->get('coupon')['total_amount'] * session()->get('currency_rate'), 2),
                'setting' =>  $setting,
                'currencyPosition' =>  $currencyPosition,
                'currencyIcon' =>  $currencyIcon,
            ));
        }else{
            return response()->json(array(
                'sub_total' => $cartTotal * session()->get('currency_rate'),
                'setting' =>  $setting,
                'currencyPosition' =>  $currencyPosition,
                'currencyIcon' =>  $currencyIcon,
              ));
        }
    }

    //remove coupon
    public function couponRemove(Request $request){
        $this->translator($request->lang_code);
        $user = Auth::guard('api')->user();
        $carts=ShoppingCart::where('user_id', $user->id)->get();
        $discount =  0;
        $notification = trans('user_validation.Coupon remove successfully');
        return response()->json([
            'discount' => $discount,
            'message' => $notification,
        ]);
    }

    public function checkout(Request $request){
        $this->translator($request->lang_code);
        if(Auth::guard('api')->check()){
            $user = Auth::guard('api')->user();
            $carts=ShoppingCart::where('user_id', $user->id)->get();
            if($carts->count() > 0){
                $personalCarts = Cart::content();
                $author_id_arr = [];
                foreach($carts as $item){
                    $author_id_arr[] = $item->author_id;
                }

                $author_id_arr = array_unique($author_id_arr);

                $is_id=in_array($user->id, $author_id_arr);

                if(!$is_id){
                    $setting=Setting::first();
                    $cartTotal=$carts->sum('price');
                    $product_arr=[];

                    foreach($carts as $cart){
                        $product_arr[]=$cart->product_id;
                    }

                    $products=Product::whereIn('id', $product_arr)->groupBy('category_id')->select('category_id')->get();
                    $category_arr=[];
                    foreach($products as $product){
                        $category_arr[]=$product->category_id;
                    }
                    $products=Product::with('category', 'author', 'variants')->whereIn('category_id', $category_arr)->whereNotIn('id', $product_arr)->where('status', 1)->get()->take(3);
                    $paypal = PaypalPayment::first();
                    $stripe = StripePayment::first();
                    $razorpay = RazorpayPayment::first();
                    $paystack = PaystackAndMollie::first();
                    $mollie = PaystackAndMollie::first();
                    $instamojo = InstamojoPayment::first();
                    $flutterwave = Flutterwave::first();
                    $bankPayment = BankPayment::first();
                    $sslcommerz = SslcommerzPayment::first();
                    return response()->json([
                        'setting' => $setting,
                        'paypal' => $paypal,
                        'stripe' => $stripe,
                        'razorpay' => $razorpay,
                        'related_products' => $products,
                        'paystack' => $paystack,
                        'mollie' => $mollie,
                        'instamojo' => $instamojo,
                        'flutterwave' => $flutterwave,
                        'bankPayment' => $bankPayment,
                        'sslcommerz' => $sslcommerz,
                    ]);
                }else{
                    $notification = trans("You can't purchase personal product");
                    return response()->json(['message' => $notification], 403);
                }
            }else{
                $notification = trans('user_validation.Cart is empty');
                return response()->json(['message' => $notification], 403);
            }
        }else{
            $notification = trans('user_validation.Need to login first');
            return response()->json(['message' => $notification], 403);
        }
    }
}
