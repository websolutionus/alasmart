<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>Alasmart - Digital Marketplace HTML Template</title>
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
</head>

<body class="home_3">

    <!--=============================
        MENU START
    ==============================-->
    <nav class="navbar navbar-expand-lg main_menu main_menu_3">
        <div class="container">
            <a class="navbar-brand" href="index_3.html">
                <img src="{{ asset('frontend/images/logo_2.png') }}" alt="Alasmart" class="img-fluid w-100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars menu_icon"></i>
                <i class="far fa-times close_icon"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index_3.html">Home <i class="far fa-chevron-down"></i></a>
                        <ul class="wsus__droap_menu">
                            <li><a class="active" href="{{ route('home',['theme' => 1]) }}">home one</a></li>
                            <li><a href="{{ route('home',['theme' => 2]) }}">home two</a></li>
                            <li><a href="{{ route('home',['theme' => 3]) }}">home three</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">Products <i class="far fa-chevron-down"></i></a>
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
                            <li><a href="{{ route('about-us') }}">about us</a></li>
                            <li><a href="become_an_author.html">become an author</a></li>
                            <li><a href="blog_leftbar.html">blog leftbar</a></li>
                            <li><a href="blog_rightbar.html">blog rightbar</a></li>
                            <li><a href="blog_details.html">blog details</a></li>
                            <li><a href="cart_view.html">cart view</a></li>
                            <li><a href="checkout.html">checkout</a></li>
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
                        <a href="#">
                            <img src="{{ asset('frontend/images/menu_cart_icom.png') }}" alt="user" class="img-fluid w-100">
                            <span>4</span>
                        </a>
                    </li>
                    <li><a class="start_btn" href="#">Start Selling</a></li>
                    <li><a class="support_btn" href="#">Live Support</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--=============================
        MENU END
    ==============================-->

    @yield('frontend-content')

    <!--=============================
        SUBSCRIBE 3 START
    ==============================-->
    <section class="wsus__subscribe mt_120 xs_mt_30 mb_120 xs_mb_30">
        <div class="container">
            <div class="wsus__subscribe_3_bg" style="background: url({{ asset('frontend/images/subscribe_bg_3.jpg') }});">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="wsus__subscribe_text">
                            <h2>Subscribe Now</h2>
                            <p>Subscribe to our newsletter & stay update</p>
                            <form>
                                <input type="text" placeholder="Enter your email address">
                                <button class="common_btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        SUBSCRIBE 3 END
    ==============================-->


    <!--=============================
        FOOTER START
    ==============================-->
    <footer class="pt_120 xs_pt_80" style="background: url({{ asset('frontend/images/footer_bg.jpg') }});">
        <div class="container">
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

</body>

</html>