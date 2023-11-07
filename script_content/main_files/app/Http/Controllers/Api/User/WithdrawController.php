<?php

namespace App\Http\Controllers\Api\User;

use Auth;
use Session;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Language;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\WithdrawMethod;
use App\Models\ProviderWithdraw;
use App\Http\Controllers\Controller;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function translator($lang_code){
        $front_lang = Session::put('front_lang', $lang_code);
        config(['app.locale' => $lang_code]);
    }

    public function index(Request $request){
        $this->translator($request->lang_code);
        $user = Auth::guard('api')->user();
        $author = $user;
        $setting = Setting::first();
        $withdraw_methods=WithdrawMethod::where('status', 1)->get();
        $withdraws = ProviderWithdraw::where('user_id',$author->id)->orderBy('id','desc')->get();


        $order_items = OrderItem::where('author_id', $author->id)->get();
        $total_sold_product = $order_items->count();
        $order_item_id_arr=[];
        foreach($order_items as $order_item){
            $order_item_id_arr[]=$order_item->order_id;
        }
        $order_item_id_arr=array_unique($order_item_id_arr);
        $orders = Order::whereIn('id', $order_item_id_arr)->where('order_status', 1)->get();

        $order_id_arr=[];
        
        foreach($orders as $order){
            $order_id_arr[]=$order->id;
        }
        $order_id_arr=array_unique($order_id_arr);
        $orders_items = OrderItem::whereIn('order_id', $order_id_arr)->get();
        
        $total_balance = $orders_items->sum('price');
        
        $total_withdraw = ProviderWithdraw::where('user_id', $author->id)->sum('total_amount');
        $current_balance = $total_balance - $total_withdraw;

        return response()->json([
            'user' => $user,
            'setting' => $setting,
            'withdraws' => $withdraws,
            'withdraw_methods' => $withdraw_methods,
            'total_balance' => $total_balance,
            'total_withdraw' => $total_withdraw,
            'current_balance' => $current_balance,
        ]);
    }
    public function show($id){
        $this->translator();
        $withdraw = ProviderWithdraw::find($id);
        $setting = Setting::first();
        $currency_icon = array(
            'icon' => $setting->currency_icon
        );
        $currency_icon = (object) $currency_icon;
        return view('provider.show_withdraw', compact('withdraw','currency_icon'));
    }

    public function create(){
        $this->translator();
        $methods = WithdrawMethod::whereStatus('1')->get();
        return view('provider.create_withdraw', compact('methods'));
    }

    public function getWithDrawAccountInfo(Request $request, $id){
        $this->translator($request->lang_code);
        $method = WithdrawMethod::whereId($id)->first();
        $setting = Setting::first();
        $currency_icon = array(
            'icon' => $setting->currency_icon
        );
        $currency_icon = (object) $currency_icon;
        return response()->json([
            'method' => $method,
            'currency_icon' => $currency_icon,
        ]);
    }

    public function store(Request $request){
        $this->translator($request->lang_code);
        $rules = [
            'method_id' => 'required',
            'withdraw_amount' => 'required|numeric',
            'account_info' => 'required',
        ];

        $customMessages = [
            'method_id.required' => trans('user_validation.Payment Method field is required'),
            'withdraw_amount.required' => trans('user_validation.Withdraw amount field is required'),
            'withdraw_amount.numeric' => trans('user_validation.Please provide valid numeric number'),
            'account_info.required' => trans('user_validation.Account field is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $user = Auth::guard('api')->user();

        $author = $user;
        $order_items = OrderItem::where('author_id', $author->id)->get();
        $total_sold_product = $order_items->count();
        $order_item_id_arr=[];
        foreach($order_items as $order_item){
            $order_item_id_arr[]=$order_item->order_id;
        }
        $order_item_id_arr=array_unique($order_item_id_arr);
        $orders = Order::whereIn('id', $order_item_id_arr)->where('order_status', 1)->get();

        $order_id_arr=[];
        
        foreach($orders as $order){
            $order_id_arr[]=$order->id;
        }
        $order_id_arr=array_unique($order_id_arr);
        $orders_items = OrderItem::whereIn('order_id', $order_id_arr)->get();
        
        $total_balance = $orders_items->sum('price');

        $total_withdraw = ProviderWithdraw::where('user_id', $author->id)->sum('total_amount');
        $current_balance = $total_balance - $total_withdraw;

        if($request->withdraw_amount > $current_balance){
            $notification = trans('user_validation.Sorry! Your Payment request is more then your current balance');
            return response()->json(['message' => $notification], 403);
        }

        $method = WithdrawMethod::whereId($request->method_id)->first();
        if($request->withdraw_amount >= $method->min_amount && $request->withdraw_amount <= $method->max_amount){
            $widthdraw = new ProviderWithdraw();
            $widthdraw->user_id = $author->id;
            $widthdraw->method = $method->name;
            $widthdraw->total_amount = $request->withdraw_amount;
            $withdraw_request = $request->withdraw_amount;
            $withdraw_amount = ($method->withdraw_charge / 100) * $withdraw_request;
            $widthdraw->withdraw_amount = $request->withdraw_amount - $withdraw_amount;
            $widthdraw->withdraw_charge = $method->withdraw_charge;
            $widthdraw->account_info = $request->account_info;
            $widthdraw->save();
            $notification = trans('user_validation.Withdraw request send successfully, please wait for admin approval');
            return response()->json(['message' => $notification]);

        }else{
            $notification = trans('user_validation.Your amount range is not available');
            return response()->json(['message' => $notification], 403);
        }

    }
}
