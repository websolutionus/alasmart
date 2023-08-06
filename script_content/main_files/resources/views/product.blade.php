@extends($active_theme)
@section('title')
<title>{{ $seo_setting->seo_title }}</title>
@endsection

@section('title')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
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
                        <h1>{{__('Our Products')}}</h1>
                        <ul class="d-flex flex-wrap">
                            <li><a href="{{ route('home') }}">{{__('home')}}</a></li>
                            <li><a href="javascript:;">{{__('Our Products')}}</a></li>
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
        PRODUCT PAGE START
    ==============================-->
    <section class="wsus__product_page mt_120 xs_mt_80 mb_120 xs_mb_80">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xxl-6 col-xl-6 col-md-7 col-lg-6">
                    <div class="wsus__product_page_search">
                        <form id="search_form">
                            <input type="text" name="keyword" id="search_keyword" placeholder="{{__('Search your products')}}...">
                            <button class="common_btn" type="submit"><i class="far fa-search"></i> {{__('user.Search')}}</button>
                        </form>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-md-5 col-lg-4">
                    <div class="wsus__product_page_search">
                        <select class="select_js" id="sorting">
                            <option value="default" {{ request()->get('sorting')=='default'? 'selected':'' }}>{{__('Default sorting')}}</option>
                            <option value="script" {{ request()->get('sorting')=='script'? 'selected':'' }}>{{__('Script product')}}</option>
                            <option value="image" {{ request()->get('sorting')=='image'? 'selected':'' }}>{{__('Image product')}}</option>
                            <option value="video" {{ request()->get('sorting')=='video'? 'selected':'' }}>{{__('Video product')}}</option>
                            <option value="audio" {{ request()->get('sorting')=='audio'? 'selected':'' }}>{{__('Audio product')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="row">
                        @forelse ($products as $product)
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__gallery_item">
                                <div class="wsus__gallery_item_img">
                                    <img src="{{ asset($product->thumbnail_image) }}" alt="gallery" class="img-fluid w-100">
                                    <ul class="wsus__gallery_item_overlay">
                                        <li><a target="_blank" href="{{ $product->preview_link }}">{{__('Preview')}}</a></li>
                                        <li><a href="{{ route('product-detail', $product->slug) }}">{{__('Buy Now')}}</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__gallery_item_text">
                                    <p class="price">{{ $setting->currency_icon }}{{ html_decode($product->regular_price) }}</p>
                                    <a class="title" href="{{ route('product-detail', $product->slug) }}">{{ html_decode($product->name) }}</a>
                                    <p class="category">{{__('By')}} <span>{{ html_decode($product->author->name) }}</span> {{__('In')}} <a class="category"
                                            href="javascript:;" onclick="getCatSlug('{{ $product->category->slug }}')">{{ $product->category->name }}</a></p>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        @php
                                            $review=App\Models\Review::where(['product_id' => $product->id, 'status' => 1])->get()->average('rating');
                                            $sale=App\Models\OrderItem::where(['product_id' => $product->id])->get()->count();
                                            $wishlist=App\Models\Wishlist::where(['product_id' => $product->id])->get()->count();
                                        @endphp
                                        <li>
                                            <p>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>({{ $review == 0 ? 0 : $review }})</span>
                                            </p>
                                            @if ($review > 0)
                                            <p class="product-review-rating">
                                                @for ($i = 0; $i < $review; $i++)
                                                <i class="fas fa-star"></i>
                                                @endfor
                                            </p>
                                            @endif
                                        </li>
                                        <li>
                                            <span class="love"><i class="far fa-heart"></i> {{ $wishlist }}</span>
                                            <span class="download"><i class="far fa-download"></i> {{ $sale }} {{__('Sale')}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center mt-5">
                            <h2 class="text-danger mt-5">{{__('Product Not Found')}}</h2>
                       </div>
                        @endforelse
                    </div>
                    <div class="wsus__pagination mt_50">
                        {{ $products->links('custom_pagination') }}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="wsus__product_sidebar_area mt_25">
                        <div class="wsus__product_sidebar categories">
                            <h3>{{__('user.Categories')}}</h3>
                            <ul>
                                @foreach ($categories as $category)
                                @php
                                    $total_product = App\Models\Product::where(['status' => 1, 'category_id'=>$category->id])->count();
                                @endphp
                                <li><a href="javascript:;" onclick="getCatSlug('{{ $category->slug }}')">{{ $category->name }} <span>({{ $total_product }})</span> </a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="wsus__product_sidebar tags">
                            <h3>{{__('Filter Price')}}</h3>
                            <div id="slider-range" class="price-filter-range"></div>
                            <div class="range_price_area d-flex">
                                <p>{{__('user.Price')}}: <span>{{ $setting->currency_icon }}</span></p>
                                <div class="range_main_price d-flex">
                                    <input type="text" oninput="validity.valid||(value='0');" id="min_price"
                                        class="price-range-field" />
                                    <input type="text" oninput="validity.valid||(value='1000');" id="max_price"
                                        class="price-range-field" />
                                </div>
                            </div>
                            <input type="hidden" id="filter_min_price" name="min_price" value="0">
                            <input type="hidden" id="filter_max_price" name="max_price" value="1000">
                            <input type="hidden" id="get_min_price" value="{{ $min_price }}">
                            <input type="hidden" id="get_max_price" value="{{ $max_price }}">
                            <input type="hidden" id="product_max_price" value="{{ $product_max_price }}">
                            <button class="common_btn mt-3" onclick="priceFilter()"  type="submit">{{__('Filter')}}</button>
                        </div>
                    </div>
                    @if ($ad->status==1)
                    <div class="wsus__product_sidebar_offer">
                        <a target="__blank" href="{{ $ad->link }}">
                            <img src="{{ asset($ad->image) }}" alt="offer" class="img-fluid w-100">
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        PRODUCT PAGE END
    ==============================-->

    <form action="{{ route('products') }}" id="productSearchForm">

        @if (request()->has('sorting'))
        <input type="hidden" name="sorting" value="{{ request()->get('sorting') }}" id="search_sorting">
        @else
        <input type="hidden" name="sorting" value="" id="search_sorting">
        @endif

        @if (request()->has('category'))
            <input type="hidden" name="category" value="{{ request()->get('category') }}" id="search_category_slug">
        @else
            <input type="hidden" name="category" value="" id="search_category_slug">
        @endif


        @if (request()->has('min_price'))
        <input type="hidden" name="min_price" value="{{ request()->get('min_price') }}" id="search_min_price">
        @else
            <input type="hidden" name="min_price" value="" id="search_min_price">
        @endif

        @if (request()->has('max_price'))
            <input type="hidden" name="max_price" value="{{ request()->get('max_price') }}" id="search_max_price">
        @else
            <input type="hidden" name="max_price" value="" id="search_max_price">
        @endif

        @if (request()->has('keyword'))
            <input type="hidden" name="keyword" value="{{ request()->get('keyword') }}" id="keyword">
        @else
            <input type="hidden" name="keyword" value="" id="keyword">
        @endif
    
    </form>
@endsection
@push('frontend_js')
<script>
    (function($) {
        "use strict";
         $(document).ready(function () {

            $("#sorting").on("change", function(){
                $("#search_sorting").val($(this).val());
                $("#productSearchForm").submit();

            });

            $("#search_form").on("submit", function(e){
                e.preventDefault();

                $("#keyword").val($("#search_keyword").val());
                $("#productSearchForm").submit();
            });
        });
    })(jQuery);
    function getCatSlug(slug){
        $("#search_category_slug").val(slug);
        $("#productSearchForm").submit();
    }

    function priceFilter(){
        let filter_min_price = $('#filter_min_price').val();
        let filter_max_price = $('#filter_max_price').val();
        $('#search_min_price').val(filter_min_price);
        $('#search_max_price').val(filter_max_price);
        $("#productSearchForm").submit();
    }
</script>
@endpush
