@extends($active_theme)
@section('title')
    <title>{{__('user.Reset Password')}}</title>
    <meta name="description" content="{{__('user.Reset Password')}}">
@endsection

@section('frontend-content')
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/images/breadcrumb_bg.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__breadcrumb_text">
                        <h1>{{__('Reset password')}}</h1>
                        <ul class="d-flex flex-wrap">
                            <li><a href="{{ route('home') }}">{{__('home')}}</a></li>
                            <li><a href="javascript:;">{{__('Reset password')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->
 <!--=============================
        RESET PAGE START
    ==============================-->
    <section class="wsus__sign_up wsus__sign_in mt_120 xs_mt_80 pb_120 xs_pb_80">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 m-auto">
                    <div class="wsus__signup_text">
                        <h3>{{__('Reset Password')}}</h3>
                        <p class="description">{{__('Reset your Password to initiate the process of recovering access to your account.')}}</p>
                        <form action="{{ route('store-reset-password',$token) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="wsus__comment_single_input">
                                        <fieldset>
                                            <legend>{{__('Email address')}}*</legend>
                                            <input type="email" name="email" value="{{ $user->email }}"  placeholder="{{__('Email address')}}" readonly>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="wsus__comment_single_input">
                                        <fieldset>
                                            <legend>{{__('Password')}}*</legend>
                                            <input type="password" name="password" placeholder="Password">
                                            <span><i class="fas fa-eye-slash"></i></span>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="wsus__comment_single_input">
                                        <fieldset>
                                            <legend>{{__('Confirm password')}}*</legend>
                                            <input type="password" name="password_confirmation" placeholder="Confirm password">
                                            <span><i class="fas fa-eye-slash"></i></span>
                                        </fieldset>
                                    </div>
                                </div>
                                @if($recaptchaSetting->status==1)
                                    <div class="col-xl-12 mb-4">
                                        <div class="wsus__single_com mt_20">
                                            <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <button type="submit" class="common_btn">{{__('Reset Password')}}</button>
                                </div>
                            </div>
                        </form>
                        <p class="other_login">{{__('Alrady have an Account')}}? <a href="{{ route('login') }}">{{__('Login')}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        RESET PAGE END
    ==============================-->
@endsection
