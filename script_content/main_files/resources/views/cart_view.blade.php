@extends($active_theme)

@section('title')
    <title>{{__('Cart view')}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{__('Cart view')}}">
@endsection

@section('frontend-content')
 @if ($carts->count()>0)
    <section class="wsus__breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h1>{{__('Cart View')}}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item">{{__('Cart view')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="breadcrumb_animi_area">
            <ul class="bg_animation breadcrumb_animi">
                <li class="wow bounceIn" data-wow-duration=" 1000ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1100ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1200ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1300ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1400ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1500ms"></li>
            </ul>
            <ul class="bg_animation bg_animation_r breadcrumb_animi breadcrumb_animi_r">
                <li class="wow bounceIn" data-wow-duration=" 1000ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1100ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1200ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1300ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1400ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1500ms"></li>
            </ul>
        </div>
    </section>


    
    <section class="wsus__cart_view pt_100">
        <div class="container">
            <div class="wsus__cart_area">
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                        <div class="wsus__cart_table">
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th class="img">{{__('Product')}}</th>
                                            <th class="description"></th>
                                            <th class="price">{{__('price')}}</th>
                                            <th class="discount">{{__('Category')}}</th>
                                            <th class="action">{{__('Action')}}</th>
                                        </tr>
                                    </tbody>
                                    <tbody id="cartItem">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between mt_50">
                    <div class="col-xl-5 col-lg-6 wow fadeInLeft"  data-wow-duration="1s">
                        <form class="wsus__cart_coupone">
                            <input type="text" id="coupon_name" placeholder="Discount Code">
                            <button class="common_btn" onclick="couponApply()" type="button">{{__('Apply')}}</button>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-5 wow fadeInRight" data-wow-duration="1s">
                        <div class="wsus__cart_price_list">
                            <div class="list_item" id="calprice">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="wsus__related_product mt_100 pt_95 pb_245">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 m-auto wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__section_heading mb_15">
                        <h5>{{__('Save time withd software')}}.</h5>
                        <h2>{{__('Related Products')}}.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="wsus__gallery_item">
                            <div class="wsus__gallery_item_img">
                                <img src="{{ asset($product->thumbnail_image) }}" alt="gallery" class="img-fluid w-100">
                                
                                <p><span>{{ $setting->currency_icon }}</span>{{ html_decode($product->regular_price) }}</p>
                                <ul class="wsus__gallery_item_overlay">
                                    <li><a target="__blank" href="{{ $product->preview_link }}">{{__('Preview')}}</a></li>
                                    <li><a href="{{ route('product-detail', $product->slug) }}">{{__('Buy Now')}}</a></li>
                                </ul>
                            </div>
                            <div class="wsus__gallery_item_text">
                                <p>{{__('By')}}<span>{{ html_decode($product->author->name) }}</span> {{__('In')}} <a class="category" href="{{ route('products', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></p>
                                <a class="title" href="{{ route('product-detail', $product->slug) }}">{{ html_decode($product->name) }}</a>
                                <ul class="d-flex flex-wrap justify-content-between">
                                    @php
                                        $review=App\Models\Review::where(['product_id' => $product->id, 'status' => 1])->get()->average('rating');
                                        $sale=App\Models\OrderItem::where(['product_id' => $product->id])->get()->count();
                                        $variant=App\Models\ProductVariant::where('product_id', $product->id)->first();
                                    @endphp
                                    <li><span><i class="fas fa-download"></i> {{ $sale }} {{__('Sale')}}</span></li>
                                    <li>
                                        <p>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </p>
                                        <p class="product-review">
                                            @for($i = 0; $i < $review; $i++)
                                            <i class="fas fa-star"></i>
                                            @endfor
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-danger mt-5">
                        <h2 class="mt-5">{{__('Product Not Found')}}</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--=============================
        RELATED PRODICT END
    ==============================-->
 @else
        <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="wsus__breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h1>{{__('Cart empty')}}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item">{{__('Cart empty')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="breadcrumb_animi_area">
            <ul class="bg_animation breadcrumb_animi">
                <li class="wow bounceIn" data-wow-duration=" 1000ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1100ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1200ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1300ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1400ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1500ms"></li>
            </ul>
            <ul class="bg_animation bg_animation_r breadcrumb_animi breadcrumb_animi_r">
                <li class="wow bounceIn" data-wow-duration=" 1000ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1100ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1200ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1300ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1400ms"></li>
                <li class="wow bounceIn" data-wow-duration=" 1500ms"></li>
            </ul>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=============================
        CART EMPTY START
    ==============================-->
    <section class="wsus__cart_empty pt_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-sm-10 col-md-8 col-lg-7 m-auto wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__cart_empty_text">
                        <div class="img">
                            <img src="{{ asset('frontend') }}/images/empty_cart.png" alt="empty cart" class="img-fluid w-100">
                        </div>
                        <h3>{{__('Your cart is empty')}}</h3>
                        <a class="common_btn2" href="{{ route('products') }}">{{__('Continue to Shopping')}}</a>
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
