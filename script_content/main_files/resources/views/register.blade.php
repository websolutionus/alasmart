@extends($active_theme)
@section('title')
    <title>{{__('user.Register')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Register')}}">
@endsection

@section('frontend-content')
<!--=============================
        REGISTRATION PAGE START
    ==============================-->
    <section class="wsus__login pt_180 pb_205">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-10 col-lg-7 m-auto wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__login_area">
                        <h2>{{__('Create Account')}}</h2>
                        <form action="{{ route('store-register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_inpu_area">
                                        <label>{{__('Name')}}*</label>
                                        <input type="text" name="name" placeholder="{{__('Name')}}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__login_inpu_area">
                                        <label>{{__('email')}}*</label>
                                        <input type="email"name="email" placeholder="{{__('example@gmail.com')}}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__login_inpu_area">
                                        <label>{{__('Password')}}*</label>
                                        <input type="password" id="password" name="password" placeholder="*****">
                                        <span id="spain" class="eye"><i id="icon" class="fas fa-eye-slash"></i></span>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__login_inpu_area">
                                        <label>{{__('confirm Password')}}*</label>
                                        <input type="password" name="c_password" placeholder="*****">
                                        <span class="eye"><i class="fas fa-eye-slash"></i></span>
                                    </div>
                                </div>
                                @if($recaptchaSetting->status==1)
                                    <div class="col-xl-12">
                                        <div class="wsus__single_com mt_20">
                                            <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xl-12 mt-2">
                                    <button class="common_btn" type="submit">{{__('Registration')}}</button>
                                </div>
                                <div class="col-xl-12">
                                    <p class="go_login">{{__('Already have Account')}}? <a href="{{ route('login') }}">{{__('Log In')}}</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="login_animi_area">
            <ul class="bg_animation">
                <li class="wow bounceIn" data-wow-duration=" 1000ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1100ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1200ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1300ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1400ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1500ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1600ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1700ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1800ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1900ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 2000ms"></li>
            </ul>
            <ul class="bg_animation bg_animation_r">
                <li class="wow bounceIn" data-wow-duration=" 1000ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1100ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1200ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1300ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1400ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1500ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1600ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1700ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1800ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1900ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 2000ms"></li>
            </ul>
        </div>
    </section>
    <!--=============================
        REGISTRATION PAGE END
    ==============================-->
@endsection