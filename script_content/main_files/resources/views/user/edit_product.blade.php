@extends($active_theme)

@section('title')
    <title>{{__('Edit product')}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{__('Edit product')}}">
@endsection

@section('frontend-content')
    <section class="upload_product_info pt_190">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <h3>{{__('Upload your Product')}} </h3>
            <form action="{{ route('product-update', $product->id) }}" method="POST" enctype="multipart/form-data" class="upload_product_form">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="upload_form_input">
                            <label>{{__('Thumbnail Image')}}*</label>
                            <div class="upload_box">
                                <div class="img">
                                    <img src="{{ asset('frontend') }}/images/upload_1.png" alt="upload icon" class="img-fluid w-100">
                                </div>
                                <label for="upload_11">{{__('Please')}} <span>{{__('Choose File')}}</span> {{__('to upload')}} </label>
                                <input id="upload_11" type="file" name="thumb_image" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="upload_form_input">
                            <label>{{__('Upload File')}}* <span> (<b>{{__('Only ZIP file allowed')}}</b>)</span></label>
                            <div class="upload_box">
                                <div class="img">
                                    <img src="{{ asset('frontend') }}/images/upload_2.png" alt="upload icon" class="img-fluid w-100">
                                </div>
                                <label for="upload_1">{{__('Please')}} <span>{{__('Choose File')}}</span> {{__('to upload')}} </label>
                                @if ($product->download_file)
                                    <label for=""><a class="text-danger text-bold" href="{{ route('download-existing-file', $product->download_file) }}">{{__('Download existing file')}}</a></label>
                                @endif
                                <input id="upload_1" type="file" name="upload_file" accept=".zip" hidden>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Existing icon')}}</label>
                            <div class="product_icon">
                                <img src="{{ asset($product->product_icon) }}"  alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Product icon')}}*</label>
                            <input type="file" name="product_icon">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Category')}}*</label>
                            <select class="select_js" name="category">
                                <option value="">{{__('Select Catagory')}}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected':'' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Product Name')}}*</label>
                            <input type="text" id="name" name="name" value="{{ html_decode($product->name) }}">
                            <input type="hidden" name="product_type" value="{{ $product_type }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Slug')}}*</label>
                            <input type="text" id="slug" name="slug" value="{{ html_decode($product->slug) }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Preview Link')}}*</label>
                            <input type="text" name="preview_link" value="{{ html_decode($product->preview_link) }}">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="upload_form_input">
                            <label>{{__('Regular Price')}}*</label>
                            <input type="text" name="regular_price" value="{{ html_decode($product->regular_price) }}">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="upload_form_input">
                            <label>{{__('Extend Price')}}*</label>
                            <input type="text" name="extend_price" value="{{ html_decode($product->extend_price) }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Description')}}*</label>
                            <textarea id="editor" name="description" rows="8">{{ html_decode($product->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <label>{{__('Tags')}}* ({{'Press the comma for new tag'}})</label><br>
                        <input type="text" class="form-control" data-role="tagsinput" name="tags" value="{{ html_decode($product->tags) }}">
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('SEO Title')}}*</label>
                            <input type="text" name="seo_title" value="{{ html_decode($product->seo_title) }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('SEO Description')}}*</label>
                            <textarea rows="5" name="seo_description">{{ html_decode($product->seo_description) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="upload_others_feature">
                            <div class="row">
                                <div class="col-12">
                                    <h4>{{__('Others feature')}}</h4>
                                </div>
                                <div class="col-12">
                                    <input {{ $product->high_resolution == 1 ? 'checked' : '' }} type="checkbox" name="high_resolution" id="high_resolution"> <label for="high_resolution" class="mr-3" >{{__('High Resolution')}}</label>
                                </div>
                                <div class="col-12">
                                    <input {{ $product->cross_browser == 1 ? 'checked' : '' }} type="checkbox" name="cross_browser" id="cross_browser"> 
                                    <label for="cross_browser" class="mr-3" >{{__('Cross Browser')}}</label>
                                </div>
                                <div class="col-12">
                                    <input {{ $product->documentation == 1 ? 'checked' : '' }} type="checkbox" name="documentation" id="documentation"> 
                                    <label for="documentation" class="mr-3" >{{__('Documentation')}}</label>
                                </div>
                                <div class="col-12">
                                    <input {{ $product->layout == 1 ? 'checked' : '' }} type="checkbox" name="layout" id="layout"> 
                                    <label for="layout" class="mr-3" >{{__('Responsive')}}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="upload_form_input">
                            <ul class="d-flex flex-wrap mt_15">
                                <li><button class="common_btn upload" type="submit">{{__('upload Product')}}</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('frontend_js')
    
<script>
    (function($) {
        "use strict";
        var specification = true;
        $(document).ready(function () {
            $("#name").on("focusout",function(e){
                $("#slug").val(convertToSlug($(this).val()));
            })

            $("#download_file_type").on("change", function(){
                let currentVal = $(this).val();
                if(currentVal == 'direct_upload'){
                    $(".upload_file_box").removeClass('d-none')
                    $(".download_link_box").addClass('d-none')
                }else{
                    $(".upload_file_box").addClass('d-none')
                    $(".download_link_box").removeClass('d-none')
                }
            })
        });
    })(jQuery);

    function convertToSlug(Text){
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-');
    }
</script>
@endsection
