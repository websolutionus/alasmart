<?php

namespace App\Http\Controllers\Api\Auth;

use Str;
use Auth;
use Mail;
use Session;
use App\Models\User;
use App\Rules\Captcha;
use App\Models\Setting;
use App\Models\Language;
use App\Helpers\MailHelper;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Mail\UserRegistration;
use App\Models\BreadcrumbImage;
use App\Models\GoogleRecaptcha;
use App\Http\Controllers\Controller;
use App\Mail\UserRegistrationForOTP;
use Illuminate\Support\Facades\Hash;
use App\Models\SocialLoginInformation;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = '/dashboard';


    public function __construct()
    {
        $this->middleware('guest:api');
    }

    public function translator($lang_code){
        $front_lang = Session::put('front_lang', $lang_code);
        config(['app.locale' => $lang_code]);
    }

   public function registerPage(){
    $this->translator();
    $recaptchaSetting = GoogleRecaptcha::first();
    
    $active_theme = 'layout2';

    return view('register')->with([
        'active_theme' => $active_theme,
        'recaptchaSetting' => $recaptchaSetting,
    ]);
   }

    public function loginPage(){
        $this->translator();
        $recaptchaSetting = GoogleRecaptcha::first();
        $socialLogin = SocialLoginInformation::first();

        $setting = Setting::first();
        $login_page = array(
            'image' => $setting->login_image
        );
        $login_page = (object) $login_page;

        $active_theme = 'layout2';

        return view('register')->with([
            'active_theme' => $active_theme,
            'recaptchaSetting' => $recaptchaSetting,
            'socialLogin' => $socialLogin,
            'login_page' => $login_page,
        ]);
    }

    public function storeRegister(Request $request){
        $this->translator($request->lang_code);
        $rules = [
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:4',
            'c_password' => 'required|same:password',
            'g-recaptcha-response'=>new Captcha()
        ];
        $customMessages = [
            'name.required' => trans('user_validation.Name is required'),
            'email.required' => trans('user_validation.Email is required'),
            'email.unique' => trans('user_validation.Email already exist'),
            'password.required' => trans('user_validation.Password is required'),
            'password.min' => trans('user_validation.Password must be 4 characters'),
            'c_password.required' => trans('user_validation.Confirm password is required'),
            'c_password.same' => trans('user_validation.Confirm password does not match'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = new User();
        $user->name = $request->name;
        $user->user_name = Str::lower(str_replace(' ','_', $request->name)).'_'.mt_rand(100000, 999999);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->otp_mail_verify_token = random_int(100000, 999999);
        $user->save();

        MailHelper::setMailConfig();

        $template=EmailTemplate::where('id',4)->first();
        $subject=$template->subject;
        $message=$template->description;
        $message = str_replace('{{user_name}}',$request->name,$message);
        Mail::to($user->email)->send(new UserRegistrationForOTP($message,$subject,$user));

        $notification = trans('user_validation.Register Successfully. Please Verify your email');
        return response()->json(['message' => $notification]);
    }


    public function resend_register_code(Request $request){
        $this->translator($request->lang_code);
        $rules = [
            'email'=>'required',
        ];
        $customMessages = [
            'email.required' => trans('user_validation.Email is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = User::where('email', $request->email)->first();
        if($user){
            if($user->email_verified == 0){
                try{
                    MailHelper::setMailConfig();

                    $template=EmailTemplate::where('id',10)->first();
                    $subject=$template->subject;
                    $message=$template->description;
                    $message = str_replace('{{user_name}}',$user->name,$message);
                    Mail::to($user->email)->send(new UserRegistrationForOTP($message,$subject,$user));
                }catch(Exception $ex){}

                $notification = trans('user_validation.Code resend successfully');
                return response()->json(['message' => $notification]);
            }else{
                $notification = trans('user_validation.Already verfied your account');
                return response()->json(['message' => $notification],403);
            }

        }else{
            $notification = trans('user_validation.Email does not exist');
            return response()->json(['message' => $notification],403);
        }
    }

    
    public function userVerification(Request $request){
        $this->translator($request->lang_code);
        $rules = [
            'email'=>'required',
            'token'=>'required',
        ];
        $customMessages = [
            'email.required' => trans('user_validation.Email is required'),
            'token.required' => trans('user_validation.Token is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = User::where('otp_mail_verify_token',$request->token)->where('email', $request->email)->first();
        if($user){
            $user->verify_token = null;
            $user->otp_mail_verify_token = null;
            $user->status = 1;
            $user->email_verified = 1;
            $user->save();
            $notification = trans('user_validation.Verification Successfully');
            return response()->json(['message' => $notification]);

        }else{
            $notification = trans('user_validation.Email or token does not exist');
            return response()->json(['message' => $notification],403);
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
