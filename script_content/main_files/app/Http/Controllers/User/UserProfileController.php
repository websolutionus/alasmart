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
use App\Models\ProductTypePage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function dashboard(){
        $user = Auth::guard('web')->user();
        $countries=Country::where('status', 1)->get();
        $stats=CountryState::where('status', 1)->get();
        $cities=City::where('status', 1)->get();
        $setting = Setting::first();
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

        return view('user.dashboard')->with([
            'active_theme' => $active_theme,
            'user' => $user,
            'countries' => $countries,
            'stats' => $stats,
            'cities' => $cities,
            'setting' => $setting,
        ]);
    }

    public function portfolio($id=null){
        $setting = Setting::first();

        $user = Auth::guard('web')->user();
        $products = Product::with('category','author')->where(['author_id' => $user->id])->orderBy('id','desc')->select('id','name','slug','thumbnail_image','regular_price','category_id','author_id','status','approve_by_admin')->paginate(10);
        $countries=Country::where('status', 1)->get();
        $stats=CountryState::where('status', 1)->get();
        $cities=City::where('status', 1)->get();
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

        return view('user.portfolio')->with([
            'active_theme' => $active_theme,
            'user' => $user,
            'products' => $products,
            'countries' => $countries,
            'stats' => $stats,
            'cities' => $cities,
            'setting' => $setting,
        ]);
    }

    public function download(){
        $setting = Setting::first();

        $user = Auth::guard('web')->user();
        $countries=Country::where('status', 1)->get();
        $stats=CountryState::where('status', 1)->get();
        $cities=City::where('status', 1)->get();
        $orders=Order::where('user_id', $user->id)->where('order_status', 1)->get();

        $order_items=OrderItem::with('product', 'variant', 'order')->where('user_id', $user->id)->latest()->paginate(10);
        
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

        return view('user.download')->with([
            'active_theme' => $active_theme,
            'user' => $user,
            'order_items' => $order_items,
            'countries' => $countries,
            'stats' => $stats,
            'cities' => $cities,
            'setting' => $setting,
        ]);
    }

    public function collection(){
        $setting = Setting::first();
        $user = Auth::guard('web')->user();
        $countries=Country::where('status', 1)->get();
        $stats=CountryState::where('status', 1)->get();
        $cities=City::where('status', 1)->get();
        $wishlists=Wishlist::with('product')->where('user_id', $user->id)->paginate(9);
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

        return view('user.collection')->with([
            'active_theme' => $active_theme,
            'user' => $user,
            'wishlists' => $wishlists,
            'countries' => $countries,
            'stats' => $stats,
            'cities' => $cities,
            'setting' => $setting,
        ]);
    }

    public function delete_wishlist($id){
       $wishlist=Wishlist::findOrFail($id);
       $wishlist->delete();
       $notification = trans('Successfully deleted');
       $notification = array('messege'=>$notification,'alert-type'=>'success');
       return redirect()->back()->with($notification);
    }

    public function rating(){
        $user = Auth::guard('web')->user();
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

        return view('user.rating')->with([
            'active_theme' => $active_theme,
            'user' => $user,
        ]);
    }

    public function select_product_type(){
        $user = Auth::guard('web')->user();
        $productType = ProductTypePage::first();
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

        return view('user.select_product_type')->with([
            'active_theme' => $active_theme,
            'user' => $user,
            'productType' => $productType,
        ]);
    }

    public function product_create(Request $request){
        $rules = [
            'product_type'=>'required',
        ];

        $customMessages = [
            'product_type.required' => trans('Product type is required'),
        ];
        $this->validate($request, $rules,$customMessages);
        $user = Auth::guard('web')->user();
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

        if(!$request->product_type){
            $notification = trans('Something went wrong');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('select-product-type')->with($notification);
        }

        if($request->product_type == 'script'){
            $categories = Category::where('status', 1)->get();
            $product_type = $request->product_type;

            return view('user.create_product')->with([
                'active_theme' => $active_theme,
                'categories' => $categories,
                'product_type' => $product_type,
            ]);

        }elseif($request->product_type == 'image'){

            $categories = Category::where('status', 1)->get();
            $product_type = $request->product_type;

            return view('user.create_image_product')->with([
                'active_theme' => $active_theme,
                'categories' => $categories,
                'product_type' => $product_type,
            ]);
        }elseif($request->product_type == 'video'){

            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $request->product_type;

            return view('user.create_image_product')->with([
                'active_theme' => $active_theme,
                'categories' => $categories,
                'product_type' => $product_type,
            ]);
        }elseif($request->product_type == 'audio'){

            $categories = Category::where('status', 1)->get();
            $product_type = $request->product_type;

            return view('user.create_image_product')->with([
                'active_theme' => $active_theme,
                'categories' => $categories,
                'product_type' => $product_type,
            ]);
        }else{
            abort(404);
        }
    }

    public function store(Request $request){
        $rules = [
            'thumb_image'=>'required',
            'upload_file'=> 'required|file|mimes:zip',
            'product_icon'=>'required',
            'category'=>'required',
            'name'=>'required',
            'slug'=>'required|unique:products',
            'regular_price'=>'required|numeric',
            'extend_price'=>'required|numeric',
            'description'=>'required',
            'tags'=>'required',
            'product_type'=>'required',
        ];

        $customMessages = [
            'thumb_image.required' => trans('Thumbnail is required'),
            'download_file_type.required' => trans('Upload file type is required'),
            'product_icon.required' => trans('Product icon is required'),
            'upload_file.required' => trans('Upload file is required is required'),
            'download_link.required' => trans('Download link is required'),
            'category.required' => trans('Category is required'),
            'name.required' => trans('Name is required'),
            'slug.required' => trans('Slug is required'),
            'slug.unique' => trans('Slug already exist'),
            'regular_price.required' => trans('Regular price is required'),
            'extend_price.required' => trans('Extend price is required'),
            'extend_price.numeric' => trans('Extend price should be numeric value'),
            'regular_price.numeric' => trans('Regular price should be numeric value'),
            'description.required' => trans('Description is required'),
            'tags.required' => trans('Tag is required'),
        ];
        $this->validate($request, $rules,$customMessages);
        $user = Auth::guard('web')->user();
        $product = new Product();

        if($request->thumb_image){
            $extention = $request->thumb_image->getClientOriginalExtension();
            $image_name = 'thumb_image'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->thumb_image)
                ->save(public_path().'/'.$image_name);
            $product->thumbnail_image = $image_name;
        }

        if($request->product_icon){
            $extention = $request->product_icon->getClientOriginalExtension();
            $image_name = 'product_icon'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->product_icon)
                ->save(public_path().'/'.$image_name);
            $product->product_icon = $image_name;
        }

        if($request->file('upload_file')){
            $extention = $request->upload_file->getClientOriginalExtension();
            $image_name = 'Script'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $request->upload_file->move(public_path('uploads/custom-images/'),$image_name);
            $product->download_file = $image_name;
        }
        
        $product->product_type = $request->product_type;
        $product->author_id = $user->id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->category_id = $request->category;
        $product->preview_link = $request->preview_link;
        $product->regular_price = $request->regular_price;
        $product->extend_price = $request->extend_price;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->status = 0;
        $product->seo_title = $request->seo_title ? $request->seo_title : $request->name;
        $product->seo_description = $request->seo_description ? $request->seo_description : $request->name;
        $product->high_resolution = $request->high_resolution ? 1 : 0;
        $product->cross_browser = $request->cross_browser ? 1 : 0;
        $product->documentation = $request->documentation ? 1 : 0;
        $product->layout = $request->layout ? 1 : 0;
        $product->save();

        $notification = trans('Created successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function store_image_type_product(Request $request){
        $rules = [
            'thumb_image'=>'required',
            'product_icon'=>'required',
            'category'=>'required',
            'name'=>'required',
            'slug'=>'required|unique:products',
            'preview_link'=>'required',
            'regular_price'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'product_type'=>'required',
        ];

        $customMessages = [
            'thumb_image.required' => trans('Thumbnail is required'),
            'product_icon.required' => trans('Product icon is required'),
            'category.required' => trans('Category is required'),
            'name.required' => trans('Name is required'),
            'slug.required' => trans('Slug is required'),
            'slug.unique' => trans('Slug already exist'),
            'preview_link.required' => trans('Preview link is required'),
            'regular_price.required' => trans('Regular price is required'),
            'description.required' => trans('Description is required'),
            'tags.required' => trans('Tag is required'),
        ];
        $this->validate($request, $rules,$customMessages);
        $user = Auth::guard('web')->user();
        $product = new Product();

        if($request->thumb_image){
            $extention = $request->thumb_image->getClientOriginalExtension();
            $image_name = 'thumb_image'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->thumb_image)
                ->save(public_path().'/'.$image_name);
            $product->thumbnail_image = $image_name;
        }
        if($request->product_icon){
            $extention = $request->product_icon->getClientOriginalExtension();
            $image_name = 'product_icon'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->product_icon)
                ->save(public_path().'/'.$image_name);
            $product->product_icon = $image_name;
        }
        $product->product_type = $request->product_type;
        $product->author_id = $user->id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->preview_link = $request->preview_link;
        $product->regular_price = $request->regular_price;
        $product->category_id = $request->category;
        $product->preview_link = $request->preview_link;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->status = 0;
        $product->seo_title = $request->seo_title ? $request->seo_title : $request->name;
        $product->seo_description = $request->seo_description ? $request->seo_description : $request->name;
        $product->high_resolution = $request->high_resolution ? 1 : 0;
        $product->cross_browser = $request->cross_browser ? 1 : 0;
        $product->documentation = $request->documentation ? 1 : 0;
        $product->layout = $request->layout ? 1 : 0;
        $product->save();

        $notification = trans('Created successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('product-edit', $product->id)->with($notification);
    }

    public function edit($id){
        $user = Auth::guard('web')->user();
        $product = Product::find($id);
        $product_variants = ProductVariant::where('product_id', $id)->get();
        $setting=Setting::first();
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

        if(!$product->product_type){
            $notification = trans('Something went wrong');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('select-product-type')->with($notification);
        }

        if($product->product_type == 'script'){
            $categories = Category::where('status', 1)->get();
            $product_type = $product->product_type;

            return view('user.edit_product')->with([
                'active_theme' => $active_theme,
                'categories' => $categories,
                'product_type' => $product_type,
                'product' => $product,
                'setting' => $setting,
            ]);

        }elseif($product->product_type == 'image'){

            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $product->product_type;

            return view('user.edit_image_product')->with([
                'active_theme' => $active_theme,
                'categories' => $categories,
                'product_type' => $product_type,
                'product' => $product,
                'product_variants' => $product_variants,
                'setting' => $setting,
            ]);
        }elseif($product->product_type == 'video'){

            $categories = Category::where('status', 1)->get();
            $product_type = $product->product_type;

            return view('user.edit_image_product')->with([
                'active_theme' => $active_theme,
                'categories' => $categories,
                'product_type' => $product_type,
                'product' => $product,
                'product_variants' => $product_variants,
                'setting' => $setting,
            ]);
        }elseif($product->product_type == 'audio'){

            $categories = Category::where('status', 1)->get();
            $product_type = $product->product_type;

            return view('user.edit_image_product')->with([
                'active_theme' => $active_theme,
                'categories' => $categories,
                'product_type' => $product_type,
                'product' => $product,
                'product_variants' => $product_variants,
                'setting' => $setting,
            ]);
        }else{
            abort(404);
        }
    }

    public function update(Request $request, $id){

        $rules = [
            'category'=>'required',
            'name'=>'required',
            'slug'=>'required|unique:products,slug,'.$id,
            'regular_price'=>'required|numeric',
            'extend_price'=>'required|numeric',
            'description'=>'required',
            'tags'=>'required',
            'product_type'=>'required',
        ];

        $customMessages = [
            'download_file_type.required' => trans('Upload file type is required'),
            'upload_file.required' => trans('Upload file is required is required'),
            'download_link.required' => trans('Download link is required'),
            'category.required' => trans('Category is required'),
            'name.required' => trans('Name is required'),
            'slug.required' => trans('Slug is required'),
            'slug.unique' => trans('Slug already exist'),
            'regular_price.required' => trans('Regular price is required'),
            'extend_price.required' => trans('Extend price is required'),
            'extend_price.numeric' => trans('Extend price should be numeric value'),
            'regular_price.numeric' => trans('Regular price should be numeric value'),
            'description.required' => trans('Description is required'),
            'tags.required' => trans('Tag is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = Auth::guard('web')->user();
        $product = Product::find($id);

        if($request->thumb_image){
            $old_image = $product->thumbnail_image;
            $extention = $request->thumb_image->getClientOriginalExtension();
            $image_name = 'thumb_image'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->thumb_image)
                ->save(public_path().'/'.$image_name);
            $product->thumbnail_image = $image_name;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->product_icon){
            $old_icon = $product->product_icon;
            $extention = $request->product_icon->getClientOriginalExtension();
            $image_name = 'product_icon'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->product_icon)
                ->save(public_path().'/'.$image_name);
            $product->product_icon = $image_name;

            if($old_icon){
                if(File::exists(public_path().'/'.$old_icon))unlink(public_path().'/'.$old_icon);
            }
        }

        if($request->file('upload_file')){
            $old_download_file = $product->download_file;
            $extention = $request->upload_file->getClientOriginalExtension();
            $image_name = 'Script'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $request->upload_file->move(public_path('uploads/custom-images/'),$image_name);
            $product->download_file = $image_name;
            $product->save();

            if($old_download_file){
                if(File::exists(public_path().'/uploads/custom-images/'.$old_download_file))unlink(public_path().'/uploads/custom-images/'.$old_download_file);
            }
        }

        $product->product_type = $request->product_type;
        $product->author_id = $user->id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->category_id = $request->category;
        $product->preview_link = $request->preview_link;
        $product->regular_price = $request->regular_price;
        $product->extend_price = $request->extend_price;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->seo_title = $request->seo_title ? $request->seo_title : $request->name;
        $product->seo_description = $request->seo_description ? $request->seo_description : $request->name;
        $product->high_resolution = $request->high_resolution ? 1 : 0;
        $product->cross_browser = $request->cross_browser ? 1 : 0;
        $product->documentation = $request->documentation ? 1 : 0;
        $product->layout = $request->layout ? 1 : 0;
        $product->save();

        $notification = trans('Updated successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function image_product_update(Request $request, $id){
        $rules = [
            'category'=>'required',
            'name'=>'required',
            'slug'=>'required|unique:products,slug,'.$id,
            'preview_link'=>'required',
            'regular_price'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'product_type'=>'required',
        ];

        $customMessages = [
            'category.required' => trans('Category is required'),
            'name.required' => trans('Name is required'),
            'slug.required' => trans('Slug is required'),
            'slug.unique' => trans('Slug already exist'),
            'preview_link.required' => trans('Preview link is required'),
            'regular_price.required' => trans('Regular price is required'),
            'description.required' => trans('Description is required'),
            'tags.required' => trans('Tag is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = Auth::guard('web')->user();
        $product = Product::find($id);

        if($request->thumb_image){
            $old_image = $product->thumbnail_image;
            $extention = $request->thumb_image->getClientOriginalExtension();
            $image_name = 'thumb_image'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->thumb_image)
                ->save(public_path().'/'.$image_name);
            $product->thumbnail_image = $image_name;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->product_icon){
            $old_icon = $product->product_icon;
            $extention = $request->product_icon->getClientOriginalExtension();
            $image_name = 'product_icon'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->product_icon)
                ->save(public_path().'/'.$image_name);
            $product->product_icon = $image_name;

            if($old_icon){
                if(File::exists(public_path().'/'.$old_icon))unlink(public_path().'/'.$old_icon);
            }
        }
        $product->author_id = $user->id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->preview_link = $request->preview_link;
        $product->regular_price = $request->regular_price;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->seo_title = $request->seo_title ? $request->seo_title : $request->name;
        $product->seo_description = $request->seo_description ? $request->seo_description : $request->name;
        $product->high_resolution = $request->high_resolution ? 1 : 0;
        $product->cross_browser = $request->cross_browser ? 1 : 0;
        $product->documentation = $request->documentation ? 1 : 0;
        $product->layout = $request->layout ? 1 : 0;
        $product->save();

        $notification = trans('Updated successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function store_product_variant(Request $request, $id){
        $rules = [
            'variant_name'=>'required',
            'file_name'=>'required',
            'price'=>'required|numeric',
        ];

        $customMessages = [
            'variant_name.required' => trans('Variant name is required'),
            'file_name.required' => trans('Upload file is required'),
            'price.required' => trans('Price is required'),
            'price.numeric' => trans('Price should be numeric value'),
        ];
        $this->validate($request, $rules,$customMessages);

        $variant = new ProductVariant();

        if($request->file('file_name')){
            $extention = $request->file_name->getClientOriginalExtension();
            $image_name = 'Script'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $request->file_name->move(public_path('uploads/custom-images/'),$image_name);
            $variant->file_name = $image_name;
        }

        $variant->variant_name = $request->variant_name;
        $variant->price = $request->price;
        $variant->product_id = $id;
        $variant->save();

        $notification = trans('Created successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }

    public function product_variant($id){
        $user = Auth::guard('web')->user();
        $product = Product::find($id);
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
        return view('user.product_variant')->with([
            'active_theme' => $active_theme,
        ]);
    }

    public function update_product_variant(Request $request, $id){
        $rules = [
            'variant_name'=>'required',
            'price'=>'required|numeric',
        ];

        $customMessages = [
            'variant_name.required' => trans('Variant name is required'),
            'price.required' => trans('Price is required'),
            'price.numeric' => trans('Price should be numeric value'),
        ];
        $this->validate($request, $rules,$customMessages);

        $variant = ProductVariant::find($id);

        if($request->file('file_name')){
            $old_download_file = $variant->file_name;
            $extention = $request->file_name->getClientOriginalExtension();
            $image_name = 'Script'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $request->file_name->move(public_path('uploads/custom-images/'),$image_name);
            $variant->file_name = $image_name;
            $variant->save();

            if($old_download_file){
                if(File::exists(public_path().'/uploads/custom-images/'.$old_download_file)){
                    unlink(public_path().'/uploads/custom-images/'.$old_download_file);
                }
            }
        }

        $variant->variant_name = $request->variant_name;
        $variant->price = $request->price;
        $variant->save();

        $notification = trans('Updated successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function delete_product_variant($id){
        $variant = ProductVariant::find($id);
        $old_download_file = $variant->file_name;
        $variant->delete();
        if($old_download_file){
            if(File::exists(public_path().'/uploads/custom-images/'.$old_download_file)){
                unlink(public_path().'/uploads/custom-images/'.$old_download_file);
            }
        }

        $notification = trans('Deleted successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }



    public function updateProfile(Request $request){
        $user = Auth::guard('web')->user();
        $rules = [
            'name'=>'required',
            'designation'=>'required',
            'phone'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
            'address'=>'required',
            'about_me'=>'required',
            'my_skill'=>'required',
        ];
        $customMessages = [
            'name.required' => trans('user_validation.Name is required'),
            'designation.required' => trans('Designation is required'),
            'phone.required' => trans('user_validation.Phone is required'),
            'country_id.required' => trans('Country name is required'),
            'state_id.required' => trans('State name is required'),
            'city_id.required' => trans('City name is required'),
            'address.required' => trans('user_validation.Address is required'),
            'about_me.required' => trans('About is required'),
            'my_skill.required' => trans('Skill is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user->name = $request->name;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->city_id = $request->city_id;
        $user->address = $request->address;
        $user->about_me = $request->about_me;
        $user->my_skill = $request->my_skill;
        $user->facebook = $request->facebook;
        $user->pinterest = $request->pinterest;
        $user->linkedIn = $request->linkedIn;
        $user->dribbble = $request->dribbble;
        $user->twitter = $request->twitter;
        $user->save();
        $image_upload = false;

        if($request->file('image')){
            $old_image=$user->image;
            $user_image=$request->image;
            $extention=$user_image->getClientOriginalExtension();
            $image_name= Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name='uploads/custom-images/'.$image_name;

            Image::make($user_image)
                ->save(public_path().'/'.$image_name);

            $user->image=$image_name;
            $user->save();
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
            $image_upload = true;
        }

        $user = User::select('id','name','email','image','phone','address','status','is_provider')->where('id', $user->id)->first();


        $notification = trans('user_validation.Update Successfully');
        //return response()->json(['status' => 'success', 'message' => $notification, 'image_upload' => $image_upload, 'user' => $user]);
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function updatePassword(Request $request){
        $rules = [
            'current_password'=>'required',
            'password'=>'required|min:4',
            'c_password' => 'required|same:password',
        ];
        $customMessages = [
            'current_password.required' => trans('user_validation.Current password is required'),
            'password.required' => trans('user_validation.Password is required'),
            'password.min' => trans('user_validation.Password minimum 4 character'),
            'c_password.required' => trans('Confirm password is required'),
            'c_password.same' => trans('user_validation.Confirm password does not match'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = Auth::guard('web')->user();
        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();

            $notification = 'Password change successfully';
            //return response()->json(['status' => 'success' , 'message' => $notification],200);
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);

        }else{
            $notification = trans('user_validation.Current password does not match');
            //return response()->json(['status' => 'faild' , 'message' => $notification],403);
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }

    public function download_script($id){
        if(Auth::guard('web')->check()){
            $product=Product::findOrFail($id);
            $file=public_path('uploads/custom-images/').'/'.$product->download_file;
            return Response::download($file);
        }else{
            $notification = trans('Please login your account');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }

    public function download_variant($id){
        if(Auth::guard('web')->check()){
            $product_variant=ProductVariant::findOrFail($id);
            $file=public_path('uploads/custom-images/').'/'.$product_variant->file_name;
            return Response::download($file);
        }else{
            $notification = trans('Please login your account');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }


    public function myProfile(){
        $user = Auth::guard('web')->user();
        $countries = Country::orderBy('name','asc')->where('status',1)->get();
        $states = CountryState::orderBy('name','asc')->where(['status' => 1, 'country_id' => $user->country_id])->get();
        $cities = City::orderBy('name','asc')->where(['status' => 1, 'country_state_id' => $user->state_id])->get();

        $setting = Setting::first();
        $default_avatar = array(
            'image' => $setting->default_avatar
        );
        $default_avatar = (object) $default_avatar;
        return view('user.my_profile', compact('user','countries','cities','states','default_avatar'));
    }



    public function stateByCountry($id){
        $states = CountryState::where(['status' => 1, 'country_id' => $id])->get();
        $response='<option value="0">Select a State</option>';
        if($states->count() > 0){
            foreach($states as $state){
                $response .= "<option value=".$state->id.">".$state->name."</option>";
            }
        }
        return response()->json(['states'=>$response]);
    }

    public function cityByState($id){
        $cities = City::where(['status' => 1, 'country_state_id' => $id])->get();
        $response='<option value="0">Select a City</option>';
        if($cities->count() > 0){
            foreach($cities as $city){
                $response .= "<option value=".$city->id.">".$city->name."</option>";
            }
        }
        return response()->json(['cities'=>$response]);
    }



    public function addToWishlist($id){
        $user = Auth::guard('web')->user();
        $product = Product::find($id);
        $isExist = Wishlist::where(['user_id' => $user->id, 'product_id' => $product->id])->count();
        if($isExist == 0){
            $wishlist = new Wishlist();
            $wishlist->product_id = $id;
            $wishlist->user_id = $user->id;
            $wishlist->save();
            $message = trans('user_validation.Wishlist added successfully');
            return response()->json(['status' => 1, 'message' => $message]);
        }else{
            $message = trans('user_validation.Already added');
            return response()->json(['status' => 0, 'message' => $message]);
        }
    }

    public function removeWishlist($id){
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        $notification = trans('user_validation.Removed successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function review(){
        $user = Auth::guard('web')->user();
        $reviews = ProductReview::orderBy('id','desc')->where(['user_id' => $user->id, 'status' => 1])->paginate(10);
        return view('user.review',compact('reviews'));
    }


    public function storeProductReview(Request $request){
        $rules = [
            'rating'=>'required',
            'review'=>'required',
            'g-recaptcha-response'=>new Captcha()
        ];
        $customMessages = [
            'rating.required' => trans('user_validation.Rating is required'),
            'review.required' => trans('user_validation.Review is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = Auth::guard('web')->user();
        $isExistOrder = false;
        $orders = Order::where(['user_id' => $user->id])->get();
        foreach ($orders as $key => $order) {
            foreach ($order->orderProducts as $key => $orderProduct) {
                if($orderProduct->product_id == $request->product_id){
                    $isExistOrder = true;
                }
            }
        }

        if($isExistOrder){
            $isReview = ProductReview::where(['product_id' => $request->product_id, 'user_id' => $user->id])->count();
            if($isReview > 0){
                $message = trans('user_validation.You have already submited review');
                return response()->json(['status' => 0, 'message' => $message]);
            }
            $review = new ProductReview();
            $review->user_id = $user->id;
            $review->rating = $request->rating;
            $review->review = $request->review;
            $review->product_vendor_id = $request->seller_id;
            $review->product_id = $request->product_id;
            $review->save();
            $message = trans('user_validation.Review Submited successfully');
            return response()->json(['status' => 1, 'message' => $message]);
        }else{
            $message = trans('user_validation.Opps! You can not review this product');
            return response()->json(['status' => 0, 'message' => $message]);
        }

    }

    public function updateReview(Request $request, $id){
        $rules = [
            'rating'=>'required',
            'review'=>'required',
        ];
        $this->validate($request, $rules);
        $user = Auth::guard('web')->user();
        $review = ProductReview::find($id);
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        $notification = trans('user_validation.Updated successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function productReview(Request $request){
        $rules = [
            'rating'=>'required',
            'review'=>'required',
        ];
        $customMessages = [
            'rating.required' => trans('user_validation.Rating is required'),
            'review.required' => trans('user_validation.Review is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = Auth::guard('web')->user();
        
        $isReview = Review::where(['product_id' => $request->product_id, 'user_id' => $user->id])->count();
        if($isReview > 0){
            // $message = trans('user_validation.You have already submited review');
            // return response()->json(['status' => 0, 'message' => $message]);
            $notification = trans('user_validation.You have already submited review');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
        
        $review = new Review();
        $review->user_id = $user->id;
        $review->order_id = $request->order_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->product_id = $request->product_id;
        $review->variant_id = $request->variant_id;
        $review->author_id = $request->author_id;
        $review->save();
        // $message = trans('user_validation.Review Submited successfully');
        // return response()->json(['status' => 1, 'message' => $message]);
        $notification = trans('user_validation.Review Submited successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
        
    }

    public function payment_success(){
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
        return view('user.payment_success')->with([
            'active_theme' => $active_theme,
        ]);
    }

    public function download_existing_file($file_name){
        $filepath= public_path() . "/uploads/custom-images/".$file_name;
        return response()->download($filepath);
    }

    public function delete_product($id){
        $order_item = OrderItem::where('product_id', $id)->first();
        if(!$order_item){
            $product = Product::findOrFail($id);
            $product->delete();
            if($product->thumbnail_image){
                $old_image = $product->thumbnail_image;
                if($old_image){
                    if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
                }
            }
    
            if($product->product_icon){
                $old_icon = $product->product_icon;
    
                if($old_icon){
                    if(File::exists(public_path().'/'.$old_icon))unlink(public_path().'/'.$old_icon);
                }
            }
    
            if($product->download_file){
                $old_download_file = $product->download_file;
                if($old_download_file){
                    if(File::exists(public_path().'/uploads/custom-images/'.$old_download_file))unlink(public_path().'/uploads/custom-images/'.$old_download_file);
                }
            }
    
            if($product->product_type!='script'){
                $variants = ProductVariant::where('product_id', $id)->get();
                foreach($variants as $variant){
                    $old_download_file = $variant->file_name;
                    $variant->delete();
                    if($old_download_file){
                        if(File::exists(public_path().'/uploads/custom-images/'.$old_download_file)){
                            unlink(public_path().'/uploads/custom-images/'.$old_download_file);
                        }
                    }
                }
            }
    
            $notification = trans('Deleted successfully');
            $notification = array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }else{
            $notification = trans("You can't delete Sold product");
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }


}
