@extends($active_theme)

@section('title')
    <title>{{__('Edit product')}}</title>
    <meta name="description" content="{{__('Edit product')}}">
@endsection

@section('frontend-content')
    <!--=============================
        UPLOAD PRODUCT INFO START
    ==============================-->
    <section class="upload_product_info pt_190 pb_100 xs_pb_70">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="h3 mb-3 text-gray-800">{{__('Language')}}</h4>
                        <hr>
                        <div class="lang_list_top">
                            <ul class="lang_list">
                                @foreach ($languages as $language)
                                <li><a href="{{ route('product-edit',['id' => $product->id, 'lang_code' => $language->lang_code]) }}"><i class="fas fa-edit"></i> {{ $language->lang_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="alert alert-danger" role="alert">
                            @php
                                $current_language = App\Models\Language::where('lang_code', request()->get('lang_code'))->first();
                            @endphp
                            <p>{{__('Your editing mode')}} : <b>{{ $current_language->lang_name }}</b></p> 
                        </div> 
                      </div>
                    </div>
                </div>
            </div>
            <h3>{{__('Upload your Product')}} </h3>
            <form class="upload_product_form" action="{{ route('image-product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">
                <div class="row">
                    @if (Session::get('front_lang') == request()->get('lang_code'))
                    <div class="col-xl-12 col-md-12">
                        <div class="upload_form_input">
                            <label>{{__('Thumbnail Image')}}*</label>
                            <div class="upload_box">
                                <div class="img">
                                    <img src="{{ asset('frontend/images/upload_1.png') }}" alt="upload icon" class="img-fluid w-100">
                                </div>
                                <label for="upload_11">{{__('Please')}} <span>{{__('Choose File')}}</span> {{__('to upload')}} </label>
                                <input id="upload_11" name="thumb_image" type="file" hidden >
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <label>{{__('Existing icon')}}</label>
                            <div class="product_icon">
                                <img src="{{ asset($product->product_icon) }}" width="20" alt="">
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
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected':'' }}>{{ $category->catlangfrontend->name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    @endif
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Product Name')}}*</legend>
                                <input type="text" id="name" name="name" value="{{ html_decode($product_language->name) }}">
                                <input type="hidden" name="product_type" value="{{ $product_type }}">
                            </fieldset>
                        </div>
                    </div>
                    @if (Session::get('front_lang') == request()->get('lang_code'))
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Preview link')}}*</legend>
                                <input type="text" name="preview_link" value="{{ html_decode($product->preview_link) }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Regular price')}}*</legend>
                                <input type="text" name="regular_price" value="{{ html_decode($product->regular_price) }}">
                            </fieldset>
                        </div>
                    </div>
                    @endif
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <legend>{{__('Description')}}*</legend>
                            <textarea id="editor" name="description" rows="8">{{ html_decode($product_language->description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Tags')}}* {{__('Press the comma for new tag')}}</legend>
                                <input type="text" data-role="tagsinput" name="tags" value="{{ html_decode($product_language->tags) }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('SEO title')}}*</legend>
                                <input type="text" name="seo_title" value="{{ html_decode($product_language->seo_title) }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('SEO description')}}*</legend>
                                <textarea rows="4" name="seo_description">{{ html_decode($product_language->seo_description) }}</textarea>
                            </fieldset>
                        </div>
                    </div>

                    @if (Session::get('front_lang') == request()->get('lang_code'))
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <div class="row">
                                <div class="col-12">
                                    <h4>{{__('Others feature')}}</h4>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="high_resolution" id="high_resolution" {{ $product->high_resolution == 1 ? 'checked' : '' }}> 
                                    <label for="high_resolution" class="mr-3" >{{__('High Resolution')}}</label>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="cross_browser" id="cross_browser" {{ $product->cross_browser == 1 ? 'checked' : '' }}> 
                                    <label for="cross_browser" class="mr-3" >{{__('Cross Browser')}}</label>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="documentation" id="documentation" {{ $product->documentation == 1 ? 'checked' : '' }}> 
                                    <label for="documentation" class="mr-3">{{__('Documentation')}}</label>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="layout" id="layout" {{ $product->layout == 1 ? 'checked' : '' }}> <label for="layout" class="mr-3">{{__('Responsive')}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-12">
                        <div class="wsus__comment_single_input">
                            <button class="common_btn upload" type="submit">{{__('upload Product')}}</button>
                        </div>
                    </div>
                    @if ($product_variants->count()==0)
                    <div class="col-12">
                        <div class="variant_price">
                            <h4>{{__('Variant and Price')}}</h4>
                            <div class="img">
                                <img src="{{ asset('frontend/images/variant_img.png') }}" alt="variant" class="img-fluid w-100">
                            </div>
                            <a class="common_btn" href="#" data-bs-toggle="modal" data-bs-target="#store_product_variant">{{__('Add New & Price')}}</a>
                        </div>
                    </div>
                    @else
                    <div class="col-12">
                        <div class="variant_price variant_price_2">
                            <h4>{{__('Variant and Price')}}</h4>
                            <a href="#" class="common_btn" data-bs-toggle="modal" data-bs-target="#store_product_variant">{{__('Add More Variant')}}</a>
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="size">{{__('Name')}}</td>
                                            <td class="price">{{__('Price')}}</td>
                                            <td class="button_area">{{__('Action')}}</td>
                                        </tr>
                                        @foreach ($product_variants as $product_variant)
                                        <tr>
                                            <td class="size">{{ html_decode($product_variant->variant_name) }}</td>
                                            <td class="price">{{ $setting->currency_icon }}{{ html_decode($product_variant->price) }}</td>
                                            <td class="button_area">
                                                <a href="{{ route('download-existing-variant-file', $product_variant->file_name) }}" class="download_btn"><i class="fad fa-arrow-to-bottom"></i>
                                                    {{__('download')}}</a>

                                                <a href="javascript:;"  data-bs-toggle="modal" data-bs-target="#editVariantModal-{{ $product_variant->id }}" class="edit_btn"><i class="fas fa-edit"></i> {{__('edit')}}</a>

                                                <a data-bs-toggle="modal" data-bs-target="#deleteModal" href="javascript:;"  class="delete_btn" onclick="deleteData({{ $product_variant->id }})"><i class="fas fa-trash-alt"></i>
                                                    {{__('delete')}}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <!-- variant modal start -->
    <div class="modal fade variant_modal" id="store_product_variant" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Create New Variant')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-product-variant', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Variant Name')}}*</legend>
                                <input type="text" name="variant_name">
                            </fieldset>
                        </div>
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Price')}}*</legend>
                                <input type="text" name="price">
                            </fieldset>
                        </div>
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Upload Image')}}</legend>
                                <div class="upload_variant_img">
                                    <div class="img">
                                        <img src="{{ asset('frontend/images/upload_1.png') }}" alt="upload" class="img-fluid w-100">
                                    </div>
                                    <label for="upload_file">{{__('Please')}} <b>{{__('Choose File')}}</b> {{__('to upload')}} </label>
                                    <input type="file" id="upload_file" name="file_name" accept=".zip" hidden>
                                </div>
                            </fieldset>
                        </div>
                        <button class="common_btn" type="submit">{{__('Save Now')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- variant modal end -->
    <!--=============================
        UPLOAD PRODUCT INFO END
    ==============================-->

@foreach ($product_variants as $product_variant)

<div class="modal fade variant_modal" id="editVariantModal-{{ $product_variant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Edit variant')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update-product-variant', $product_variant->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Variant Name')}}*</legend>
                                <input type="text" name="variant_name" value="{{ html_decode($product_variant->variant_name) }}">
                            </fieldset>
                        </div>
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Price')}}*</legend>
                                <input type="text" name="price" value="{{ html_decode($product_variant->price) }}">
                            </fieldset>
                        </div>
                        <div class="wsus__comment_single_input">
                            <fieldset>
                                <legend>{{__('Upload Image')}}</legend>
                                <input type="file" name="file_name" accept=".zip">
                            </fieldset>
                        </div>
                        <button class="common_btn" type="submit">{{__('Update Now')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade variant_delete_modal" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Item Delete Confirmation')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <p>{{__('Are You sure delete this item ?')}}</p>
                </div>
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Yes, Delete')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
@push('frontend_js')
<script>
    "use strict";
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("delete-product-variant/") }}'+"/"+id)
    }
</script>
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
