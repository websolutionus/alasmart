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
                        <h1>Our Products</h1>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#">home</a></li>
                            <li><a href="#">Our Products</a></li>
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
                        <form>
                            <input type="text" placeholder="Search your products...">
                            <button class="common_btn" type="submit"><i class="far fa-search"></i> Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-md-5 col-lg-4">
                    <div class="wsus__product_page_search">
                        <select class="select_js">
                            <option value="">All Resources</option>
                            <option value="">Red</option>
                            <option value="">Black</option>
                            <option value="">Orange</option>
                            <option value="">Rose Gold</option>
                            <option value="">Pink</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__gallery_item">
                                <div class="wsus__gallery_item_img">
                                    <img src="{{ asset('frontend/images/gallery_1.png') }}" alt="gallery" class="img-fluid w-100">
                                    <ul class="wsus__gallery_item_overlay">
                                        <li><a href="#">Preview</a></li>
                                        <li><a href="#">Buy Now</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__gallery_item_text">
                                    <p class="price">$69</p>
                                    <a class="title" href="#">Saas Landing Software Theme</a>
                                    <p class="category">By <span>QuomodoSoft</span> In <a class="category"
                                            href="#">Wordpress</a></p>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li>
                                            <p>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(5)</span>
                                            </p>
                                        </li>
                                        <li>
                                            <span class="love"><i class="far fa-heart"></i> 105</span>
                                            <span class="download"><i class="far fa-download"></i> 11 Sale</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__gallery_item">
                                <div class="wsus__gallery_item_img">
                                    <img src="{{ asset('frontend/images/gallery_2.png') }}" alt="gallery" class="img-fluid w-100">
                                    <ul class="wsus__gallery_item_overlay">
                                        <li><a href="#">Preview</a></li>
                                        <li><a href="#">Buy Now</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__gallery_item_text">
                                    <p class="price">$51</p>
                                    <a class="title" href="#">Oifolio-Digital Marketing Theme</a>
                                    <p class="category">By <span>QuomodoSoft</span> In <a class="category"
                                            href="#">Wordpress</a></p>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li>
                                            <p>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(8)</span>
                                            </p>
                                        </li>
                                        <li>
                                            <span class="love"><i class="far fa-heart"></i> 125</span>
                                            <span class="download"><i class="far fa-download"></i> 12 Sale</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__gallery_item">
                                <div class="wsus__gallery_item_img">
                                    <img src="{{ asset('frontend/images/gallery_3.png') }}" alt="gallery" class="img-fluid w-100">
                                    <ul class="wsus__gallery_item_overlay">
                                        <li><a href="#">Preview</a></li>
                                        <li><a href="#">Buy Now</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__gallery_item_text">
                                    <p class="price">$42</p>
                                    <a class="title" href="#">Apps Premium Landing Theme</a>
                                    <p class="category">By <span>QuomodoSoft</span> In <a class="category"
                                            href="#">Wordpress</a></p>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li>
                                            <p>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(1)</span>
                                            </p>
                                        </li>
                                        <li>
                                            <span class="love"><i class="far fa-heart"></i> 132</span>
                                            <span class="download"><i class="far fa-download"></i> 41 Sale</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__gallery_item">
                                <div class="wsus__gallery_item_img">
                                    <img src="{{ asset('frontend/images/gallery_4.png') }}" alt="gallery" class="img-fluid w-100">
                                    <ul class="wsus__gallery_item_overlay">
                                        <li><a href="#">Preview</a></li>
                                        <li><a href="#">Buy Now</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__gallery_item_text">
                                    <p class="price">$57</p>
                                    <a class="title" href="#">Apps Premium Landing Theme</a>
                                    <p class="category">By <span>QuomodoSoft</span> In <a class="category"
                                            href="#">Wordpress</a></p>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li>
                                            <p>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(5)</span>
                                            </p>
                                        </li>
                                        <li>
                                            <span class="love"><i class="far fa-heart"></i> 102</span>
                                            <span class="download"><i class="far fa-download"></i> 17 Sale</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__gallery_item">
                                <div class="wsus__gallery_item_img">
                                    <img src="{{ asset('frontend/images/gallery_5.png') }}" alt="gallery" class="img-fluid w-100">
                                    <ul class="wsus__gallery_item_overlay">
                                        <li><a href="#">Preview</a></li>
                                        <li><a href="#">Buy Now</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__gallery_item_text">
                                    <p class="price">$54</p>
                                    <a class="title" href="#">Saas Landing Software Theme</a>
                                    <p class="category">By <span>QuomodoSoft</span> In <a class="category"
                                            href="#">Wordpress</a></p>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li>
                                            <p>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(9)</span>
                                            </p>
                                        </li>
                                        <li>
                                            <span class="love"><i class="far fa-heart"></i> 153</span>
                                            <span class="download"><i class="far fa-download"></i> 21 Sale</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__gallery_item">
                                <div class="wsus__gallery_item_img">
                                    <img src="{{ asset('frontend/images/gallery_6.png') }}" alt="gallery" class="img-fluid w-100">
                                    <ul class="wsus__gallery_item_overlay">
                                        <li><a href="#">Preview</a></li>
                                        <li><a href="#">Buy Now</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__gallery_item_text">
                                    <p class="price">$45</p>
                                    <a class="title" href="#">Apps Premium Landing Theme</a>
                                    <p class="category">By <span>QuomodoSoft</span> In <a class="category"
                                            href="#">Wordpress</a></p>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li>
                                            <p>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(7)</span>
                                            </p>
                                        </li>
                                        <li>
                                            <span class="love"><i class="far fa-heart"></i> 132</span>
                                            <span class="download"><i class="far fa-download"></i> 41 Sale</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__gallery_item">
                                <div class="wsus__gallery_item_img">
                                    <img src="{{ asset('frontend/images/gallery_1.png') }}" alt="gallery" class="img-fluid w-100">
                                    <ul class="wsus__gallery_item_overlay">
                                        <li><a href="#">Preview</a></li>
                                        <li><a href="#">Buy Now</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__gallery_item_text">
                                    <p class="price">$69</p>
                                    <a class="title" href="#">Saas Landing Software Theme</a>
                                    <p class="category">By <span>QuomodoSoft</span> In <a class="category"
                                            href="#">Wordpress</a></p>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li>
                                            <p>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(5)</span>
                                            </p>
                                        </li>
                                        <li>
                                            <span class="love"><i class="far fa-heart"></i> 105</span>
                                            <span class="download"><i class="far fa-download"></i> 11 Sale</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__gallery_item">
                                <div class="wsus__gallery_item_img">
                                    <img src="{{ asset('frontend/images/gallery_2.png') }}" alt="gallery" class="img-fluid w-100">
                                    <ul class="wsus__gallery_item_overlay">
                                        <li><a href="#">Preview</a></li>
                                        <li><a href="#">Buy Now</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__gallery_item_text">
                                    <p class="price">$51</p>
                                    <a class="title" href="#">Oifolio-Digital Marketing Theme</a>
                                    <p class="category">By <span>QuomodoSoft</span> In <a class="category"
                                            href="#">Wordpress</a></p>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li>
                                            <p>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span>(8)</span>
                                            </p>
                                        </li>
                                        <li>
                                            <span class="love"><i class="far fa-heart"></i> 125</span>
                                            <span class="download"><i class="far fa-download"></i> 12 Sale</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wsus__pagination mt_50">
                        <div class="row">
                            <div class="col-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <i class="far fa-angle-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link" href="#">04</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <i class="far fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="wsus__product_sidebar_area mt_25">
                        <div class="wsus__product_sidebar categories">
                            <h3>Categories</h3>
                            <ul>
                                <li><a href="#">Wordpress Themes <span>(07)</span> </a></li>
                                <li><a href="#">Html Template <span>(03)</span> </a></li>
                                <li><a href="#">React Template <span>(09)</span> </a></li>
                                <li><a href="#">Ui Kit <span>(12)</span> </a></li>
                                <li><a href="#">Mobile app ui <span>(04)</span> </a></li>
                                <li><a href="#">Fullter kit app <span>(02)</span> </a></li>
                                <li><a href="#">Laravel Progrom <span>(05)</span> </a></li>
                            </ul>
                        </div>
                        <div class="wsus__product_sidebar tags">
                            <h3>Products Price</h3>
                            <div id="slider-range" class="price-filter-range"></div>
                            <div class="range_price_area d-flex">
                                <p>Price: </p>
                                <div class="range_main_price d-flex">
                                    <input type="text" oninput="validity.valid||(value='0');" id="min_price"
                                        class="price-range-field" />
                                    <input type="text" oninput="validity.valid||(value='1000');" id="max_price"
                                        class="price-range-field" />
                                </div>
                            </div>
                        </div>
                        <div class="wsus__product_sidebar sidebar_tags">
                            <h3>tags</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    portfolio <span>(07)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                <label class="form-check-label" for="flexCheckDefault1">
                                    creative <span>(03)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                <label class="form-check-label" for="flexCheckDefault2">
                                    agency <span>(09)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                <label class="form-check-label" for="flexCheckDefault3">
                                    elementor <span>(12)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                                <label class="form-check-label" for="flexCheckDefault4">
                                    modern <span>(04)</span>
                                </label>
                            </div>
                        </div>
                        <div class="wsus__product_sidebar sidebar_tags">
                            <h3>sale</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                                <label class="form-check-label" for="flexCheckDefault5">
                                    No Sales <span>(12)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                                <label class="form-check-label" for="flexCheckDefault6">
                                    Low <span>(24)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
                                <label class="form-check-label" for="flexCheckDefault7">
                                    Medium <span>(36)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
                                <label class="form-check-label" for="flexCheckDefault8">
                                    High <span>(19)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
                                <label class="form-check-label" for="flexCheckDefault9">
                                    Top Sellers <span>(16)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="wsus__product_sidebar_offer">
                        <a href="#">
                            <img src="{{ asset('frontend/images/sidebar_offer_bg.jpg') }}" alt="offer" class="img-fluid w-100">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        PRODUCT PAGE END
    ==============================-->


    <!--=============================
        SUBSCRIBE START
    ==============================-->
    <section class="wsus__subscribe pt_85 pb_90" style="background: url({{ asset('frontend/images/subscribe_bg.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-sm-10 col-md-9 col-xl-8">
                    <div class="wsus__subscribe_text">
                        <h2>Subscribe Now</h2>
                        <p>Get the updates, offers, tips and enhance your page building experience</p>
                        <form>
                            <input type="text" placeholder="Enter your email address">
                            <button class="common_btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        SUBSCRIBE END
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
@section('frontend_js')
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

                $("#keyword").val($("#search").val());
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
@endsection
