@extends($active_theme)

@section('title')
    <title>{{__('Cart view')}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{__('Cart view')}}">
@endsection

@section('frontend-content')
 @if ($carts->count()>0)
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/images/breadcrumb_bg.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__breadcrumb_text">
                        <h1>{{__('cart view')}}</h1>
                        <ul class="d-flex flex-wrap">
                            <li><a href="{{ route('home') }}">{{__('home')}}</a></li>
                            <li><a href="javascript:;">{{__('cart view')}}</a></li>
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
        CART VIEW START
    ==============================-->
    <section class="wsus__cart_view pt_120 xs_pt_80 pb_120 xs_pb_80">
        <div class="container">
            <div class="wsus__cart_area">
                <div class="row">
                    <div class="col-12">
                        <div class="wsus__cart_table">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="img">{{__('Product')}}</th>
                                            <th class="description"></th>
                                            <th class="price">{{__('price')}}</th>
                                            <th class="discount">{{__('Category')}}</th>
                                            <th class="action">{{__('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cartItem">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between mt_80">
                    <div class="col-xxl-5 col-xl-6 col-lg-6">
                        <form class="wsus__cart_coupone">
                            <input type="text" id="coupon_name" placeholder="{{__('Discount Code')}}">
                            <button class="common_btn" onclick="couponApply()" type="button">{{__('Apply')}}</button>
                        </form>
                    </div>
                    <div class="col-xxl-4 col-xl-5 col-lg-5">
                        <div class="wsus__cart_price_list">
                            <ul class="d-flex flex-wrap justify-content-end">
                                <li><a class="common_btn" href="{{ route('products') }}">{{__('Continue Shopping')}}</a></li>
                            </ul>
                            <div class="list_item" id="calprice">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        CART VIEW END
    ==============================-->


    <!--=============================
        RELATED PRODUCT START
    ==============================-->
    <section class="wsus__related_product wsus__galley_2 pt_115 xs_pt_75 pb_120 xs_pb_80">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <div class="wsus__section_heading mb_15">
                        <h5>{{__('Save time with pre-installed software')}}.</h5>
                        <h2>{{__('Related Products')}}.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($related_products as $product)
                <div class="col-xl-4 col-md-6">
                    <div class="wsus__gallery_item">
                        <div class="wsus__gallery_item_img">
                            <img src="{{ asset($product->thumbnail_image) }}" alt="gallery" class="img-fluid w-100">
                            <ul class="wsus__gallery_item_overlay">
                                <li><a target="__blank" href="{{ $product->preview_link }}">{{__('Preview')}}</a></li>
                                <li><a href="{{ route('product-detail', $product->slug) }}">{{__('Buy Now')}}</a></li>
                            </ul>
                        </div>
                        <div class="wsus__gallery_item_text">
                            @php
                                $review=App\Models\Review::where(['product_id' => $product->id, 'status' => 1])->get()->average('rating');
                                $sale=App\Models\OrderItem::where(['product_id' => $product->id])->get()->count();
                                $wishlist=App\Models\Wishlist::where(['product_id' => $product->id])->get()->count();
                            @endphp
                            <p class="rating">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <span>({{ $review == 0 ? 0 : $review }})</span>
                            </p>
                            @if ($review > 0)
                            <p class="rating featured-review-rating">
                                @for ($i = 0; $i < $review; $i++)
                                <i class="fas fa-star"></i>
                                @endfor
                            </p>
                            @endif
                            <p class="price">{{ $setting->currency_icon }}{{ html_decode($product->regular_price) }}</p>
                            <a class="title" href="{{ route('product-detail', $product->slug) }}">{{ html_decode($product->name) }}</a>
                            <p class="category">{{__('By')}} <span>{{ html_decode($product->author->name) }}</span> {{__('In')}} <a class="category"
                                    href="{{ route('products', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></p>
                            <span class="download"><i class="fas fa-download"></i> {{ $sale }} {{__('Sale')}}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-danger mt-5">
                    <h2 class="mt-5">{{__('Product Not Found')}}</h2>
                </div>
                @endforelse
            </div>
            <a href="{{ route('products') }}" class="common_btn">{{__('View All')}} <i class="far fa-long-arrow-right"></i></a>
        </div>
    </section>
    <!--=============================
        RELATED PRODUCT END
    ==============================-->
 @else
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/images/breadcrumb_bg.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__breadcrumb_text">
                        <h1>{{__('empty cart')}}</h1>
                        <ul class="d-flex flex-wrap">
                            <li><a href="{{ route('home') }}">{{__('home')}}</a></li>
                            <li><a href="javascript:;">{{__('empty cart')}}</a></li>
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
        CART EMPTY START
    ==============================-->
    <section class="wsus__cart_empty pt_120 xs_pt_80 pb_110 xs_pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-7 m-auto">
                    <div class="wsus__cart_empty_text">
                        <div class="img">
                            <img src="{{ asset('frontend/images/empty_cart_img.png') }}" alt="empty cart" class="img-fluid w-100">
                        </div>
                        <h3>{{__('Your cart is empty')}}</h3>
                        <a class="common_btn" href="{{ route('products') }}">{{__('Continue to Shoping')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        CART EMPTY END
    ==============================-->
 @endif
@endsection
