<?php

namespace App\Http\Controllers\User;

use Str;
use Auth;
use File;
use Hash;
use Slug;
use Image;
use Session;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Ticket;

use App\Rules\Captcha;
use App\Models\Country;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\OrderItem;
use App\Events\SellerToUser;

use App\Models\CountryState;
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

        $countries=Country::where('status', 1)->get();
        $stats=CountryState::where('status', 1)->get();
        $cities=City::where('status', 1)->get();
        $setting = Setting::first();
        $recaptchaSetting = GoogleRecaptcha::first();
        $selected_theme = Session::get('selected_theme');
        if ($selected_theme == 'theme_one'){
            $active_theme = 'layout';
        }elseif($selected_theme == 'theme_two'){
            $active_theme = 'layout2';
        }elseif($selected_theme == 'theme_three'){
            $active_theme = 'layout3';
        }else{
            $active_theme = 'layout';
        }

        return view('user.author_profile')->with([
            'active_theme' => $active_theme,
            'user' => $user,
            'countries' => $countries,
            'stats' => $stats,
            'cities' => $cities,
            'setting' => $setting,
            'recaptchaSetting' => $recaptchaSetting,
        ]);
    }

    public function portfolio($slug){

        $setting = Setting::first();
        $user = User::where('user_name', $slug)->first();
        $products = Product::with('category','author')->where(['author_id' => $user->id, 'status' => 1])->orderBy('id','desc')->select('id','name','slug','thumbnail_image','regular_price','category_id','author_id','status','approve_by_admin')->paginate(10);
        $countries=Country::where('status', 1)->get();
        $stats=CountryState::where('status', 1)->get();
        $cities=City::where('status', 1)->get();
        $recaptchaSetting = GoogleRecaptcha::first();
        $selected_theme = Session::get('selected_theme');
        if ($selected_theme == 'theme_one'){
            $active_theme = 'layout';
        }elseif($selected_theme == 'theme_two'){
            $active_theme = 'layout2';
        }elseif($selected_theme == 'theme_three'){
            $active_theme = 'layout3';
        }else{
            $active_theme = 'layout';
        }

        return view('user.author_portfolio')->with([
            'active_theme' => $active_theme,
            'user' => $user,
            'products' => $products,
            'countries' => $countries,
            'stats' => $stats,
            'cities' => $cities,
            'setting' => $setting,
            'recaptchaSetting' => $recaptchaSetting,
        ]);
    }


}
