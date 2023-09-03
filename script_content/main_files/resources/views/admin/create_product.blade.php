@extends('admin.master_layout')
@section('title')
<title>{{__('Create Product')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Create Product')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Products')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <input type="hidden" name="product_type" value="{{ $product_type }}">
                                <div class="form-group col-12">
                                    <label>{{__('Thumnail Image')}} <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="thumb_image">
                                </div>
                                <div class="form-group col-12 upload_file_box">
                                    <label>{{__('Product icon')}} <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="product_icon">
                                </div>

                                <div class="form-group col-12 upload_file_box">
                                    <label>{{__('Upload file')}} <span class="text-danger">* ({{__('only zip file allowed')}})</span></label>
                                    <input type="file" class="form-control" name="upload_file" accept=".zip">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Category')}} <span class="text-danger">*</span></label>
                                    <select name="category" class="form-control select2" id="category">
                                        <option value="">{{__('Select Category')}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->catlangadmin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Author')}} <span class="text-danger">*</span></label>
                                    <select name="author" class="form-control select2" id="author">
                                        <option value="">{{__('Select Author')}}</option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }} - {{ $author->user_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control"  name="name" value="{{ old('name') }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Slug')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" class="form-control"  name="slug" value="{{ old('slug') }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Preview link')}} <span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="preview_link" value="{{ old('preview_link') }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Regular price')}} <span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="regular_price" value="{{ old('regular_price') }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Extend price')}} <span class="text-danger">*</span></label>
                                   <input type="text" class="form-control" name="extend_price" value="{{ old('extend_price') }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" id="" cols="30" rows="10" class="summernote">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Tags')}}<span class="text-danger">*</span> ({{__('Press the comma for new tag')}})</label> <br>
                                   <input type="text" class="form-control" data-role="tagsinput" name="tags" value="{{ old('tags') }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1">{{__('Active')}}</option>
                                        <option value="0">{{__('Inactive')}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('SEO Title')}}</label>
                                   <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('SEO Description')}}</label>
                                    <textarea name="seo_description" id="" cols="30" rows="10" class="form-control text-area-5">{{ old('seo_description') }}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Highlight')}}</label>
                                    <div>
                                        <input type="checkbox"name="popular_item" id="popular_item"> <label for="popular_item" class="mr-3" >{{__('Popular')}}</label>

                                        <input type="checkbox" name="trending_item" id="trending_item"> <label for="trending_item" class="mr-3" >{{__('Trending')}}</label>

                                        <input type="checkbox" name="featured_item" id="featured_item"> <label for="featured_item" class="mr-3" >{{__('Featured')}}</label>

                                        <input type="checkbox" name="high_resolution" id="high_resolution"> <label for="high_resolution" class="mr-3" >{{__('High Resolution')}}</label>

                                        <input type="checkbox" name="cross_browser" id="cross_browser"> <label for="cross_browser" class="mr-3" >{{__('Cross Browser')}}</label>

                                        <input type="checkbox" name="documentation" id="documentation"> <label for="documentation" class="mr-3" >{{__('Documentation')}}</label>

                                        <input type="checkbox" name="layout" id="layout"> <label for="layout" class="mr-3" >{{__('Responsive')}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('Save')}}</button>
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
