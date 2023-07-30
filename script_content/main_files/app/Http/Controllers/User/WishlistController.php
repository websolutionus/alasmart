<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class WishlistController extends Controller
{
    public function add_wishlist(Request $request, $product_id){
        if(Auth::guard('web')->check()){
            $product=Product::where('id', $product_id)->first();
            $user_id=Auth::guard('web')->user()->id;
            $author_id=$product->author_id;
              $exist=Wishlist::where('product_id', $product_id)->where('user_id', $user_id)->first();
              if(!$exist){
                 $insert= new Wishlist();
                 $insert->user_id=$user_id;
                 $insert->product_id=$product_id;
                 $insert->author_id=$author_id;
                 $insert->save();
                 return response()->json(['success'=>'Successfully added your wishlist']);
              }else{
                 return response()->json(['error'=>'This product allready exist']);
              } 
            }else{
             return response()->json(['error'=>'At first login your acount']);
            }
    }
}
