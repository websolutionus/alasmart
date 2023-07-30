@extends($active_theme)

@section('title')
    <title>{{__('Payment Success')}}</title>
@endsection

@section('title')
    <meta name="description" content="{{__('Payment Success')}}">
@endsection

@section('frontend-content')
<section class="wsus__payment_done pt_185">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-xxl-5 col-md-8 m-auto wow fadeInUp" data-wow-duration="1s">
                <div class="wsus__payment_done_text">
                    <div class="wsus__payment_done_img">
                        <img src="{{ asset('frontend') }}/images/thankyou.png" alt="thankyou" class="img-fluid w-100">
                    </div>
                    <h3>{{__('Thank You')}} ! <br> {{__('For Buying this Item')}}.</h3>
                    <a class="common_btn2" href="{{ route('download') }}">{{__('Download File')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
