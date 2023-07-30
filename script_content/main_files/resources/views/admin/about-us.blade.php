@extends('admin.master_layout')
@section('title')
<title>{{__('admin.About Us')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.About Us')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.About Us')}}</div>
            </div>
          </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-about-us') }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group">
                                        <label for="">{{__('Existing image')}}</label>
                                        <div>
                                            <img class="w_220"  src="{{ asset($about->banner_image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New image')}}</label>
                                        <input type="file" name="banner_image" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Existing signature')}}</label>
                                        <div>
                                            <img class="w_50"  src="{{ asset($about->signature) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New signature')}}</label>
                                        <input type="file" name="signature" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Founder image')}}</label>
                                        <div>
                                            <img class="w_50"  src="{{ asset($about->image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New Image')}}</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Name')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $about->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Desgination')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="desgination" class="form-control" value="{{ $about->desgination }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Title')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" value="{{ $about->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Header one')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="header1" class="form-control" value="{{ $about->header1 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Header two')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="header2" class="form-control" value="{{ $about->header2 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Header Three')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="header3" class="form-control" value="{{ $about->header3 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.About Us')}} <span class="text-danger">*</span></label>
                                        <textarea name="about_us" id="" class="summernote" cols="30" rows="10">{!! clean($about->about_us) !!}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{__('admin.Update')}}</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
@endsection
