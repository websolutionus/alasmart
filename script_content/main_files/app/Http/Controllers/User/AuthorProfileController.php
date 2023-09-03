<?php

namespace App\Http\Controllers\User;

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
    public function profile($slug){

        $user = User::where('user_name', $slug)->first();
        $setting = Setting::first();
        $recaptchaSetting = GoogleRecaptcha::first();
        
        $active_theme = 'layout';

        return view('user.author_profile')->with([
            'active_theme' => $active_theme,
            'user' => $user,
            'setting' => $setting,
            'recaptchaSetting' => $recaptchaSetting,
        ]);
    }

    public function portfolio($slug){

        $setting = Setting::first();
        $user = User::where('user_name', $slug)->first();
        $products = Product::with('category','author','productlangfrontend')->where(['author_id' => $user->id, 'status' => 1])->orderBy('id','desc')->select('id','name','slug','thumbnail_image','regular_price','category_id','author_id','status','approve_by_admin')->paginate(10);
        
        $recaptchaSetting = GoogleRecaptcha::first();
        
        $active_theme = 'layout';

        return view('user.author_portfolio')->with([
            'active_theme' => $active_theme,
            'user' => $user,
            'products' => $products,
            'setting' => $setting,
            'recaptchaSetting' => $recaptchaSetting,
        ]);
    }


}
