<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Rules\Captcha;
use App\Helpers\MailHelper;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Mail\ContactWithAuthor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactWithAuthorController extends Controller
{
    public function contactWithAuthor(Request $request){
        if(Auth::guard('web')->check()){
            $rules = [
                'message'=>'required',
                'g-recaptcha-response'=>new Captcha()
            ];
            $customMessages = [
                'message.required' => trans('Message is required'),
            ];
            $this->validate($request, $rules,$customMessages);

            $user=Auth::guard('web')->user();
            $user_email=$user->email;
            $user_message=$request->message;
            $template=EmailTemplate::where('id',12)->first();
            $subject=$template->subject;
            $message=$template->description;
            $message = str_replace('{{message}}',$user_message,$message);

            MailHelper::setMailConfig();
            Mail::to($request->email)->send(new ContactWithAuthor($subject,$message,$user_email));

            $notification = trans('Message submit successfully');
            return response()->json(['status' => 1, 'message' => $notification]);
       }else{
            $notification = trans('Please login your account');
            return response()->json(['status' => 0, 'message' => $notification]);
       }
    }
}
