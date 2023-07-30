@extends($active_theme)

@section('title')
    <title>{{ $product->name }}</title>
    <title>{{ $product->seo_title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $product->seo_description }}">
@endsection

@section('frontend-content')
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="wsus__breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h1>{{__('product details')}}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item">{{__('Product details')}}</li>
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
        PRODUCT DETAILS START
    ==============================-->
    <section class="wsus__product_details pt_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__product_details_slider">
                        <div class="row pro_det_slider">
                            <div class="col-12">
                                <div class="wsus__product_details_slider_item">
                                    <img src="{{ asset($product->thumbnail_image) }}" alt="product details"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wsus__product_details_text">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true"><i class="fal fa-layer-group"></i> {{__('Description')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false"><i class="far fa-comments"></i>
                                    {{__('Comments')}} ({{ $productComments->count() }})</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false"><i class="far fa-star"></i>
                                    {{__('Review')}}</button>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="text-secondary add_wishlist" onclick="addWishlist({{ $product->id }})"><i class="far fa-heart"></i> {{__('Add Wishlist')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="wsus__pro_description">
                                    <p>{!! clean(html_decode($product->description)) !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="wsus__pro_det_comment mt_50">
                                    @foreach ($productComments as $productComment)
                                    <div class="wsus__single_comment">
                                        <p class="comment_date">{{ Carbon\Carbon::parse($productComment->created_at)->format('F d,Y') }} {{__('At')}} {{  Carbon\Carbon::parse($productComment->created_at)->format('h:i A') }}</p>
                                        <p class="comment_des">
                                            {!! clean(html_decode($productComment->comment)) !!}
                                        </p>
                                        <div class="comment_footer d-flex flex-wrap mt-4">
                                            <div class="img">
                                                @if($productComment->user->image!=null)
                                                <img src="{{ asset($productComment->user->image) }}" alt="user" class="img-fluid w-100">
                                                @elseif($productComment->user->provider=='google')
                                                <img src="{{ asset($productComment->user->provider_avatar) }}" alt="user" class="img-fluid w-100">
                                                @else
                                                <img src="{{ asset($setting->default_avatar) }}" alt="user" class="img-fluid w-100">
                                                @endif
                                            </div>

                                            <div class="text">
                                                <h3>{{ html_decode($productComment->name) }}</h3>
                                                <p>{{ html_decode($productComment->address) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="wsus__pagination mt_50">
                                        <div class="col-12">
                                            {{ $productComments->links('custom_pagination') }}
                                        </div>
                                    </div>

                                    <form id="productCommentForm" class="wsus__comment_input_area mt_60" method="POST">
                                        @csrf
                                        <h3>{{__('Leave a Comment')}}</h3>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="wsus__comment_single_input">
                                                    <label>{{__('Comment')}}*</label>
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <textarea rows="7" name="comment" placeholder="Type here.."></textarea>
                                                    @if($recaptchaSetting->status==1)
                                                        <div class="g-recaptcha mt-2" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                                    @endif
                                                    <button class="common_btn2" id="submitBtn" type="submit">{{__('Submit Comment')}}</button>
                                                    <button class="common_btn2 d-none" id="showSpain"><i class="fas fa-spinner fa-spin"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="wsus__pro_det_review mt_50">
                                    @foreach ($productReviews as $productReview)
                                    <div class="wsus__single_comment">
                                        <p class="comment_date">
                                            <span>
                                                <i class="far fa-star text-dark"></i>
                                                <i class="far fa-star text-dark"></i>
                                                <i class="far fa-star text-dark"></i>
                                                <i class="far fa-star text-dark"></i>
                                                <i class="far fa-star text-dark"></i>
                                            </span>
                                        </p>    
                                        <p class="comment_date user-product-review">
                                            <span>
                                                @for ($i = 0; $i < $productReview->rating; $i++)
                                                <i class="fas fa-star"></i>
                                                @endfor
                                            </span>
                                            {{ Carbon\Carbon::parse($productReview->created_at)->format('F d,Y') }} {{__('At')}} {{  Carbon\Carbon::parse($productReview->created_at)->format('h:i A') }}
                                        </p>
                                        <p class="comment_des">{{ html_decode($productReview->review) }}</p>
                                        <div class="comment_footer d-flex flex-wrap">
                                            <div class="img">
                                                @if($productReview->user->image!=null)
                                                <img src="{{ asset($productReview->user->image) }}" alt="user" class="img-fluid w-100">
                                                @elseif($productReview->user->provider=='google')
                                                <img src="{{ asset($productReview->user->provider_avatar) }}" alt="user" class="img-fluid w-100">
                                                @else
                                                <img src="{{ asset($setting->default_avatar) }}" alt="user" class="img-fluid w-100">
                                                @endif
                                            </div>

                                            <div class="text">
                                                <h3>{{ html_decode($productReview->user->name) }}</h3>
                                                <p>{{ html_decode($productReview->user->address) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="wsus__sidebar pl_30 xs_pl_0" id="sticky_sidebar">
                        <div class="wsus__sidebar_licence">
                            @if ($variants->count() > 0)
                            <div class="select_licance">
                                <select class="select_js" name="variant_id" id="variant_id">
                                    @foreach ($variants as $variant)
                                    <option value="{{ $variant->id }}">{{ html_decode($variant->variant_name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h2><span>{{ $setting->currency_icon }}</span> <strong id="price">{{ html_decode($first_variant->price) }}</strong></h2>
                            @endif
                            @if ($product->product_type=='script')
                            <div class="select_licance">
                                <select class="select_js" name="price_type" id="price_type">
                                    <option value="regular price">{{__('Ragular price')}}</option>
                                    <option value="extend price">{{__('Extend price')}}</option>
                                </select>
                            </div>
                            <h2 class="" id="reg_price"><span>{{ $setting->currency_icon }}</span> <strong id="regular_price">{{ html_decode($product->regular_price) }}</strong></h2>
                            <h2 class="d-none" id="ext_price"><span>{{ $setting->currency_icon }}</span> <strong id="extend_price">{{ html_decode($product->extend_price) }}</strong></h2>
                            <ul class="feature" id="regular_content">
                                {!! $script_content->regular_content !!}
                            </ul>
                            <ul class="feature d-none" id="extend_content">
                                {!! $script_content->extend_content !!}
                            </ul>
                            @endif
                            <input type="hidden" value="{{ $product->product_type }}" id="product_type">
                            <input type="hidden" value="{{ $product->name }}" id="product_name">
                            <input type="hidden" value="{{ $product->slug }}" id="slug">
                            <input type="hidden" value="{{ $product->category->name }}" id="category_name">
                            <input type="hidden" value="{{ $product->category->id }}" id="category_id">
                            <input type="hidden" value="{{ $product->thumbnail_image }}" id="product_image">
                            <input type="hidden" value="{{ $product->author->name }}" id="author_name">
                            <input type="hidden" value="{{ $product->author->id }}" id="author_id">
                            <a class="live mt-3" target="__blank" href="{{ $product->preview_link }}">{{__('Live Preview')}}</a>
                            <a class="common_btn" href="javascript:;" onclick="addToCard({{ $product->id }})">{{__('Add to cart')}}</a>
                        </div>

                        <div class="wsus__sidebar_buy_info mt_30">
                            <h3>{{__('Buying Info')}}</h3>
                            <ul class="info">
                                <li>
                                    <p><i class="fal fa-cart-plus"></i> {{__('Total Sale')}}</p>
                                    <span>{{ $total_sale }}</span>
                                </li>
                                
                                <li>
                                    <p><i class="far fa-comments"></i> {{__('Comments')}}</p>
                                    <span>{{ $productComments->count() }}</span>
                                </li>
                                <li>
                                    <p><i class="fas fa-star"></i> {{__('Item Rating')}}</p>
                                    <span>{{ $productReviews->count() }}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="wsus__sidebar_pro_info mt_30">
                            <h3>{{__('Product Info')}}</h3>
                            <ul>
                                <li><span>{{__('Released')}}</span> {{ Carbon\Carbon::parse($product->created_at)->format('F d,Y') }}</li>
                                <li><span>{{__('Updated')}}</span> {{ Carbon\Carbon::parse($product->updated_at)->format('F d,Y') }}</li>
                                <li><span>{{__('File Type')}}</span> {{ $product->product_type }}</li>
                                <li><span>{{__('High Resolution')}}</span> {{ $product->high_resolution == 1 ? 'Yes' : 'No' }}</li>
                                <li><span>{{__('Cross browser')}}</span> {{ $product->cross_browser == 1 ? 'Yes' : 'No' }}</li>
                                <li><span>{{__('Documentation')}}</span> {{ $product->documentation == 1 ? 'Yes' : 'No' }}</li>
                                <li><span>{{__('Responsive')}}</span> {{ $product->layout == 1 ? 'Yes' : 'No' }}</li>
                                <li><span>{{__('Tags')}}</span>
                                    <p>
                                        @php
                                            $tag_arr=[];
                                            $tags=explode(',', $product->tags);
                                            foreach($tags as $tag){
                                                $tag_arr[]=$tag; 
                                            }
                                            array_pop($tag_arr);
                                        @endphp
                                        @foreach ($tag_arr as $tag)
                                        <a href="{{ route('products', ['tag' => strtolower(str_replace(' ', '-', $tag))]) }}">
                                            {{ html_decode($tag) }},
                                        </a>
                                        @endforeach
                                    </p>
                                </li>
                            </ul>
                        </div>

                        @if ($product->author)
                        <div class="wsus__sidebar_author_info mt_30">
                            <h3>{{__('Author Profile')}}</h3>
                            <div class="wsus__sidebar_author_text d-flex justify-content-center align-items-center">
                                <div class="img">
                                    @if($product->author->image!=null)
                                    <img src="{{ asset($product->author->image) }}" alt="author" class="img-fluid w-100">
                                    @elseif($product->author->provider=='google')
                                    <img src="{{ asset($product->author->provider_avatar) }}" alt="profile" class="img-fluid w-100">
                                    @else
                                    <img src="{{ asset($setting->default_avatar) }}" alt="author" class="img-fluid w-100">
                                    @endif
                                </div>
                                <div class="text">
                                    <h4>{{ html_decode($product->author->name) }}</h4>
                                    <p>{{__('Member Since')}} - {{ Carbon\Carbon::parse($product->author->created_at)->format('F Y') }}</p>
                                </div>
                            </div>
                            <ul class="d-flex flex-wrap justify-content-center">
                                <li><a class="common_btn view_profile" href="{{ route('author-profile', $product->author->user_name ) }}">{{__('View Profile')}}</a></li>
                                @if (Auth::guard('web')->check())
                                <li><a class="common_btn" href="javascript:;" data-bs-toggle="modal"
                                    data-bs-target="#messageModal">{{__('Send Message')}}</a></li>
                                @else
                                <li><a class="common_btn" href="javascript:;" id="send_message_btn">{{__('Send Message')}}</a></li>
                                @endif
                                
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        PRODUCT DETAILS END
    ==============================-->

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
                @forelse ($related_products as $product)
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__gallery_item">
                        <div class="wsus__gallery_item_img">
                            <img src="{{ asset($product->thumbnail_image) }}" alt="gallery" class="img-fluid w-100">
                            @php
                                $variant=App\Models\ProductVariant::where('product_id', $product->id)->first();
                            @endphp
                            <p><span>{{ $setting->currency_icon }}</span>{{ html_decode($product->regular_price) }}</p>
                            <ul class="wsus__gallery_item_overlay">
                                <li><a href="{{ $product->preview_link }}">{{__('Preview')}}</a></li>
                                <li><a href="{{ route('product-detail', $product->slug) }}">{{__('Buy Now')}}</a></li>
                            </ul>
                        </div>
                        <div class="wsus__gallery_item_text">
                            <p>{{__('By')}} <span>{{ html_decode($product->author->name) }}</span> {{__('In')}} <a class="category" href="{{ route('products', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></p>
                            <a class="title" href="{{ route('product-detail', $product->slug) }}">{{ html_decode($product->name) }}</a>
                            <ul class="d-flex flex-wrap justify-content-between">
                                @php
                                    $review=App\Models\Review::where(['product_id' => $product->id, 'status' => 1])->get()->average('rating');
                                    $sale=App\Models\OrderItem::where(['product_id' => $product->id])->get()->count();
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
                                        @for ($i = 0; $i < $review; $i++)
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
                    <h2 class="mt-5">{{__('Related product Not Found')}}</h2>
                </div>
                @endforelse
            </div>
        </div>
    </section>

     {{-- message modal --}}
    <div class="wsus__edit_modal">
        <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Contact Author')}}</h1>
                    </div>
                    <div class="modal-body">
                        <div class="wsus__profile_settings">
                            <form id="contactWithAuthor">
                                @csrf
                                <div class="row">
                                    <div class="wsus__profile_form_item">
                                        <label>{{__('Message')}}*</label>
                                        <input type="hidden" name="email" value="{{ $product->author->email }}">
                                        <textarea class="form-contorl" name="message" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    @if($recaptchaSetting->status==1)
                                        <div class="col-xl-12">
                                            <div class="wsus__single_com mt_20 blog_comment_recaptcha">
                                                <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-xl-12 mt-2">
                                        <ul class="d-flex flex-wrap">
                                            <li><button type="button" class="cancel" id="cancelBtn"
                                                data-bs-dismiss="modal">{{__('cancel')}}</button></li>
                                            <li>
                                                <button type="submit" class="common_btn" id="submitBtnn">{{__('Send Message')}}</button>
                                                <button type="submit" class="common_btn d-none" id="showSpainn"><i class="fas fa-spinner fa-spin"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                 $('#submitBtnn').addClass('d-none');
                 $('#showSpainn').removeClass('d-none');
                $.ajax({
                    url: "{{ route('contact-with-author') }}",
                    type:"post",
                    data:$('#contactWithAuthor').serialize(),
                    success:function(response){
                        if(response.status == 1){
                            toastr.success(response.message)
                            $("#contactWithAuthor").trigger("reset");
                            $('#submitBtnn').removeClass('d-none');
                            $('#showSpainn').addClass('d-none');
                            $('#cancelBtn').click();
                        }

                        if(response.status == 0){
                            toastr.error(response.message)
                            $("#contactWithAuthor").trigger("reset");
                            $('#submitBtnn').removeClass('d-none');
                            $('#showSpainn').addClass('d-none');
                        }
                    },
                    error:function(response){
                        if(response.status == 403){
                            toastr.error(response.responseJSON.message);
                            $('#submitBtnn').removeClass('d-none');
                            $('#showSpainn').addClass('d-none');
                        }else{
                            if(response.responseJSON.errors.message)toastr.error(response.responseJSON.errors.message[0])
                            $('#submitBtnn').removeClass('d-none');
                            $('#showSpainn').addClass('d-none');
                            if(!response.responseJSON.errors.message){
                                toastr.error("{{__('user.Please complete the recaptcha to submit the form')}}")
                            }
                        }
                    }
                });
            });
        
            $("#productCommentForm").on('submit', function(e){
                e.preventDefault();
                $('#showSpain').removeClass('d-none');
                $('#submitBtn').addClass('d-none');
                var isDemo = "{{ env('APP_MODE') }}"
                if(isDemo == 'DEMO'){
                    toastr.error('This Is Demo Version. You Can Not Change Anything');
                    return;
                }
                $.ajax({
                    type: 'POST',
                    data: $('#productCommentForm').serialize(),
                    url: "{{ route('product-comment') }}",
                    success: function (response) {
                        if(response.status == 1){
                            toastr.success(response.message)
                            $("#productCommentForm").trigger("reset");
                            $('#showSpain').addClass('d-none');
                            $('#submitBtn').removeClass('d-none');
                        }
                        if(response.status == 0){
                            toastr.error(response.message);
                            $('#showSpain').addClass('d-none');
                            $('#submitBtn').removeClass('d-none');
                        }
                    },
                    error: function(response) {
                        $('#showSpain').addClass('d-none');
                        $('#submitBtn').removeClass('d-none');
                        if(response.responseJSON.errors.comment)toastr.error(response.responseJSON.errors.comment[0])
                        if(!response.responseJSON.errors.comment){
                            toastr.error("{{__('user.Please complete the recaptcha to submit the form')}}")
                        }
                    }
                });
            });

           $('#send_message_btn').on('click', function(){
            toastr.error('Please login your account');
           })

        });
    })(jQuery);

</script>
<script>
(function($) {
    "use strict";
        $("#variant_id").on("change", function(){
            let variant_id = $(this).val();
            
            $.ajax({
                url: "{{ url('/variant-price') }}" + "/" + variant_id,
                type:"get",
                success:function(response){
                    if(response){
                        let variant_price= response.variant.price;
                        $('#price').text(variant_price);
                    }
                }
            });
            
    });

    $("#price_type").on("change", function(){
            let price_type = $(this).val();
            if(price_type=='extend price'){
                $('#reg_price').addClass('d-none');
                $('#ext_price').removeClass('d-none');
                $('#extend_content').removeClass('d-none');
                $('#regular_content').addClass('d-none');
            }else if(price_type=='regular price'){
                $('#reg_price').removeClass('d-none');
                $('#ext_price').addClass('d-none');
                $('#regular_content').removeClass('d-none');
                $('#extend_content').addClass('d-none');
            } 
    });   
})(jQuery);

</script>
@endsection
