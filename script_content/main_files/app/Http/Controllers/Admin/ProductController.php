<?php

namespace App\Http\Controllers\Admin;

use File;
use Image;
use App\Models\User;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use App\Models\ScriptContent;
use App\Models\ProductVariant;
use App\Models\ProductDiscount;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request){
        if($request->author_id){
            $products = Product::with('category')->where('author_id',$request->author_id)->orderBy('id','desc')->get();
        }else{
            $products = Product::with('category')->orderBy('id','desc')->get();
        }

        return view('admin.product', compact('products'));
    }

    public function active_product(){
        $active_products = Product::with('category')->where('status', 1)->orderBy('id','desc')->get();
        return view('admin.active_product', compact('active_products'));

    }

    public function pending_product(){
    
        $pending_products = Product::with('category')->where('status', 0)->orderBy('id','desc')->get();
        return view('admin.pending_product', compact('pending_products'));

    }

    public function product_discount(){
        $discount = ProductDiscount::first();
        return view('admin.product_discount', compact('discount'));
    }

    public function update_product_discount(Request $request){
        $rules = [
            'title'=>'required',
            'link'=>'required',
            'offer'=>'required',
            'end_time'=>'required',
        ];

        $customMessages = [
            'title.required' => trans('Title is required'),
            'link.required' => trans('Link is required'),
            'offer.required' => trans('Offer is required'),
            'end_time.required' => trans('End time is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $discount = ProductDiscount::first();

        $discount->title = $request->title;
        $discount->offer = $request->offer;
        $discount->link = $request->link;
        $discount->end_time = $request->end_time;
        $discount->status = $request->status;
        $discount->save();

        $notification = trans('Updated successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function package_content(){
        $package_content = ScriptContent::first();
        return view('admin.package_content', compact('package_content'));
    }
    
    public function update_package_content(Request $request){
        $rules = [
            'regular_content'=>'required',
            'extend_content'=>'required',
        ];

        $customMessages = [
            'regular_content.required' => trans('Regular content is required'),
            'extend_content.required' => trans('Extend content is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $content = ScriptContent::first();
        $content->regular_content = $request->regular_content;
        $content->extend_content = $request->extend_content;
        $content->save();
        $notification = trans('Updated successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function select_product_type(){
        $productItem = ProductItem::first();
        return view('admin.select_product_type', compact('productItem'));
    }

    public function create(Request $request){
        if(!$request->product_type){
            $notification = trans('Something went wrong');
            $notification = array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('admin.select-product-type')->with($notification);
        }

        if($request->product_type == 'script'){
            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $request->product_type;

            return view('admin.create_product', compact('categories', 'authors','product_type'));

        }elseif($request->product_type == 'image'){

            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $request->product_type;

            return view('admin.create_image_product', compact('categories', 'authors','product_type'));
        }elseif($request->product_type == 'video'){

            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $request->product_type;

            return view('admin.create_image_product', compact('categories', 'authors','product_type'));
        }elseif($request->product_type == 'audio'){

            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $request->product_type;

            return view('admin.create_image_product', compact('categories', 'authors','product_type'));
        }else{
            abort(404);
        }




    }

    public function store(Request $request){
        $rules = [
            'thumb_image'=>'required',
            'upload_file'=> 'required|file|mimes:zip',
            'product_icon'=>'required',
            'author'=>'required',
            'category'=>'required',
            'name'=>'required',
            'slug'=>'required|unique:products',
            'regular_price'=>'required|numeric',
            'extend_price'=>'required|numeric',
            'description'=>'required',
            'tags'=>'required',
            'status'=>'required',
            'product_type'=>'required',
        ];

        $customMessages = [
            'thumb_image.required' => trans('Thumbnail is required'),
            'download_file_type.required' => trans('Upload file type is required'),
            'product_icon.required' => trans('Product icon is required'),
            'upload_file.required' => trans('Upload file is required'),
            'download_link.required' => trans('Download link is required'),
            'author.required' => trans('Author is required'),
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
            'status.required' => trans('Status is required'),
        ];
        $this->validate($request, $rules,$customMessages);

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
        $product->author_id = $request->author;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->category_id = $request->category;
        $product->preview_link = $request->preview_link;
        $product->regular_price = $request->regular_price;
        $product->extend_price = $request->extend_price;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title ? $request->seo_title : $request->name;
        $product->seo_description = $request->seo_description ? $request->seo_description : $request->name;
        $product->popular_item = $request->popular_item ? 1 : 0;
        $product->trending_item = $request->trending_item ? 1 : 0;
        $product->featured_item = $request->featured_item ? 1 : 0;
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
            'author'=>'required',
            'category'=>'required',
            'name'=>'required',
            'slug'=>'required|unique:products',
            'preview_link'=>'required',
            'regular_price'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'status'=>'required',
            'product_type'=>'required',
        ];

        $customMessages = [
            'thumb_image.required' => trans('Thumbnail is required'),
            'product_icon.required' => trans('Product icon is required'),
            'author.required' => trans('Author is required'),
            'category.required' => trans('Category is required'),
            'name.required' => trans('Name is required'),
            'slug.required' => trans('Slug is required'),
            'slug.unique' => trans('Slug already exist'),
            'preview_link.required' => trans('Preview link is required'),
            'regular_price.required' => trans('Regular price is required'),
            'description.required' => trans('Description is required'),
            'tags.required' => trans('Tag is required'),
            'status.required' => trans('Status is required'),
        ];
        $this->validate($request, $rules,$customMessages);

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
        $product->author_id = $request->author;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->preview_link = $request->preview_link;
        $product->regular_price = $request->regular_price;
        $product->category_id = $request->category;
        $product->preview_link = $request->preview_link;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title ? $request->seo_title : $request->name;
        $product->seo_description = $request->seo_description ? $request->seo_description : $request->name;
        $product->popular_item = $request->popular_item ? 1 : 0;
        $product->trending_item = $request->trending_item ? 1 : 0;
        $product->featured_item = $request->featured_item ? 1 : 0;
        $product->high_resolution = $request->high_resolution ? 1 : 0;
        $product->cross_browser = $request->cross_browser ? 1 : 0;
        $product->documentation = $request->documentation ? 1 : 0;
        $product->layout = $request->layout ? 1 : 0;
        $product->save();

        $notification = trans('Created successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.product-variant', $product->id)->with($notification);
    }

    public function edit($id){

        $product = Product::find($id);

        if($product->product_type == 'script'){
            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $product->product_type;

            return view('admin.edit_product', compact('categories', 'authors','product_type','product'));

        }elseif($product->product_type == 'image'){
            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $product->product_type;

            return view('admin.edit_image_product', compact('categories', 'authors','product_type','product'));

        }elseif($product->product_type == 'video'){
            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $product->product_type;

            return view('admin.edit_image_product', compact('categories', 'authors','product_type','product'));

        }elseif($product->product_type == 'audio'){
            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $product->product_type;

            return view('admin.edit_image_product', compact('categories', 'authors','product_type','product'));
        }



    }

    public function update(Request $request, $id){

        $rules = [
            'author'=>'required',
            'category'=>'required',
            'name'=>'required',
            'slug'=>'required|unique:products,slug,'.$id,
            'regular_price'=>'required|numeric',
            'extend_price'=>'required|numeric',
            'description'=>'required',
            'tags'=>'required',
            'status'=>'required',
            'product_type'=>'required',
        ];

        $customMessages = [
            'download_file_type.required' => trans('Upload file type is required'),
            'upload_file.required' => trans('Upload file is required'),
            'download_link.required' => trans('Download link is required'),
            'author.required' => trans('Author is required'),
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
            'status.required' => trans('Status is required'),
        ];
        $this->validate($request, $rules,$customMessages);

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
        $product->author_id = $request->author;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->category_id = $request->category;
        $product->preview_link = $request->preview_link;
        $product->regular_price = $request->regular_price;
        $product->extend_price = $request->extend_price;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title ? $request->seo_title : $request->name;
        $product->seo_description = $request->seo_description ? $request->seo_description : $request->name;
        $product->popular_item = $request->popular_item ? 1 : 0;
        $product->trending_item = $request->trending_item ? 1 : 0;
        $product->featured_item = $request->featured_item ? 1 : 0;
        $product->high_resolution = $request->high_resolution ? 1 : 0;
        $product->cross_browser = $request->cross_browser ? 1 : 0;
        $product->documentation = $request->documentation ? 1 : 0;
        $product->layout = $request->layout ? 1 : 0;
        $product->save();

        $notification = trans('Updated successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.product.index')->with($notification);

    }

    public function image_product_update(Request $request, $id){
        $rules = [
            'author'=>'required',
            'category'=>'required',
            'name'=>'required',
            'slug'=>'required|unique:products,slug,'.$id,
            'preview_link'=>'required',
            'regular_price'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'status'=>'required',
            'product_type'=>'required',
        ];

        $customMessages = [
            'author.required' => trans('Author is required'),
            'category.required' => trans('Category is required'),
            'name.required' => trans('Name is required'),
            'slug.required' => trans('Slug is required'),
            'slug.unique' => trans('Slug already exist'),
            'preview_link.required' => trans('Preview link is required'),
            'regular_price.required' => trans('Regular price is required'),
            'description.required' => trans('Description is required'),
            'tags.required' => trans('Tag is required'),
            'status.required' => trans('Status is required'),
        ];
        $this->validate($request, $rules,$customMessages);

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
        $product->author_id = $request->author;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->preview_link = $request->preview_link;
        $product->regular_price = $request->regular_price;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->tags = $request->tags;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title ? $request->seo_title : $request->name;
        $product->seo_description = $request->seo_description ? $request->seo_description : $request->name;
        $product->popular_item = $request->popular_item ? 1 : 0;
        $product->trending_item = $request->trending_item ? 1 : 0;
        $product->featured_item = $request->featured_item ? 1 : 0;
        $product->high_resolution = $request->high_resolution ? 1 : 0;
        $product->cross_browser = $request->cross_browser ? 1 : 0;
        $product->documentation = $request->documentation ? 1 : 0;
        $product->layout = $request->layout ? 1 : 0;
        $product->save();

        $notification = trans('Updated successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function product_variant($id){
        $product = Product::find($id);

        if($product->product_type == 'image'){
            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $product->product_type;
            $product_variants = ProductVariant::where('product_id', $id)->get();
            $setting = Setting::first();

            return view('admin.product_variant', compact('categories', 'authors','product_type','product','product_variants','setting'));
        }elseif($product->product_type == 'video'){

            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $product->product_type;
            $product_variants = ProductVariant::where('product_id', $id)->get();
            $setting = Setting::first();

            return view('admin.product_variant', compact('categories', 'authors','product_type','product','product_variants','setting'));

        }elseif($product->product_type == 'audio'){

            $categories = Category::where('status', 1)->get();
            $authors = User::where('status', 1)->orderBy('name', 'asc')->get();
            $product_type = $product->product_type;
            $product_variants = ProductVariant::where('product_id', $id)->get();
            $setting = Setting::first();

            return view('admin.product_variant', compact('categories', 'authors','product_type','product','product_variants','setting'));

        }else{
            abort(404);
        }
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

    public function download_existing_file($file_name){
        $filepath= public_path() . "/uploads/custom-images/".$file_name;
        return response()->download($filepath);
    }


    public function destroy($id){

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
    }

}
