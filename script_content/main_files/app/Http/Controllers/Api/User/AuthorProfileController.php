<?php

namespace App\Http\Controllers\Api\User;

use Str;
use Auth;
use File;
use Hash;
use Slug;
use Image;
use Session;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Ticket;

use App\Rules\Captcha;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Language;
use App\Models\Wishlist;
use App\Models\OrderItem;

use App\Events\SellerToUser;
use Illuminate\Http\Request;
use App\Models\RefundRequest;
use App\Models\TicketMessage;
use App\Models\ProductVariant;
use App\Models\BreadcrumbImage;
use App\Models\GoogleRecaptcha;
use App\Models\MessageDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class AuthorProfileController extends Controller
{
    public function translator($lang_code){
        $front_lang = Session::put('front_lang', $lang_code);
        config(['app.locale' => $lang_code]);
    }

    public function profile(Request $request, $slug){
        $this->translator($request->lang_code);

        $seller = User::where('user_name', $slug)->first();
        $setting = Setting::first();
        $recaptchaSetting = GoogleRecaptcha::first();

        return response()->json([
            'seller' => $seller,
            'setting' => $setting,
            'recaptchaSetting' => $recaptchaSetting,
        ]);
    }

    public function portfolio(Request $request, $slug){

        $this->translator($request->lang_code);
        
        $setting = Setting::first();
        $seller = User::where('user_name', $slug)->first();
        $products = Product::with('productlangfrontend', 'category','author')->where(['author_id' => $seller->id, 'status' => 1])->orderBy('id','desc')->select('id','name','slug','thumbnail_image','regular_price','category_id','author_id','status','approve_by_admin')->paginate(10);
        $recaptchaSetting = GoogleRecaptcha::first();

        return response()->json([
            'seller' => $seller,
            'products' => $products,
            'setting' => $setting,
            'recaptchaSetting' => $recaptchaSetting,
        ]);
    }


}
