<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WithdrawMethod;
use App\Models\Setting;
class WithdrawMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $methods = WithdrawMethod::all();
        $setting = Setting::first();
        return view('admin.withdraw_method', compact('methods','setting'));
    }

    public function create(){
        $setting = Setting::first();
        return view('admin.create_withdraw_method',compact('setting'));
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'minimum_amount' => 'required',
            'maximum_amount' => 'required',
            'withdraw_charge' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Title is required'),
            'minimum_amount.required' => trans('admin_validation.Public key is required'),
            'maximum_amount.required' => trans('admin_validation.Secret key is required'),
            'withdraw_charge.required' => trans('admin_validation.Currency rate is required'),
            'description.required' => trans('admin_validation.Currency name is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $method = new WithdrawMethod();
        $method->name = $request->name;
        $method->min_amount = $request->minimum_amount;
        $method->max_amount = $request->maximum_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->status = 1;
        $method->save();

        $notification=trans('admin_validation.Create Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-method.index')->with($notification);
    }

    public function edit($id){
        $method = WithdrawMethod::find($id);
        $setting = Setting::first();
        return view('admin.edit_withdraw_method', compact('method','setting'));
    }

    public function update(Request $request, $id){

        $rules = [
            'name' => 'required',
            'minimum_amount' => 'required',
            'maximum_amount' => 'required',
            'withdraw_charge' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Title is required'),
            'minimum_amount.required' => trans('admin_validation.Public key is required'),
            'maximum_amount.required' => trans('admin_validation.Secret key is required'),
            'withdraw_charge.required' => trans('admin_validation.Currency rate is required'),
            'description.required' => trans('admin_validation.Currency name is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $method = WithdrawMethod::find($id);
        $method->name = $request->name;
        $method->min_amount = $request->minimum_amount;
        $method->max_amount = $request->maximum_amount;
        $method->withdraw_charge = $request->withdraw_charge;
        $method->description = $request->description;
        $method->status = 1;
        $method->save();

        $notification=trans('admin_validation.Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-method.index')->with($notification);
    }

    public function destroy($id){
        $method = WithdrawMethod::find($id);
        $method->delete();
        $notification=trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.withdraw-method.index')->with($notification);
    }

    public function changeStatus($id){
        $method = WithdrawMethod::find($id);
        if($method->status==1){
            $method->status=0;
            $method->save();
            $message= trans('admin_validation.Inactive Successfully');
        }else{
            $method->status=1;
            $method->save();
            $message= trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }
}
