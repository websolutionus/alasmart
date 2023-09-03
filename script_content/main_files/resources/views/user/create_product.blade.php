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
    <section class="upload_product_info pt_190 pb_100 xs_pb_70">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <h3>{{__('Upload your Product')}} </h3>
            <form class="upload_product_form" action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="upload_form_input">
                            <label>{{__('Thumbnail Image')}}*</label>
                            <div class="upload_box">
                                <div class="img">
                                    <img src="{{ asset('frontend/images/upload_1.png') }}" alt="upload icon" class="img-fluid w-100">
                                </div>
                                <label for="upload_11">{{__('Please')}} <span>{{__('Choose File')}}</span> {{__('to upload')}} </label>
                                <input id="upload_11" name="thumb_image" type="file" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="upload_form_input">
                            <label>{{__('Upload File')}}* <span> (<b>{{__('Only ZIP file allowed')}}</b>)</span></label>
                            <div class="upload_box">
                                <div class="img">
                                    <img src="{{ asset('frontend/images/upload_2.png') }}" alt="upload icon" class="img-fluid w-100">
                                </div>
                                <label for="upload_1">{{__('Please')}} <span>{{__('Choose File')}}</span> {{__('to upload')}} </label>
                                <input id="upload_1" name="upload_file" accept=".zip" type="file" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Product icon')}}*</legend>
                                <input type="file" name="product_icon">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Category')}}*</legend>
                                <select class="select2" name="category">
                                    <option value="">{{__('Select Category')}}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->catlangfrontend->name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Product Name')}}*</legend>
                                <input type="text" id="name" name="name" value="{{ old('name') }}">
                                <input type="hidden" name="product_type" value="{{ $product_type }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Slug')}}*</legend>
                                <input type="text" id="slug" name="slug" value="{{ old('slug') }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Preview link')}}*</legend>
                                <input type="text" name="preview_link" value="{{ old('preview_link') }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Regular price')}}*</legend>
                                <input type="text" name="regular_price" value="{{ old('regular_price') }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Extend price')}}*</legend>
                                <input type="text" name="extend_price" value="{{ old('extend_price') }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <legend>{{__('Description')}}*</legend>
                            <textarea id="editor" name="description" rows="8">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Tags')}}* {{__('Press the comma for new tag')}}</legend>
                                <input type="text" data-role="tagsinput" name="tags" value="{{ old('tags') }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('SEO title')}}*</legend>
                                <input type="text" name="seo_title" value="{{ old('seo_title') }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('SEO description')}}*</legend>
                                <textarea rows="4" name="seo_description">{{ old('seo_description') }}</textarea>
                            </fieldset>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="wsus__comment_single_input">
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
                        <div class="wsus__comment_single_input">
                            <button class="common_btn upload" type="submit">{{__('upload Product')}}</button>
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
@push('frontend_js')
    
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
@endpush
