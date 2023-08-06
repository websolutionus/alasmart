<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Setting;
use App\Models\BankPayment;
use App\Models\Flutterwave;
use Illuminate\Http\Request;
use App\Models\PaypalPayment;
use App\Models\StripePayment;
use App\Models\RazorpayPayment;
use App\Models\InstamojoPayment;
use App\Models\PaystackAndMollie;
use App\Models\SslcommerzPayment;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $product_id){
        if(Session::has('coupon')){
            Session::forget('coupon');
         }
        $product=Product::findOrFail($product_id);
        $itemExist = false;
        $cartContents = Cart::content();
        if($product->product_type=='script'){
            foreach($cartContents as $cartContent){
                if($cartContent->id == $product_id && $cartContent->options->price_type == $request->price_type) {
                    $itemExist = true;
                }
            }
            if($itemExist) {
                $notification = trans('Item already exist');
                return response()->json(['status' => 0, 'message' => $notification]);
            }
            if($request->price_type=='regular price'){
                Cart::add([
                    'id' => $product_id, 
                    'name' => $request->product_name,
                    'qty' => 1,
                    'price' => $request->regular_price,
                    'weight' => 550,
                    'options' => [
                        'variant_id' => $request->variant_id,
                        'variant_name' => $request->variant_name,
                        'category' => $request->category_name,
                        'category_id' => $request->category_id,
                        'product_type'=> $request->product_type,
                        'price_type'=> $request->price_type,
                        'image'=> $request->product_image,
                        'author'=> $request->author_name,
                        'author_id'=> $request->author_id,
                        'slug'=> $request->slug,
                        ]
                ]);
                $notification = trans('Product added successfully');
                return response()->json(['status' => 1, 'message' => $notification]);
            }else{
                //return $request->extend_price;
                Cart::add([
                    'id' => $product_id, 
                    'name' => $request->product_name,
                    'qty' => 1, 
                    'price' => $request->extend_price, 
                    'weight' => 550,
                    'options' => [
                        'variant_id' => $request->variant_id,
                        'variant_name' => $request->variant_name,
                        'category' => $request->category_name,
                        'category_id' => $request->category_id,
                        'product_type'=> $request->product_type,
                        'price_type'=> $request->price_type,
                        'image'=> $request->product_image,
                        'author'=> $request->author_name,
                        'author_id'=> $request->author_id,
                        'slug'=> $request->slug,
                        ]
                ]);
                $notification = trans('Product added successfully');
                return response()->json(['status' => 1, 'message' => $notification]);
            }
        }else{
            foreach($cartContents as $cartContent){
                if($cartContent->id == $request->product_id && $cartContent->options->variant_id == $request->variant_id) {
                    $itemExist = true;
                }
            }
    
            $productStock = Product::find($request->product_id);
    
            if($itemExist) {
                $notification = trans('Item already exist');
                return response()->json(['status' => 0, 'message' => $notification]);
            }
            Cart::add([
                'id' => $product_id, 
                'name' => $request->product_name,
                'qty' => 1, 
                'price' => $request->price, 
                'weight' => 550,
                'options' => [
                    'variant_id' => $request->variant_id,
                    'variant_name' => $request->variant_name,
                    'category' => $request->category_name,
                    'category_id' => $request->category_id,
                    'product_type'=> $request->product_type,
                    'price_type'=> $request->price_type,
                    'image'=> $request->product_image,
                    'author'=> $request->author_name,
                    'author_id'=> $request->author_id,
                    'slug'=> $request->slug,
                ]
            ]);
            $notification = trans('Product added successfully');
            return response()->json(['status' => 1, 'message' => $notification]);
        }
    }

    public function miniCart(){
        $cartQty=Cart::count();
        return response()->json([
            'cartQty' => $cartQty,
        ]);
    }

    public function cartView(){
        $active_theme = 'layout';
        $setting=Setting::first();
        $carts=Cart::content();
        $product_arr=[];
        foreach($carts as $cart){
            $product_arr[]=$cart->id;
        }
        $products=Product::whereIn('id', $product_arr)->groupBy('category_id')->select('category_id')->get();
        $category_arr=[];
        foreach($products as $product){
            $category_arr[]=$product->category_id;
        }
        $related_products=Product::with('category', 'author', 'variants')->whereIn('category_id', $category_arr)->whereNotIn('id', $product_arr)->where('status', 1)->get()->take(3);
        return view('cart_view')->with([
            'active_theme' => $active_theme,
            'setting' => $setting,
            'carts' => $carts,
            'related_products' =>$related_products,
        ]);
    }

    public function cartItem(){
        $setting=Setting::first();
        $carts=Cart::content();
        $cartQty=Cart::count();
        $cartTotal=Cart::total();
        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
            'setting' => $setting,
        ]);
    }

    public function cartRemove($rowId){
        $cart=Cart::remove($rowId);
        if(Session::has('coupon')){
            $coupon_name =  Session()->get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon', [
                'coupon_name'=>$coupon->coupon_name,
                'coupon_discount'=>$coupon->coupon_discount,
                'discount_amount'=>round(Cart::totalFloat() * (int)$coupon->coupon_discount / 100),
                'total_amount'=>round(Cart::totalFloat() - Cart::totalFloat() * (int)$coupon->coupon_discount / 100),
            ]);
        }
        $notification = trans('Product remove successfully');
        return response()->json(['status' => 1, 'message' => $notification]);
    }

    public function couponApply(Request $request){
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity','>=', Carbon::now()->format('Y-m-d'))->where('status', 1)->first();
     if($coupon){
        Session::put('coupon', [
            'coupon_name'=>$coupon->coupon_name,
            'coupon_discount'=>$coupon->coupon_discount,
            'discount_amount'=>round(Cart::totalFloat() * (int)$coupon->coupon_discount / 100),
            'total_amount'=>round(Cart::totalFloat() - Cart::totalFloat() * (int)$coupon->coupon_discount / 100)
        ]);
        $notification = trans('Coupon apply successfully');
        return response()->json(['status' => 1, 'message' => $notification]);
     }else{
        $notification = trans('Invalid coupon');
        return response()->json(['status' => 0, 'message' => $notification]);
     }
    }

    public function couponCalculation(){
        $setting=Setting::select('currency_icon')->first();
        $cartTotal = str_replace(',', '', Cart::total());
        if(Session::has('coupon')){
        return response()->json(array(
            'sub_total' =>  $cartTotal,
            'coupon_name' =>  Session()->get('coupon')['coupon_name'],
            'discount_amount' =>  Session()->get('coupon')['discount_amount'],
            'total_amount' =>  Session()->get('coupon')['total_amount'],
            'setting' =>  $setting,
          ));
        }else{
            return response()->json(array(
                'total' =>  $cartTotal,
                'setting' =>  $setting,
              ));
        }
    }

    //remove coupon
    public function couponRemove(){
        Session::forget("coupon");
        $notification = trans('Coupon remove successfully');
        return response()->json(['status' => 1, 'message' => $notification]);
    }

    public function checkout(){
        if(Auth::guard('web')->check()){
            if(Cart::total()>0){
                $personalCarts=Cart::content();
                $author_id_arr=[];
                foreach($personalCarts as $item){
                    $author_id_arr[] = $item->options->author_id;
                }

                $author_id_arr = array_unique($author_id_arr);
                $user_id = Auth::guard('web')->user()->id;
                $is_id=in_array($user_id, $author_id_arr);
                
                if(!$is_id){
                    $active_theme = 'layout';
                    $setting=Setting::first();
                    $carts=Cart::content();
                    $cartQty=Cart::count();
                    $cartTotal=str_replace(',', '', Cart::total());
                    $product_arr=[];
                    foreach($carts as $cart){
                        $product_arr[]=$cart->id;
                    }
                    $products=Product::whereIn('id', $product_arr)->groupBy('category_id')->select('category_id')->get();
                    $category_arr=[];
                    foreach($products as $product){
                        $category_arr[]=$product->category_id;
                    }
                    $related_products=Product::with('category', 'author', 'variants')->whereIn('category_id', $category_arr)->whereNotIn('id', $product_arr)->where('status', 1)->get()->take(3);
                    $paypal = PaypalPayment::first();
                    $stripe = StripePayment::first();
                    $razorpay = RazorpayPayment::first();
                    $paystack = PaystackAndMollie::first();
                    $mollie = PaystackAndMollie::first();
                    $instamojo = InstamojoPayment::first();
                    $flutterwave = Flutterwave::first();
                    $bankPayment = BankPayment::first();
                    $sslcommerz = SslcommerzPayment::first();
                    return view('checkout')->with([
                        'active_theme' => $active_theme,
                        'setting' => $setting,
                        'carts' => $carts,
                        'cartQty' => $cartQty,
                        'cartTotal' => $cartTotal,
                        'paypal' => $paypal,
                        'stripe' => $stripe,
                        'razorpay' => $razorpay,
                        'related_products' => $related_products,
                        'paystack' => $paystack,
                        'mollie' => $mollie,
                        'instamojo' => $instamojo,
                        'flutterwave' => $flutterwave,
                        'bankPayment' => $bankPayment,
                        'sslcommerz' => $sslcommerz,
                    ]);
                }else{
                    $notification = trans("You can't purchase personal product");
                    $notification=array('messege'=>$notification,'alert-type'=>'error');
                    return back()->with($notification);
                }
            }else{
                $notification = trans('Cart is empty');
                $notification=array('messege'=>$notification,'alert-type'=>'error');
                return redirect()->route('products')->with($notification);
            }
        }else{
            $notification = trans('Need to login first');
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('login')->with($notification);
        }
    }
}
