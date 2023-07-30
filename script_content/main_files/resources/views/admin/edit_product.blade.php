@extends('admin.master_layout')
@section('title')
<title>{{__('Edit Product')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Edit Product')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Products')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group col-12">
                                    <label>{{__('Existing thumnail')}}</label>
                                    <div>
                                        <img class="w_200" src="{{ asset($product->thumbnail_image) }}" alt="">
                                    </div>
                                </div>

                                <input type="hidden" name="product_type" value="{{ $product_type }}">
                                <div class="form-group col-12">
                                    <label>{{__('Thumnail Image')}}</label>
                                    <input type="file" class="form-control-file"  name="thumb_image">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Existing icon')}}</label>
                                    <div>
                                        <img class="w_100" src="{{ asset($product->product_icon) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Product icon')}}</label>
                                    <input type="file" class="form-control-file"  name="product_icon">
                                </div>
                                
                                <div class="form-group col-12 upload_file_box">
                                    <label>{{__('Upload file')}} <span class="text-danger">({{__('only zip file allowed')}})</span></label>
                                    <input type="file" class="form-control" name="upload_file" accept=".zip">
                                    @if ($product->download_file)
                                        <label for=""><a class="text-dark text-bold" href="{{ route('admin.download-existing-file', $product->download_file) }}">{{__('Download existing file')}}</a></label>
                                    @endif

                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Category')}} <span class="text-danger">*</span></label>
                                    <select name="category" class="form-control select2" id="category">
                                        <option value="">{{__('Select Category')}}</option>
                                        @foreach ($categories as $category)
                                            <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Author')}} <span class="text-danger">*</span></label>
                                    <select name="author" class="form-control select2" id="author">
                                        <option value="">{{__('Select Author')}}</option>
                                        @foreach ($authors as $author)
                                            <option {{ $product->author_id == $author->id ? 'selected' : '' }} value="{{ $author->id }}">{{ html_decode($author->name) }} - {{ $author->user_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control"  name="name" value="{{ html_decode($product->name) }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Slug')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" class="form-control"  name="slug" value="{{ html_decode($product->slug) }}">
                                </div>



                                <div class="form-group col-12">
                                    <label>{{__('Preview link')}} <span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="preview_link" value="{{ html_decode($product->preview_link) }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Regular price')}} <span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="regular_price" value="{{ html_decode($product->regular_price) }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Extend price')}} <span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="extend_price" value="{{ html_decode($product->extend_price) }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" id="" cols="30" rows="10" class="summernote">{{ html_decode($product->description) }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Tags')}} <span class="text-danger">*</span> ({{__('Press the comma for new tag')}})</label><br>
                                   <input type="text" class="form-control" data-role="tagsinput" name="tags" value="{{ html_decode($product->tags) }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option {{ $product->status == 1 ? 'selected' : '' }} value="1">{{__('Active')}}</option>
                                        <option {{ $product->status == 0 ? 'selected' : '' }} value="0">{{__('Inactive')}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('SEO Title')}}</label>
                                   <input type="text" class="form-control" name="seo_title" value="{{ html_decode($product->seo_title) }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('SEO Description')}}</label>
                                    <textarea name="seo_description" id="" cols="30" rows="10" class="form-control text-area-5">{{ html_decode($product->seo_description) }}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Highlight')}}</label>
                                    <div>
                                        <input {{ $product->popular_item == 1 ? 'checked' : '' }} type="checkbox"name="popular_item" id="popular_item"> <label for="popular_item" class="mr-3" >{{__('Popular')}}</label>

                                        <input {{ $product->trending_item == 1 ? 'checked' : '' }}  type="checkbox" name="trending_item" id="trending_item"> <label for="trending_item" class="mr-3" >{{__('Trending')}}</label>

                                        <input {{ $product->featured_item == 1 ? 'checked' : '' }} type="checkbox" name="featured_item" id="featured_item"> <label for="featured_item" class="mr-3" >{{__('Featured')}}</label>

                                        <input {{ $product->high_resolution == 1 ? 'checked' : '' }} type="checkbox" name="high_resolution" id="high_resolution"> <label for="high_resolution" class="mr-3" >{{__('High Resolution')}}</label>

                                        <input {{ $product->cross_browser == 1 ? 'checked' : '' }} type="checkbox" name="cross_browser" id="cross_browser"> <label for="cross_browser" class="mr-3" >{{__('Cross Browser')}}</label>

                                        <input {{ $product->documentation == 1 ? 'checked' : '' }} type="checkbox" name="documentation" id="documentation"> <label for="documentation" class="mr-3" >{{__('Documentation')}}</label>

                                        <input {{ $product->layout == 1 ? 'checked' : '' }} type="checkbox" name="layout" id="layout"> <label for="layout" class="mr-3" >{{__('Responsive')}}</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('Update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

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
