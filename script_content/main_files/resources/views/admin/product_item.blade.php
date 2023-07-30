@extends('admin.master_layout')
@section('title')
<title>{{__('Product Type')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Product Type')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Product Type')}}</div>
            </div>
          </div>

          <div class="section-body">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.product-type.update',$productItem->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="">{{__('Script Product Image')}}</label>
                                            <div>
                                                <img class="error_404"  src="{{ asset($productItem->script_image) }}" alt="">
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('New Image')}}</label>
                                            <input type="file" name="script_image" class="form-control-file">
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Script Product Title')}}</label>
                                                <input type="text" name="script_title" class="form-control" value="{{ $productItem->script_title }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Script Product Description')}}</label>
                                                <textarea class="form-control" name="script_description" id="" cols="30" rows="10">{{ $productItem->script_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('Image Product Image')}}</label>
                                            <div>
                                                <img class="error_404"  src="{{ asset($productItem->image_image) }}" alt="">
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('New Image')}}</label>
                                            <input type="file" name="image_image" class="form-control-file">
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Image Product Title')}}</label>
                                                <input type="text" name="image_title" class="form-control" value="{{ $productItem->image_title }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Image Product Description')}}</label>
                                                <textarea class="form-control" name="image_description" id="" cols="30" rows="10">{{ $productItem->image_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('Video Product Image')}}</label>
                                            <div>
                                                <img class="error_404"  src="{{ asset($productItem->video_image) }}" alt="">
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('New Image')}}</label>
                                            <input type="file" name="video_image" class="form-control-file">
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Video Product Title')}}</label>
                                                <input type="text" name="video_title" class="form-control" value="{{ $productItem->video_title }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Video Product Description')}}</label>
                                                <textarea class="form-control" name="video_description" id="" cols="30" rows="10">{{ $productItem->video_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('Audio Product Image')}}</label>
                                            <div>
                                                <img class="error_404"  src="{{ asset($productItem->audio_image) }}" alt="">
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('New Image')}}</label>
                                            <input type="file" name="audio_image" class="form-control-file">
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Audio Product Title')}}</label>
                                                <input type="text" name="audio_title" class="form-control" value="{{ $productItem->audio_title }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Audio Product Description')}}</label>
                                                <textarea class="form-control" name="audio_description" id="" cols="30" rows="10">{{ $productItem->audio_description }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">{{__('admin.Update')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
