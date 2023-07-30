<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductTypePage;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use File;

class ProductTypePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $productType = ProductTypePage::first();
        return view('admin.product_type_page', compact('productType'));
    }

    public function update(Request $request, $id)
    {
        $productType = ProductTypePage::find($id);

        $rules = [
            'title'=>'required',
            'description'=>'required',
        ];
        $customMessages = [
            'title.required' => trans('Title is required'),
            'description.required' => trans('Description is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $productType->title = $request->title;
        $productType->description = $request->description;
        $productType->save();

        if($request->image){
            $exist_banner = $productType->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'product-type-page-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $productType->image = $banner_name;
            $productType->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        $notification= trans('Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
