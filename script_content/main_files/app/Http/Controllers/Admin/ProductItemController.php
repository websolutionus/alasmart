<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $productItem = ProductItem::first();

        return view('admin.product_item', compact('productItem'));
    }


    
    public function update(Request $request, $id)
    {
        $productItem = ProductItem::find($id);

        $rules = [
            'script_title'=>'required',
            'script_description'=>'required',
            'image_title'=>'required',
            'image_description'=>'required',
            'video_title'=>'required',
            'video_description'=>'required',
            'audio_title'=>'required',
            'audio_description'=>'required',
        ];
        $customMessages = [
            'script_title.required' => trans('Script product title is required'),
            'script_description.required' => trans('Script product description is required'),
            'image_title.required' => trans('Image product title is required'),
            'image_description.required' => trans('Image product description is required'),
            'video_title.required' => trans('Video product title is required'),
            'video_description.required' => trans('Video product description is required'),
            'audio_title.required' => trans('Audio product title is required'),
            'audio_description.required' => trans('Audio product description is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $productItem->script_title = $request->script_title;
        $productItem->script_description = $request->script_description;
        $productItem->image_title = $request->image_title;
        $productItem->image_description = $request->image_description;
        $productItem->video_title = $request->video_title;
        $productItem->video_description = $request->video_description;
        $productItem->audio_title = $request->audio_title;
        $productItem->audio_description = $request->audio_description;
        $productItem->save();

        if($request->script_image){
            $exist_banner = $productItem->script_image;
            $extention = $request->script_image->getClientOriginalExtension();
            $banner_name = 'script-product-image-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->script_image)
                ->save(public_path().'/'.$banner_name);
            $productItem->script_image = $banner_name;
            $productItem->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        if($request->image_image){
            $exist_banner = $productItem->image_image;
            $extention = $request->image_image->getClientOriginalExtension();
            $banner_name = 'image-product-image-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->image_image)
                ->save(public_path().'/'.$banner_name);
            $productItem->image_image = $banner_name;
            $productItem->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        if($request->video_image){
            $exist_banner = $productItem->video_image;
            $extention = $request->video_image->getClientOriginalExtension();
            $banner_name = 'video-product-image-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->video_image)
                ->save(public_path().'/'.$banner_name);
            $productItem->video_image = $banner_name;
            $productItem->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        if($request->audio_image){
            $exist_banner = $productItem->audio_image;
            $extention = $request->audio_image->getClientOriginalExtension();
            $banner_name = 'audio-product-image-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->audio_image)
                ->save(public_path().'/'.$banner_name);
            $productItem->audio_image = $banner_name;
            $productItem->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        $notification= trans('Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    
}
