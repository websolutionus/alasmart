<?php

namespace App\Http\Controllers\Admin;

use File;
use Image;
use App\Models\Language;
use App\Models\ErrorPage;
use Illuminate\Http\Request;
use App\Models\ErrorPageLanguage;
use App\Http\Controllers\Controller;

class ErrorPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request){
        $errorpage = ErrorPage::with('errorlangfrontend')->first();
        $languages = Language::get();
        $error_language = ErrorPageLanguage::where(['error_id' => $errorpage->id, 'lang_code' => $request->lang_code])->first();
        
        return view('admin.error_page', compact('errorpage', 'languages', 'error_language'));
    }

    public function update(Request $request, $id)
    {
        $errorPage = ErrorPage::first();
        $error_language = ErrorPageLanguage::where(['error_id' => $errorPage->id, 'lang_code' => $request->lang_code])->first();
        
        $rules = [
            'title'=>'required',
            'button_text'=>'required',
        ];
        $customMessages = [
            'title.required' => trans('Title is required'),
            'button_text.required' => trans('admin_validation.Button text is required')
        ];
        $this->validate($request, $rules,$customMessages);

        $error_language->title = $request->title;
        $error_language->button_text = $request->button_text;
        $error_language->save();

        if($request->image){
            $exist_banner = $errorPage->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'error-page-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $errorPage->image = $banner_name;
            $errorPage->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        $notification= trans('Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
