<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurTeam;
use Image;
use File;
use Str;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $teams = OurTeam::all();
        return view('admin.team',compact('teams'));
    }

    public function create()
    {
        return view('admin.create_team');
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
            'status' => 'required',
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'designation.required' => trans('admin_validation.Designation is required'),
            'image.required' => trans('admin_validation.Image is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $team = new OurTeam();

        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Ymdhis').'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                ->save(public_path().'/'.$image_name);
        }

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->image = $image_name;
        $team->status = $request->status;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        $team->save();

        $notification = trans('Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.our-team.index')->with($notification);
    }


    public function edit($id)
    {
        $team = OurTeam::find($id);
        return view('admin.edit_team',compact('team'));
    }


    public function update(Request $request, $id)
    {
        $team = OurTeam::find($id);
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'status' => 'required',
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'designation.required' => trans('admin_validation.Designation is required')
        ];
        $this->validate($request, $rules,$customMessages);

        if($request->image){
            $existing_image = $team->image;
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('Ymdhis').'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($request->image)
                    ->save(public_path().'/'.$image_name);
            $team->image= $image_name;
            $team->save();
            if($existing_image){
                if(File::exists(public_path().'/'.$existing_image))unlink(public_path().'/'.$existing_image);
            }
        }

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->status = $request->status;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        $team->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.our-team.index')->with($notification);
    }


    public function destroy($id)
    {
        $team = OurTeam::find($id);
        $existing_image = $team->image;
        $team->delete();

        if($existing_image){
            if(File::exists(public_path().'/'.$existing_image))unlink(public_path().'/'.$existing_image);
        }

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.our-team.index')->with($notification);
    }

    public function changeStatus($id){
        $item = OurTeam::find($id);
        if($item->status == 1){
            $item->status = 0;
            $item->save();
            $message = trans('admin_validation.Inactive Successfully');
        }else{
            $item->status = 1;
            $item->save();
            $message = trans('admin_validation.Active Successfully');
        }

        return response()->json($message);
    }
}
