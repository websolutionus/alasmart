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
        <form action="{{ route('image-product-update', $product->id) }}" method="POST" enctype="multipart/form-data" class="upload_product_form">
            @csrf
            @method("PUT")
            <div class="row">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="upload_form_input">
                        <label>{{__('Thumbnail Image')}}*</label>
                        <div class="upload_box">
                            <div class="img">
                                <img src="{{ asset('frontend') }}/images//upload_1.png" alt="upload icon" class="img-fluid w-100">
                            </div>
                            <label for="upload_11">{{__('Please')}} <span>{{__('Choose File')}}</span> {{__('to upload')}} </label>
                            <input id="upload_11" type="file" name="thumb_image" hidden>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="upload_form_input">
                        <label>{{__('Existing icon')}}</label>
                        <div class="product_icon">
                            <img src="{{ asset($product->product_icon) }}" alt="">
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
                <div class="col-xl-12">
                    <div class="upload_form_input">
                        <label>{{__('Regular Price')}}*</label>
                        <input type="text" name="regular_price" value="{{ html_decode($product->regular_price) }}">
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

                <div class="form-group ">
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
                            <div class="col-12"></div>
                            <div class="col-12"></div>
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
                @if ($product_variants->count()==0)
                <div class="col-12">
                    <div class="variant_price">
                        <h4>{{__('Variant and Price')}}</h4>
                        <div class="img">
                            <img src="{{ asset('frontend') }}/images//variant_img.png" alt="variant" class="img-fluid w-100">
                        </div>
                        <a class="common_btn" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">{{__('Add New
                            Variant &
                            Price')}}</a>
                    </div>
                </div>
                @else
                <div class="col-12">
                    <div class="variant_price variant_price_2">
                        <h4>{{__('Variant and Price')}}</h4>
                        <a href="#" class="common_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">{{__('Add
                            More Variant')}}</a>
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
                                            <a href="{{ route('admin.download-existing-file', $product_variant->file_name) }}" class="download_btn"><i class="fad fa-arrow-to-bottom"></i>
                                                {{__('download')}}</a>
                                            <a href="#"  data-bs-toggle="modal" data-bs-target="#editVariantModal-{{ $product_variant->id }}" class="edit_btn"><i class="fas fa-edit"></i> {{__('edit')}}</a>
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
<div class="modal fade variant_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                    <label>{{__('Variant Name')}}*</label>
                    <input type="text" name="variant_name">
                    <label>{{__('Price')}}*</label>
                    <input type="text" name="price">
                    <label>{{__('Upload Image')}}*</label>
                    <div class="upload_variant_img">
                        <div class="img">
                            <img src="{{ asset('frontend') }}/images/upload_1.png" alt="upload" class="img-fluid w-100">
                        </div>
                        <label for="upload_file">{{__('Please')}} <b>{{__('Choose File')}}</b> {{__('to upload')}} </label>
                        <input type="file" id="upload_file" name="file_name" hidden accept=".zip">
                    </div>
                    <button class="common_btn" type="submit">{{__('Save Now')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($product_variants as $product_variant)
<div class="modal fade variant_modal" id="editVariantModal-{{ $product_variant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Edit Variant')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-product-variant', $product_variant->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label>{{__('Variant Name')}}*</label>
                    <input type="text" name="variant_name" value="{{ html_decode($product_variant->variant_name) }}">
                    <label>{{__('Price')}}*</label>
                    <input type="text" name="price" value="{{ html_decode($product_variant->price) }}">
                    <label>{{__('Upload Image')}}*</label>
                    <div class="upload_variant_img">
                        <div class="img">
                            <img src="{{ asset('frontend') }}/images/upload_1.png" alt="upload" class="img-fluid w-100">
                        </div>
                        <label for="upload_file">{{__('Please')}} <b>{{__('Choose File')}}</b> {{__('to upload')}} </label>
                        <input type="file" id="upload_file" name="file_name" hidden accept=".zip">
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
                <p>{{__('admin.Are You sure delete this item ?')}}</p>
            </div>
            <form id="deleteForm" action="" method="POST">
                @csrf
                @method("DELETE")
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('admin.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('admin.Yes, Delete')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{__('admin.Item Delete Confirmation')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>{{__('admin.Are You sure delete this item ?')}}</p>
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <form id="deleteForm" action="" method="POST">
                @csrf
                @method("DELETE")
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('admin.Close')}}</button>
                <button type="submit" class="btn btn-primary">{{__('admin.Yes, Delete')}}</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection
@section('frontend_js')
<script>
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
@endsection
