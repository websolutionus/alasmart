<?php

namespace App\Http\Controllers\Api\User;

use Auth;
use Session;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function translator($lang_code){
        $front_lang = Session::put('front_lang', $lang_code);
        config(['app.locale' => $lang_code]);
    }

    public function wishlist(Request $request){
        $this->translator($request->lang_code);
        $setting = Setting::first();
        $user = Auth::guard('api')->user();
        $wishlists=Wishlist::with('product')->where('user_id', $user->id)->get();

        return response()->json([
            'user' => $user,
            'wishlists' => $wishlists,
            'setting' => $setting,
        ]);
    }

    public function add_wishlist(Request $request, $product_id){
        $this->translator($request->lang_code);
        if(Auth::guard('api')->check()){
            $product=Product::where('id', $product_id)->first();
            $user_id=Auth::guard('api')->user()->id;
            $author_id=$product->author_id;
              $exist=Wishlist::where('product_id', $product_id)->where('user_id', $user_id)->first();
              if(!$exist){
                 $insert= new Wishlist();
                 $insert->user_id=$user_id;
                 $insert->product_id=$product_id;
                 $insert->author_id=$author_id;
                 $insert->save();
                 $message = trans('user_validation.Successfully added your wishlist');
                 return response()->json(['message' => $message]);
              }else{
                $message = trans('user_validation.This product allready exist');
                return response()->json(['message' => $message], 403);
              } 
            }else{
                $message = trans('user_validation.At first login your account');
                return response()->json(['message' => $message], 403);
            }
    }

    public function delete_wishlist(Request $request, $id){
        $this->translator($request->lang_code);
        $wishlist=Wishlist::whereId($id)->delete();
        $notification = trans('user_validation.Successfully deleted');
        return response()->json(['message' => $notification]);
     }
}
