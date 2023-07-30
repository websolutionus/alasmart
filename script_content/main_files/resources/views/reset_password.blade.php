@extends($active_theme)
@section('title')
    <title>{{__('user.Reset Password')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Reset Password')}}">
@endsection

@section('frontend-content')
 <!--=============================
        LOGIN PAGE START
    ==============================-->
    <section class="wsus__login pt_180 pb_205">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-10 col-lg-7 m-auto wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__login_area">
                        <h2>{{__('user.Reset Password')}}</h2>
                        <form action="{{ route('store-reset-password',$token) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 mt-3">
                                    <div class="wsus__login_inpu_area">
                                        <label>{{__('Email Address')}}*</label>
                                        <input type="text" name="email" value="{{ $user->email }}" placeholder="{{__('Email Address')}}" readonly
                                    </div>
                                </div>
                                <div class="col-xl-12 mt-3">
                                    <div class="wsus__login_inpu_area">
                                        <label>{{__('Password')}}*</label>
                                        <input type="password" name="password" placeholder="{{__('Password')}}">
                                    </div>
                                </div>
                                <div class="col-xl-12 mt-3">
                                    <div class="wsus__login_inpu_area">
                                        <label>{{__('Confirm password')}}*</label>
                                        <input type="password" name="password_confirmation" placeholder="{{__('Confirm password')}}">
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
                                    <button class="common_btn" type="submit">{{__('user.Reset Password')}}</button>
                                </div>
                                <p class="create_account">
                                    {{__('user.Already have an account ?')}}
                                    <a href="{{ route('login') }}">{{__('user.Login')}}</a>
                                </p>
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
        LOGIN PAGE END
    ==============================-->
@endsection
