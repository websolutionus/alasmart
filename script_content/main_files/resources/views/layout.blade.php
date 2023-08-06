<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Alasmart - Digital Marketplace HTML Template</title>
    @php
        $setting = App\Models\Setting::select('logo_three', 'favicon', 'selected_theme','text_direction')->first();
    @endphp
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/price_range_style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/price_range_ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/summernote.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <!-- <link rel="stylesheet" href="frontend/css/rtl.css"> -->
</head>

<body class="home_2">

    <!--=============================
        TOPBAR START
    ==============================-->
    <section class="wsus__topbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 d-none d-lg-block">
                    <div class="wsus__topbar_countdown d-flex flex-wrap align-items-center">
                        <p><span>50% </span> Get Big Discount For a Limited time</p>
                        <div class="simply-countdown simply-countdown-one"></div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="wsus__topbar_language">
                        <ul class="wsus__multi_language d-flex flrx-wrap">
                            <li>
                                <a href="#">USD <i class="far fa-chevron-down"></i></a>
                                <ul class="droap_language">
                                    <li><a href="#">BDT</a></li>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">AED</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">English <i class="far fa-chevron-down"></i></a>
                                <ul class="droap_language">
                                    <li><a href="#">Japanes</a></li>
                                    <li><a href="#">Chines</a></li>
                                    <li><a href="#">Arabic</a></li>
                                    <li><a href="#">Hindi</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="user" href="profile_overview.html">
                                    <img src="{{ asset('frontend/images/user_icon.png') }}" alt="user" class="img-fluid w-100">
                                </a>
                                <ul class="user_droap_menu">
                                    <li>
                                        <a href="profile_overview.html"><i class="fal fa-layer-group"></i> Overview</a>
                                    </li>
                                    <li>
                                        <a href="profile_portfolio.html"><i class="far fa-box"></i> Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="profile_download.html"><i class="far fa-download"></i>
                                            Download File</a>
                                    </li>
                                    <li>
                                        <a href="profile_collection.html"><i class="far fa-folders"></i> Collection</a>
                                    </li>
                                    <li>
                                        <a href="profile_rating.html"><i class="fas fa-star"></i> Item Rating </a>
                                    </li>
                                    <li>
                                        <p>Earnings:</p>
                                        <h2>$727.50</h2>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        TOPBAR START
    ==============================-->


    <!--=============================
        MENU START
    ==============================-->
    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container">
            <a class="navbar-brand" href="index_2.html">
                <img src="{{ asset('frontend/images/main_logo.png') }}" alt="Alasmart" class="img-fluid w-100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars menu_icon"></i>
                <i class="far fa-times close_icon"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        @php
                            if($setting->selected_theme==1){
                               $route = route('home',['theme' => 1]);
                            }else if($setting->selected_theme==2){
                                $route = route('home',['theme' => 2]);
                            }else if($setting->selected_theme==3){
                                $route = route('home',['theme' => 3]);    
                            }else if($setting->selected_theme==0){
                                $route = route('home',['theme' => 1]);
                            }
                        @endphp
                        <a class="nav-link active" href="index.html">Home <i class="far fa-chevron-down"></i></a>
                        <ul class="wsus__droap_menu">
                            <li><a class="active" href="{{ route('home',['theme' => 1]) }}">{{__('home one')}}</a></li>
                            <li><a href="{{ route('home',['theme' => 2]) }}">{{__('home two')}}</a></li>
                            <li><a href="{{ route('home',['theme' => 3]) }}">{{__('home three')}}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products') }}">Products <i class="far fa-chevron-down"></i></a>
                        <ul class="wsus__droap_menu">
                            <li><a href="{{ route('about-us') }}">about us</a></li>
                            <li><a href="{{ route('become-author-page') }}">become an author</a></li>
                            <li><a href="blog_details.html">blog details</a></li>
                            <li><a href="cart_empty.html">empty cart</a></li>
                            <li><a href="cart_view.html">cart view</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pages <i class="far fa-chevron-down"></i></a>
                        <ul class="wsus__droap_menu">
                            <li><a href="404.html">404</a></li>
                            <li><a href="{{ route('about-us') }}">{{__('about us')}}</a></li>
                            <li><a href="{{ route('become-author-page') }}">{{__('become an author')}}</a></li>
                            <li><a href="{{ route('blogs', ['blog'=>'leftbar']) }}">blog leftbar</a></li>
                            <li><a href="{{ route('blogs', ['blog'=>'rightbar']) }}">blog rightbar</a></li>
                            <li><a href="blog_details.html">{{__('blog details')}}</a></li>
                            <li><a href="{{ route('cart-item') }}">cart view</a></li>
                            <li><a href="{{ route('checkout') }}">checkout</a></li>
                            <li><a href="{{ route('contact-us') }}">contact us</a></li>
                            <li><a href="cart_empty.html">empty cart</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="payment_done.html">payment done</a></li>
                            <li><a href="{{ route('privacy-policy') }}">privacy policy</a></li>
                            <li><a href="{{ route('terms-and-conditions') }}">terms and condition</a></li>
                            <li><a href="author_edit_profile.html">author profile edit</a></li>
                            <li><a href="upload_product.html">product upload</a></li>
                            <li><a href="upload_product_info_1.html">upload product info 1</a></li>
                            <li><a href="upload_product_info_2.html">upload product info 2</a></li>
                            <li><a href="upload_product_info_3.html">upload product info 3</a></li>
                            <li><a href="upload_product_info_4.html">upload product info 4</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact-us') }}">Contact</a>
                    </li>
                </ul>

                <ul class="right_menu d-flex flex-wrap">
                    <li>
                        <a href="{{ route('cart-view') }}">
                            <img src="{{ asset('frontend/images/menu_cart_icom.png') }}" alt="user" class="img-fluid w-100">
                            <span id="cartQty">0</span>
                        </a>
                    </li>
                    <li><a class="start_btn" href="#">Start Selling</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--=============================
        MENU END
    ==============================-->


    @yield('frontend-content')

    @if (!Route::is('home'))
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
    @endif

    <!--=============================
        FOOTER START
    ==============================-->
    <footer class="pt_120 xs_pt_80" style="background: url({{ asset('frontend/images/footer_bg.jpg') }});">
        <div class="container">

            @if (Route::is('home'))
            <div class="row">
                <div class="col-12">
                    <div class="wsus__subscribe_2 mb_80">
                        <div class="wsus__subscribe_2_text">
                            <h2>Subscribe Now</h2>
                            <p>Join Alasmart Digital Market Place Community.</p>
                        </div>
                        <form>
                            <input type="text" placeholder="Enter your email address">
                            <button class="common_btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-4">
                    <div class="wsus__footer_content">
                        <a class="footer_logo" href="index.html">
                            <img src="{{ asset('frontend/images/footer_logo.png') }}" alt="Alsmart" class="img-fluid w-100">
                        </a>
                        <p class="description">We don’t take ourselves too seriously seriously enough
                            ensure we’re creating the best product and experienc
                            our customer. I feel like help company name the same.
                            Our best-in-class WordPres solution with additional as
                            Corporate clients and leisure travelers.</p>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-lg-2">
                    <div class="wsus__footer_content">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Best Website</a></li>
                            <li><a href="#">Hosting</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Service Center</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-lg-2">
                    <div class="wsus__footer_content">
                        <h4>Online Shop</h4>
                        <ul>
                            <li><a href="#">Website design</a></li>
                            <li><a href="#">App Design</a></li>
                            <li><a href="#">Ui/Ux Desgin</a></li>
                            <li><a href="#">Seo Marketing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-lg-3">
                    <div class="wsus__footer_content">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Report Spam</a></li>
                            <li><a href="#">Knowledgebase</a></li>
                            <li><a href="#">Become an author </a></li>
                            <li><a href="#">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="wsus__footer_link mt_115 xs_mt_25">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <ul class="social_link d-flex flex-wrap">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="footer_counter d-flex flex-wrap">
                            <li>
                                <p>Active Customers</p>
                                <h3 class="counter">7,000</h3>
                            </li>
                            <li>
                                <p>Total Downloads</p>
                                <h3 class="counter">50,000</h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="wsus__footer_bottom">
            <div class="container max-width">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="wsus__footer_copyright d-flex flex-wrap">
                            <p>©2023 Quomodosoft All rights reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="wsus__footer_payment d-flex flex-wrap">
                            <div class="img">
                                <img src="{{ asset('frontend/images/payment_logo.png') }}" alt="payment gateway" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--=============================
        FOOTER END
    ==============================-->


    <!--============================
        SCROLL BUTTON START
    =============================-->
    <div class="wsus__scroll_btn">
        <p>Up to Top</p>
        <span><i class="far fa-angle-up"></i></span>
    </div>
    <!--============================
        SCROLL BUTTON END
    =============================-->


    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.7.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
    <!--countup js-->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!--slick js-->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!--nice select js-->
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <!--wow js-->
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <!--price range js-->
    <script src="{{ asset('frontend/js/price_range_script.js') }}"></script>
    <script src="{{ asset('frontend/js/price_range_ui.min.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!--summernote js-->
    <script src="{{ asset('frontend/js/summernote.min.js') }}"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif

    @stack('frontend_js')

    <script>
        (function($) {
            "use strict";
            $(document).ready(function () {
                $("#fsubscriberForm").on('submit', function(e){
                    e.preventDefault();
                    $('#fsubShowSpain').removeClass('d-none');
                    $('#fsubSubmitBtn').addClass('d-none');
                    var isDemo = "{{ env('APP_MODE') }}"
                    if(isDemo == 'DEMO'){
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }
    
                    let loading = "{{__('user.Processing...')}}"
    
                    $("#fsubscribe_btn").html(loading);
                    $("#fsubscribe_btn").attr('disabled',true);
    
                    $.ajax({
                        type: 'POST',
                        data: $('#fsubscriberForm').serialize(),
                        url: "{{ route('subscribe-request') }}",
                        success: function (response) {
                            if(response.status == 1){
                                toastr.success(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#fsubscribe_btn").html(subscribe);
                                $("#fsubscribe_btn").attr('disabled',false);
                                $("#fsubscriberForm").trigger("reset");
                                $('#fsubShowSpain').addClass('d-none');
                                $('#fsubSubmitBtn').removeClass('d-none');
                            }
    
                            if(response.status == 0){
                                toastr.error(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#fsubscribe_btn").html(subscribe);
                                $("#fsubscribe_btn").attr('disabled',false);
                                $("#fsubscriberForm").trigger("reset");
                                $('#fsubShowSpain').addClass('d-none');
                                $('#fsubSubmitBtn').removeClass('d-none');
                            }
                        },
                        error: function(err) {
                            $('#fsubShowSpain').addClass('d-none');
                            $('#fsubSubmitBtn').removeClass('d-none');
                            toastr.error('Something went wrong');
                            let subscribe = "{{__('user.Subscribe')}}"
                            $("#fsubscribe_btn").html(subscribe);
                            $("#fsubscribe_btn").attr('disabled',false);
                            $("#fsubscriberForm").trigger("reset");
                        }
                    });
                });
    
                $("#country_id").on("change",function(){
                    var countryId = $("#country_id").val();
                    if(countryId){
                        $.ajax({
                            type:"get",
                            url:"{{url('/state-by-country/')}}"+"/"+countryId,
                            success:function(response){
                                $("#state_id").html(response.states);
                            },
                            error:function(err){
    
                            }
                        })
                    }else{
                        var response= "<option value=''>{{__('user.Select a State')}}</option>";
                        $("#state_id").html(response);
                    }
    
                });
    
                $("#state_id").on("change",function(){
                    var stateId = $("#state_id").val();
                    if(stateId){
                        $.ajax({
                            type:"get",
                            url:"{{url('/city-by-state/')}}"+"/"+stateId,
                            success:function(response){
                                $("#city_id").html(response.cities);
                            },
                            error:function(err){
    
                            }
                        })
                    }else{
                        var response= "<option value=''>{{__('user.Select a city')}}</option>";
                        $("#state_id").html(response);
                    }
    
                });
    
                $('.select2').select2();
                tinymce.init({
                    selector: '#editor',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ]
                });
            });
        })(jQuery);
    
    </script>
    
    <script>
        "use strict";
        //wishlist start
            function addWishlist(product_id){
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:"POST",
                    url:"{{ url('/add/wishlist/') }}/"+product_id,
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            toastr.success(response.success);
                        }else{
                            toastr.error(response.error);
                        }
                    }
                })
            };
        //wishlist end
        //cart start
        function addToCard(product_id){
            let product_type=$('#product_type').val();
            let regular_price = $('#regular_price').text();
            let extend_price = $('#extend_price').text();
            let price = $('#price').text();
            let variant_id = $('#variant_id option:selected').val();
            let variant_name = $('#variant_id option:selected').text();
            let price_type = $('#price_type option:selected').val();
            let product_name = $('#product_name').val();
            let slug = $('#slug').val();
            let category_name = $('#category_name').val();
            let category_id = $('#category_id').val();
            let product_image = $('#product_image').val();
            let author_name = $('#author_name').val();
            let author_id = $('#author_id').val();
            $.ajax({
                headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                type:"POST",
                dataType:"json",
                data:{
                    product_type:product_type,
                    regular_price:regular_price,
                    extend_price:extend_price,
                    price:price,
                    variant_id:variant_id,
                    variant_name:variant_name,
                    price_type:price_type,
                    product_name:product_name,
                    slug:slug,
                    category_name:category_name,
                    category_id:category_id,
                    product_image:product_image,
                    author_name:author_name,
                    author_id:author_id,
                },
                url: "{{ url('/add-to-cart') }}" + "/" + product_id,
                success:function(response){
                    miniCart();
                    if(response.status == 1){
                        toastr.success(response.message);
                    }
                    if(response.status == 0){
                        toastr.error(response.message);
                    }
                }
            });
        };
    //add to cart function end
    //mini cart function start
        function miniCart(){
            $.ajax({
                type:"GET",
                dataType:"json",
                url: "{{ url('/mini-cart') }}",
                success:function(response){
                    $('#cartQty').text(response.cartQty);
                }
            });
        }
        miniCart();
        //mini cart function end
    
        //cart item  function start
        function cartItem(){
            $.ajax({
                type:"GET",
                dataType:"json",
                url: "{{ url('/cart-item') }}",
                success:function(response){
                    let cartItem="";
                    $('#cartTotal').text(response.cartTotal);
                    $.each(response.carts, function(key, value){
                        cartItem+=`<tr>
                                    <td class="img">
                                        <a href="{{ url('/product/${value.options.slug}') }}">
                                            <img src="${ value.options.image }" alt="cart item"
                                                class="img-fluid w-100">
                                        </a>
                                    </td>
                                    <td class="description">
                                        <h3><a href="{{ url('/product/${value.options.slug}') }}">${value.name}</a></h3>
                                        <p>
                                            <span>{{__('Item by')}}</span> ${value.options.author}
                                            <b class="${value.options.variant_name!=null?'':'d-none'}">${value.options.variant_name!=null?value.options.variant_name:''}</b>
                                            <b class="${value.options.price_type!=null?'':'d-none'}">${value.options.price_type!=null?value.options.price_type:''}</b>
                                        </p>
    
                                    </td>
                                    <td class="price">
                                        <p>${response.setting.currency_icon+value.price}</p>
                                    </td>
                                    <td class="discount">
                                        <p>${value.options.category}</p>
                                    </td>
                                    <td class="action">
                                        <a href="javascript:;" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="far fa-times"></i></a>
                                    </td>
                            </tr>`;
                    });
                    $('#cartItem').html(cartItem);
                }
            });
        }
        cartItem();
    
        function cartRemove(rowId){
            $.ajax({
                type:"GET",
                dataType:"json",
                url: "{{ url('/cart-remove') }}"+ "/" + rowId,
                success:function(response){
                    miniCart();
                    cartItem();
                    couponCalculation();
                    if(response.status == 1){
                        toastr.success(response.message);
                    }
                }
            });
        };
        //cart item function end
        //coupon start
        function couponApply(){
            let coupon_name=$('#coupon_name').val();
            if(coupon_name){
                $.ajax({
                    headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    },
                    type:"POST",
                    dataType:"json",
                    data:{
                        coupon_name:coupon_name,
                    },
                    url: "{{ url('/coupon-apply') }}",
                    success:function(response){
                        if(response.status == 1){
                            $('#coupon_name').val('');
                            couponCalculation();
                            toastr.success(response.message);
                        }
                        if(response.status == 0){
                            $('#coupon_name').val('');
                            toastr.error(response.message);
                        }
                    }
                });
            }else{
                toastr.error('Coupon is required');
            }
        };
    
        function couponCalculation(){
            $.ajax({
               type:"GET",
               url: "{{ url('/coupon-calculation') }}",
               dataType:'json',
               success:function(data){
                if(data.total){
                    $('#calprice').html(`
                        <p class="subtotal">{{__('subtotal')}} <span>${data.setting.currency_icon}<span id="cartTotal">${data.total}</span></span></p>
                        <p class="discount">{{__('Discount')}} <span>(-)${data.setting.currency_icon} 0</span></p>
                        <p class="total">{{__('Total')}} <span><span>${data.setting.currency_icon}<span>${data.total}</span></span></p>
                        <a class="common_btn" href="{{ route('checkout') }}">{{__('Proceed to Checkout')}}</a>
                    `);
                }else{
                    $('#calprice').html(`
                        <p class="subtotal">{{__('subtotal')}} <span>${data.setting.currency_icon}<span id="cartTotal">${data.sub_total}</span></span></p>
                        <p class="subtotal">{{__('coupon')}} <span>${data.coupon_name} <button type="submit" class="btn btn-danger btn-sm" onclick="couponRemove()"><i class="fa fa-times"></i></button></span></p>
                        <p class="discount">{{__('Discount')}} <span>(-)${data.setting.currency_icon} ${data.discount_amount}</span></p>
                        <p class="total">{{__('Total')}} <span><span>${data.setting.currency_icon}</span>${data.total_amount}</span></p>
                        <a class="common_btn" href="{{ route('checkout') }}">{{__('Proceed to Checkout')}}</a>
                    `);
                }
            }
         });
        };
        couponCalculation();
        function couponRemove(){
            $.ajax({
               type:"GET",
               url: "{{ url('/coupon-remove') }}",
               dataType:'json',
               success:function(response){
                 $('#coupon_name').val('');
                couponCalculation();
                if(response.status == 1){
                    toastr.success(response.message);
                }
            }
         })
        }
        //coupon end
    </script>

</body>

</html>