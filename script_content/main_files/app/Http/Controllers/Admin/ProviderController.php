<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Ticket;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\OrderItem;
use App\Helpers\MailHelper;
use Illuminate\Http\Request;

use App\Models\EmailTemplate;
use App\Models\RefundRequest;
use App\Models\TicketMessage;
use App\Models\CompleteRequest;
use App\Models\MessageDocument;
use App\Models\ProviderWithdraw;
use App\Models\AdditionalService;
use App\Mail\SendSingleSellerMail;
use App\Models\AppointmentSchedule;
use App\Http\Controllers\Controller;
use App\Models\ProviderClientReport;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $products=Product::where('status', 1)->get();
        $author_arr=[];
        foreach($products as $product){
            $author_arr[] = $product->author_id;
        }
        $author_arr = array_unique($author_arr);

        $sellers = User::whereIn('id', $author_arr)->orderBy('id','desc')->where('status', 1)->get();

        return view('admin.provider', compact('sellers'));
    }



    public function sendEmailToAllProvider(){
        return view('admin.send_email_to_all_provider');
    }

    public function sendMailToAllProvider(Request $request){
        $rules = [
            'subject'=>'required',
            'message'=>'required'
        ];
        $customMessages = [
            'subject.required' => trans('Subject is required'),
            'message.required' => trans('Message is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $providers = User::where('is_provider', 1)->orderBy('id','desc')->get();
        MailHelper::setMailConfig();
        foreach($providers as $provider){
            Mail::to($provider->email)->send(new SendSingleSellerMail($request->subject,$request->message));
        }

        $notification = trans('Email Send Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function sendEmailToProvider($id){
        $user = User::find($id);
        return view('admin.send_provider_email', compact('user'));
    }

    public function sendMailtoSingleProvider(Request $request, $id){
        $rules = [
            'subject'=>'required',
            'message'=>'required'
        ];
        $customMessages = [
            'subject.required' => trans('Subject is required'),
            'message.required' => trans('Message is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = User::find($id);
        MailHelper::setMailConfig();
        Mail::to($user->email)->send(new SendSingleSellerMail($request->subject,$request->message));

        $notification = trans('Email Send Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function show($id){
        $seller = User::where('id', $id)->first();
        $setting = Setting::first();

        $default_avatar = array(
            'image' => $setting->default_avatar
        );
        $default_avatar = (object) $default_avatar;

        $orders = OrderItem::where('author_id', $seller->id)->get();
        $total_sold_product = $orders->count();
        
        $total_balance = $orders->sum('price');

        $total_withdraw = ProviderWithdraw::where('user_id', $seller->id)->sum('total_amount');

        $current_balance = $total_balance - $total_withdraw;

        $products = Product::where('author_id', $seller->id)->where('status', 1)->get();
        $total_product = $products->count();

        return view('admin.show_provider',compact('seller','setting','default_avatar','total_sold_product','total_withdraw','current_balance','total_balance', 'total_product'));

    }

    public function updateProvider(Request $request , $id){
        $provider = User::find($id);
        $rules = [
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$provider->id,
            'phone'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'designation'=>'required',
            'address'=>'required',
        ];
        $customMessages = [
            'name.required' => trans('Name is required'),
            'email.required' => trans('Email is required'),
            'email.unique' => trans('Email already exist'),
            'phone.required' => trans('Phone is required'),
            'country.required' => trans('Country or region is required'),
            'state.required' => trans('State or province is required'),
            'city.required' => trans('Service area is required'),
            'designation.required' => trans('Desgination is required'),
            'address.required' => trans('Address is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $provider->name = $request->name;
        $provider->phone = $request->phone;
        $provider->country = $request->country;
        $provider->state = $request->state;
        $provider->city = $request->city;
        $provider->designation = $request->designation;
        $provider->address = $request->address;
        $provider->save();

        $notification=trans('Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id){
        $user = User::find($id);
        $user_image = $user->image;
        $user->delete();
        if($user_image){
            if(File::exists(public_path().'/'.$user_image))unlink(public_path().'/'.$user_image);
        }

        Review::where('author_id',$id)->delete();
        $order_item=OrderItem::where('author_id',$id)->get();
        $order_id = [];
        foreach($order_item as $item){
            $order_id[] = $item->order_id;
        }
        $order_id =  array_unique($order_id);

        $orders=Order::whereIn('id',$order_id)->delete();
        OrderItem::where('author_id',$id)->delete();
        Product::where('author_id',$id)->delete();
        $notification = trans('Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function changeStatus($id){
        $provider = User::find($id);
        if($provider->status==1){
            $provider->status=0;
            $provider->save();
            $message= trans('Inactive Successfully');
        }else{
            $provider->status=1;
            $provider->save();
            $message= trans('Active Successfully');
        }
        return response()->json($message);
    }

}
