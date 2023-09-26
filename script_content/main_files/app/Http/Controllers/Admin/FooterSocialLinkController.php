<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSocialLink;
class FooterSocialLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $links = FooterSocialLink::all();
        return view('admin.footer_social_link', compact('links'));
    }

    public function store(Request $request){
        $rules = [
            'link' =>'required',
            'text' =>'required',
            'icon' =>'required',
        ];
        $customMessages = [
            'link.required' => trans('Link is required'),
            'icon.required' => trans('Text is required'),
            'icon.required' => trans('Icon is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $link = new FooterSocialLink();
        $link->link = $request->link;
        $link->text = $request->text;
        $link->icon = $request->icon;
        $link->save();

        $notification=trans('Create Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, $id){
        $rules = [
            'link' =>'required',
            'text' =>'required',
            'icon' =>'required',
        ];
        $customMessages = [
            'link.required' => trans('Link is required'),
            'text.required' => trans('Text is required'),
            'icon.required' => trans('Icon is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $link = FooterSocialLink::find($id);
        $link->link = $request->link;
        $link->text = $request->text;
        $link->icon = $request->icon;
        $link->save();

        $notification=trans('Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id){
        $link = FooterSocialLink::find($id);
        $link->delete();
        $notification=trans('Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
