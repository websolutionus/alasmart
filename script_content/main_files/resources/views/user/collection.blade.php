@extends($active_theme)

@section('title')
    <title>{{__('User Collection')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('User Collection')}}">
@endsection

@section('frontend-content')

    <!--=============================
        PROFILE COLLECTION START
    ==============================-->
    <section class="wsus__profile pt_150">
        <div class="container">
            {{-- start header section --}}
            @include('user.inc.profile_header')
            {{-- end header section --}}

            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="wsus__profile_collection mt_15">
                        <div class="row">
                            @forelse ($wishlists as $wishlist)
                            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1s">
                                <div class="wsus__gallery_item">
                                    <div class="wsus__gallery_item_img">
                                        <img src="{{ asset($wishlist->product->thumbnail_image) }}" alt="gallery" class="img-fluid w-100">
                                        <p><span>{{ $setting->currency_icon }}</span>{{ html_decode($wishlist->product->regular_price) }}</p>
                                        <ul class="wsus__gallery_item_overlay">
                                            <li><a target="__blank" href="{{ $wishlist->product->preview_link }}">{{__('Preview')}}</a></li>
                                            <li><a href="{{ route('delete-wishlist', $wishlist->id) }}">{{__('Delete')}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="wsus__gallery_item_text">
                                        <p>{{__('By')}}<span>{{ html_decode($wishlist->product->author->name) }}</span> {{__('In')}} <a class="category" href="{{ route('products', ['category' => $wishlist->product->category->slug]) }}">{{ $wishlist->product->category->name }}</a></p>
                                        <a class="title" href="{{ route('product-detail', $wishlist->product->slug) }}">{{ html_decode($wishlist->product->name) }}</a>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            @php
                                            $review=App\Models\Review::where(['product_id' => $wishlist->product->id, 'status' => 1])->get()->average('rating');

                                            $sale=App\Models\OrderItem::where(['product_id' => $wishlist->product->id])->get()->count();
                                            @endphp
                                            <li><a href="{{ route('product-detail', $wishlist->product->slug) }}"><i class="fas fa-download"></i> {{ $sale }} {{__('Sale')}}</a></li>
                                            <li>
                                                <p>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </p>
                                                <p class="product-review">
                                                    @for ($i = 0; $i < $review; $i++)
                                                    <i class="fas fa-star"></i>
                                                    @endfor
                                                </p>
                                            </li>
                                            <br>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center text-danger mt-5">
                                <h2 class="mt-5">{{__('Collection not found')}}</h2>
                           </div>
                            @endforelse
                        </div>
                        <div class="row">
                             {{ $wishlists->links('custom_pagination') }}
                        </div>
                    </div>
                </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        PROFILE COLLECTION END
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
