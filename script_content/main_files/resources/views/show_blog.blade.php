@extends($active_theme)
@section('title')
    <title>{{ $blog->title }}</title>
    <title>{{ $blog->seo_title }}</title>
    <meta name="description" content="{{ $blog->seo_description }}">
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
                        <h1>{{__('blog details')}}</h1>
                        <ul class="d-flex flex-wrap">
                            <li><a href="{{ route('home') }}">{{__('home')}}</a></li>
                            <li><a href="javascript:;">{{__('blog details')}}</a></li>
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
        BLOG DETAILS START
    ==============================-->
    <section class="wsus__blog_details mt_120 xs_mt_80 pb_120 xs_pb_80">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="wsus__blog_details_area">
                        <div class="wsus__blog_details_img">
                            <img src="{{ asset($blog->image) }}" alt="">
                        </div>
                        <ul class="wsus__blog_details_header d-flex flex-wrap">
                            <li><i class="far fa-user"></i> {{__('By')}} {{ $blog->admin->name }}</li>
                            <li><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</li>
                            <li><i class="far fa-comment-lines"></i> {{ $blog_comments->count() }} {{__('Comments')}}</li>
                        </ul>
                        <div class="wsus__blog_details_text">
                            <h2>{{ $blog->bloglanguagefrontend->title }}</h2>
                            {!! clean($blog->bloglanguagefrontend->description) !!}
                        </div>
                        <div class="wsus__blog_tags_and_share d-flex flex-wrap justify-content-between">
                            <ul class="tags d-flex flex-wrap align-items-center">
                                <li><span>{{__('tags')}}:</span></li>
                                @php
                                    $tag_arr=[];
                                    $tags=explode(', ', $blog->bloglanguagefrontend->tag);
                                    foreach($tags as $tag){
                                        $tag_arr[]=$tag; 
                                    }
                                    array_pop($tag_arr);
                                @endphp
                                @foreach ($tag_arr as $tag)
                                    <li><a href="{{ route('blogs', ['keyword' => strtolower($tag)]) }}">#{{ $tag }}</a></li>
                                @endforeach
                            </ul>
                            <ul class="share d-flex flex-wrap align-items-center">
                                <li><span>{{__('share')}}:</span></li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog', $blog->slug) }}&t={{ $blog->title }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('blog', $blog->slug) }}&title={{ $blog->title }}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://twitter.com/share?text={{ $blog->title }}&url={{ route('blog', $blog->slug) }}"><i class="fab fa-twitter"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    @if ($blog_comments->count()>0)
                    <div class="wsus__pro_det_comment mt_120 xs_mt_80">
                        <h4>{{__('Comments All')}}</h4>
                        @foreach ($blog_comments as $comment)
                        <div class="wsus__single_comment">
                            <div class="comment_footer d-flex flex-wrap">
                                <div class="img">
                                    <img src="{{ asset($setting->default_avatar) }}" alt="useer" class="img-fluid w-100">
                                </div>
                                <div class="text">
                                    <h3>{{ html_decode($comment->name) }}</h3>
                                    <p>{{ '@'.html_decode(strtolower(str_replace(' ', '_', $comment->name))) }}</p>
                                </div>
                            </div>
                            <p class="comment_des">{{ html_decode($comment->comment) }}</p>
                            <p class="comment_date"> <span class="date"><i class="far fa-calendar-alt"></i>
                                {{ Carbon\Carbon::parse($comment->created_at)->format('F d,Y') }} {{__('At')}} {{ Carbon\Carbon::parse($comment->created_at)->format('h:i A') }} </span>
                            </p>
                        </div>
                        @endforeach
                        @if ($blog_comments->hasPages())
                        <div class="wsus__pagination mt_30">
                            {{ $blog_comments->links('custom_pagination') }}
                        </div>
                        @endif
                    </div>
                    @endif
                    <form class="wsus__comment_input_area mt_60" id="blogCommentForm">
                        @csrf
                        <h3>{{__('Leave a Comment')}}</h3>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="wsus__comment_single_input">
                                    <fieldset>
                                        <legend>{{__('name')}}*</legend>
                                        <input type="text" name="name" id="name" placeholder="{{__('Name')}}">
                                        <input type="hidden" name="blog_id" id="blog_id" value="{{ $blog->id }}">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="wsus__comment_single_input">
                                    <fieldset>
                                        <legend>{{__('email')}}*</legend>
                                        <input type="email" name="email" id="email" placeholder="{{__('Email')}}">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__comment_single_input">
                                    <fieldset>
                                        <legend>{{__('message')}}*</legend>
                                        <textarea rows="7" name="comment" id="comment" placeholder="{{__('Type your comment here')}}"></textarea>
                                    </fieldset>
                                </div>
                            </div>
                            @if($recaptchaSetting->status==1)
                                <div class="col-xl-12">
                                    <div class="wsus__single_com blog_comment_recaptcha">
                                        <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-xl-12 mt-3">
                                <button class="common_btn" id="submitBtn" type="submit">{{__('Submit Comment')}}</button>
                                <button class="common_btn d-none" id="showspin"><i class="fas fa-spinner fa-spin"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="wsus__sidebar">
                        <div class="wsus__sidebar_item wsus__sidebar_search mt-0">
                            <h3>{{__('Search')}}</h3>
                            <form action="{{ route('blogs') }}" method="GET">
                                <input type="text" name="keyword" placeholder="{{__('Search')}}">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        @if($popular_blogs->count() > 0)
                        <div class="wsus__sidebar_item wsus__sidebar_blog">
                            <h3>{{__('Popular Post')}}</h3>
                            <ul>
                                @foreach ($popular_blogs as $blog)
                                <li>
                                    <div class="img">
                                        <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                                    </div>
                                    <div class="text">
                                        <a href="{{ route('blog', $blog->slug) }}">{{ $blog->bloglanguagefrontend->title }}</a>
                                        <p><i class="fas fa-calendar-alt"></i> {{ Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="wsus__sidebar_item wsus__sidebar_categories">
                            <h3>{{__('Categories')}}</h3>
                            <ul>
                                @foreach ($categories as $category)
                                @php
                                    $total_blog = App\Models\Blog::with('blogcategorylanguagefrontend')->where(['blog_category_id' => $category->id, 'status' => 1])->count();
                                @endphp
                                <li><a href="{{ route('blogs', ['category' => $category->slug] ) }}">{{ $category->blogcategorylanguagefrontend->category_name }} <span>({{ $total_blog }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        @if ($pupular_tags->count()>0)
                        <div class="wsus__sidebar_item wsus__sidebar_tags">
                            <h3>{{__('Popular Tags')}}</h3>
                            <ul class="d-flex flex-wrap">
                                @foreach ($pupular_tags as $popular_tag)
                                <li><a href="{{ route('blogs', ['keyword' => strtolower($popular_tag->tag_name)]) }}">{{ $popular_tag->tag_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="wsus__sidebar_item wsus__sidebar_subscribe"
                            style="background: url({{ asset('frontend/images/sidebar_subscribe.png') }});">
                            <div class="wsus__sidebar_subscribe_overlay">
                                <h3>{{ $subscriber->title }}</h3>
                                <p>{{ $subscriber->description }}</p>
                                <form id="subscriberForm">
                                    @csrf
                                    <input type="text" name="email" placeholder="{{__('Enter Your Email Address')}}">
                                    <button class="common_btn" id="subSubmitBtn" type="submit">{{__('Subscribe')}}</button>
                                    <button class="common_btn d-none" id="subShowSpain"><i class="fas fa-spinner fa-spin"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BLOG DETAILS END
    ==============================-->
@endsection
@push('frontend_js')
<script>
    (function($) {
        "use strict";
        $(document).ready(function () {
            $("#blogCommentForm").on('submit', function(e){
                e.preventDefault();
                $('#showspin').removeClass('d-none');
                $('#submitBtn').addClass('d-none');
                submitBtn
                var isDemo = "{{ env('APP_MODE') }}"
                if(isDemo == 'DEMO'){
                    toastr.error('This Is Demo Version. You Can Not Change Anything');
                    return;
                }
                $.ajax({
                    type: 'POST',
                    data: $('#blogCommentForm').serialize(),
                    url: "{{ route('blog-comment') }}",
                    success: function (response) {
                        if(response.status == 1){
                            toastr.success(response.message)
                            $("#blogCommentForm").trigger("reset");
                            $('#showspin').addClass('d-none');
                            $('#submitBtn').removeClass('d-none');
                        }
                    },
                    error: function(response) {
                        $('#showspin').addClass('d-none');
                        $('#submitBtn').removeClass('d-none');
                        if(response.responseJSON.errors.name)toastr.error(response.responseJSON.errors.name[0])
                        if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                        if(response.responseJSON.errors.comment)toastr.error(response.responseJSON.errors.comment[0])

                        if(!response.responseJSON.errors.name && !response.responseJSON.errors.email && !response.responseJSON.errors.comment){
                            toastr.error("{{__('user.Please complete the recaptcha to submit the form')}}")
                        }
                    }
                });
            });


            $("#subscriberForm").on('submit', function(e){
                e.preventDefault();
                $('#subShowSpain').removeClass('d-none');
                $('#subSubmitBtn').addClass('d-none');
                var isDemo = "{{ env('APP_MODE') }}"
                if(isDemo == 'DEMO'){
                    toastr.error('This Is Demo Version. You Can Not Change Anything');
                    return;
                }

                let loading = "{{__('user.Processing...')}}"

                $("#subscribe_btn").html(loading);
                $("#subscribe_btn").attr('disabled',true);

                $.ajax({
                    type: 'POST',
                    data: $('#subscriberForm').serialize(),
                    url: "{{ route('subscribe-request') }}",
                    success: function (response) {
                        if(response.status == 1){
                            toastr.success(response.message);
                            let subscribe = "{{__('user.Subscribe')}}"
                            $("#subscribe_btn").html(subscribe);
                            $("#subscribe_btn").attr('disabled',false);
                            $("#subscriberForm").trigger("reset");
                            $('#subShowSpain').addClass('d-none');
                            $('#subSubmitBtn').removeClass('d-none');
                        }

                        if(response.status == 0){
                            toastr.error(response.message);
                            let subscribe = "{{__('user.Subscribe')}}"
                            $("#subscribe_btn").html(subscribe);
                            $("#subscribe_btn").attr('disabled',false);
                            $("#subscriberForm").trigger("reset");
                            $('#subShowSpain').addClass('d-none');
                            $('#subSubmitBtn').removeClass('d-none');
                        }
                    },
                    error: function(err) {
                        $('#subShowSpain').addClass('d-none');
                        $('#subSubmitBtn').removeClass('d-none');
                        toastr.error('Something went wrong');
                        let subscribe = "{{__('user.Subscribe')}}"
                            $("#subscribe_btn").html(subscribe);
                            $("#subscribe_btn").attr('disabled',false);
                            $("#subscriberForm").trigger("reset");
                    }
                });
            })


        });
    })(jQuery);

</script>
@endpush
