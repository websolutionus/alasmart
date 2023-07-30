@extends($active_theme)

@section('title')
    <title>{{__('Create product')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('Create product')}}">
@endsection

@section('frontend-content')
<!--=============================
        UPLOAD PRODUCT INFO START
    ==============================-->
    <section class="upload_product_info pt_190">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <h3>{{__('Upload your Product')}} </h3>
            <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data" class="upload_product_form">
                @csrf
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
                                <input id="upload_1" type="file" name="upload_file" accept=".zip" hidden>
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
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Product Name')}}*</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}">
                            <input type="hidden" name="product_type" value="{{ $product_type }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Slug')}}*</label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug') }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Preview Link')}}*</label>
                            <input type="text" name="preview_link">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="upload_form_input">
                            <label>{{__('Regular Price')}}*</label>
                            <input type="text" name="regular_price" value="{{ old('regular_price') }}">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="upload_form_input">
                            <label>{{__('Extend Price')}}*</label>
                            <input type="text" name="extend_price" value="{{ old('extend_price') }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('Description')}}*</label>
                            <textarea id="editor" name="description" rows="8">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <label>{{__('Tags')}}* ({{'Press the comma for new tag'}})</label><br>
                        <input type="text" class="form-control" data-role="tagsinput" name="tags" value="{{ old('tags') }}">
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('SEO Title')}}*</label>
                            <input type="text" name="seo_title" value="{{ old('seo_title') }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload_form_input">
                            <label>{{__('SEO Description')}}*</label>
                            <textarea rows="5" name="seo_description">{{ old('seo_description') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="upload_others_feature">
                            <div class="row">
                                <div class="col-12">
                                    <h4>{{__('Others feature')}}</h4>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="high_resolution" id="high_resolution"> 
                                    <label for="high_resolution" class="mr-3" >{{__('High Resolution')}}</label>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="cross_browser" id="cross_browser"> 
                                    <label for="cross_browser" class="mr-3" >{{__('Cross Browser')}}</label>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="documentation" id="documentation"> 
                                    <label for="documentation" class="mr-3" >{{__('Documentation')}}</label>
                                </div>
                                <div class="col-12">
                                <input type="checkbox" name="layout" id="layout"> <label for="layout" class="mr-3" >{{__('Responsive')}}</label>
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
    <!--=============================
        UPLOAD PRODUCT INFO END
    ==============================-->
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
