<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPage;
use Image;
use File;
class ContactPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $contact = ContactPage::first();
        return view('admin.contact_page', compact('contact'));
    }

    public function update(Request $request, $id){
        $rules = [
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'title1' => 'required',
            'time' => 'required',
            'off_day' => 'required',
            'title2' => 'required',
            'google_map' => 'required',
        ];
        $customMessages = [
            'email.required' => trans('admin_validation.Email is required'),
            'address.required' => trans('admin_validation.Address is required'),
            'phone.required' => trans('admin_validation.Phone is required'),
            'title1.required' => trans('Title is required'),
            'time.required' => trans('Office time is required'),
            'off_day.required' => trans('Off day is required'),
            'title2.required' => trans('Title is required'),
            'google_map.unique' => trans('admin_validation.Google Map is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $contact = ContactPage::find($id);
        $contact->title1 = $request->title1;
        $contact->title2 = $request->title2;
        $contact->time = $request->time;
        $contact->off_day = $request->off_day;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->map = $request->google_map;
        $contact->save();

        if($request->image){
            $exist_banner = $contact->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'contact_us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $contact->image = $banner_name;
            $contact->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }
        

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
