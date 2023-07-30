@extends($active_theme)
@section('title')
    <title>{{__('user.Dashboard')}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{__('user.Dashboard')}}">
@endsection

@section('frontend-content')
    <!--=============================
        PROFILE OVERVIEW START
    ==============================-->
    <section class="wsus__profile pt_150">
        <div class="container">
            {{-- start header section --}}
            @include('user.inc.profile_header')
            {{-- end header section --}}
            <div class="row">
                <div class="col-xl-8 col-lg-8 wow fadeInLeft" data-wow-duration="1s">
                    <div class="wsus__profile_overview">
                        @if ($user->about_me!=null)
                        <h2>{{__('About Me')}}</h2>
                        <p>{!! clean(html_decode($user->about_me)) !!}</p>  
                        @endif
                        @if ($user->my_skill!=null)
                        <h2>{{__('My Skills')}} :</h2>
                        <p>{!! clean(html_decode($user->my_skill)) !!}</p>
                        @endif
                    </div>
                </div>

                {{-- information --}}
                @php
                    $order_item=App\Models\OrderItem::where('author_id', $user->id)->get()->count();
                    $total_product=App\Models\Product::where(['author_id' => $user->id, 'status' => 1])->get()->count();
                    $total_review=App\Models\Review::where(['author_id' => $user->id, 'status' => 1])->get()->count();
                @endphp
                <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-duration="1s">
                    <div class="wsus__profile_sidebar">
                        <div class="wsus__profile_sedebar_item wsus__sidebar_buy_info mt_30">
                            <h3>{{__('Selling Info')}}</h3>
                            <ul class="info">
                                <li>
                                    <p><i class="fal fa-cart-plus"></i> {{__('Total Sale')}}</p>
                                    <span>{{ $order_item }}</span>
                                </li>
                                <li>
                                    <p><i class="far fa-box"></i> {{__('Item')}}</p>
                                    <span>{{ $total_product }}</span>
                                </li>
                                <li>
                                    <p><i class="fas fa-star"></i> {{__('Item Rating')}}</p>
                                    <span><i class="fas fa-star"></i> ({{ $total_review }})</span>
                                </li>
                            </ul>
                        </div>
                        <div class="wsus__profile_sedebar_item wsus__sidebar_pro_info mt_30">
                            <h3>{{__('Personal Info')}}</h3>
                            <ul>
                                <li><span>{{__('Country')}}</span> {{ $user->country ? $user->country->name : '' }}</li>
                                <li><span>{{__('City')}}</span> {{ $user->country ? $user->city->name : ''}}</li>
                                <li><span>{{__('Member Since')}}</span> {{ Carbon\Carbon::parse($user->created_at)->format('F Y') }}</li>
                            </ul>
                        </div>
                        @if (Auth::guard('web')->user()->id != $user->id)
                        <div class="wsus__profile_sedebar_item profile_sedebar_contact mt_30">
                            <h2>{{__('Contact Authors')}}</h2>
                            <form id="contactWithAuthor">
                                @csrf
                                <label>{{__('Email')}}*</label>
                                <input type="text" name="email" placeholder="example@gmail.com">
                                <label>{{__('Message')}}*</label>
                                <textarea rows="7" name="message"></textarea>
                                <button type="submit" class="common_btn" id="submitBtn">{{__('Send Message')}}</button>
                                <button class="common_btn d-none" id="showSpain" type="submit"><i class="fas fa-spinner fa-spin"></i></button>
                            </form>
                        </div>
                        <div class="wsus__profile_sedebar_item profile_sedebar_social mt_30">
                            <h2>{{__('Social Profile')}}</h2>
                            <ul class="d-flex flex-wrap">
                                <li>
                                    <a href="{{ $user->facebook }}">
                                        <img src="{{ asset('frontend') }}/images/Facebook.png" alt="icon" class="img-fluid w-100">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $user->pinterest }}">
                                        <img src="{{ asset('frontend') }}/images/Pinterest.png" alt="icon" class="img-fluid w-100">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $user->linkedIn }}">
                                        <img src="{{ asset('frontend') }}/images/LinkedIn.png" alt="icon" class="img-fluid w-100">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $user->dribbble }}">
                                        <img src="{{ asset('frontend') }}/images/Dribbble.png" alt="icon" class="img-fluid w-100">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $user->twitter }}">
                                        <img src="{{ asset('frontend') }}/images/Twitter.png" alt="icon" class="img-fluid w-100">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        PROFILE OVERVIEW END
    ==============================-->
@endsection
@section('frontend_js')
<script>
    (function($) {
        "use strict";
        $(document).ready(function () {
            $("#contactWithAuthor").on("submit", function(e){
                e.preventDefault();

                var isDemo = "{{ env('APP_MODE') }}"
                if(isDemo == 'DEMO'){
                    toastr.error('This Is Demo Version. You Can Not Change Anything');
                    return;
                }
                 $('#submitBtn').addClass('d-none');
                 $('#showSpain').removeClass('d-none');
                $.ajax({
                    url: "{{ route('contact-with-author') }}",
                    type:"post",
                    data:$('#contactWithAuthor').serialize(),
                    success:function(response){
                        if(response.status == 1){
                            toastr.success(response.message)
                            $("#contactWithAuthor").trigger("reset");
                            $('#submitBtn').removeClass('d-none');
                            $('#showSpain').addClass('d-none');
                        }
                    },
                    error:function(response){
                        if(response.status == 403){
                            toastr.error(response.responseJSON.message);
                            $('#submitBtn').removeClass('d-none');
                            $('#showSpain').addClass('d-none');
                        }else{
                            if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                            if(response.responseJSON.errors.message)toastr.error(response.responseJSON.errors.message[0])
                            $('#submitBtn').removeClass('d-none');
                            $('#showSpain').addClass('d-none');
                        }
                    }
                });
            });
        });
    })(jQuery);
</script>
@endsection
