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
                            <h3 class="h3 mb-3 text-gray-800">{{__('admin.Language')}}</h3>
                            <hr>
                            <div class="lang_list_top">
                                <ul class="lang_list">
                                    @foreach ($languages as $language)
                                    <li><a href="{{ route('admin.about-us.index', ['lang_code' => $language->lang_code]) }}"><i class="fas fa-edit"></i> {{ $language->lang_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
    
                            <div class="alert alert-danger mt-2" role="alert">
                                @php
                                    $current_language = App\Models\Language::where('lang_code', request()->get('lang_code'))->first();
                                @endphp
                                <p>{{__('admin.Your editing mode')}} : <b>{{ $current_language->lang_name }}</b></p> 
                            </div> 
                          </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-about-us') }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">

                                    @if (session()->get('admin_lang') == request()->get('lang_code'))
                                    <div class="form-group">
                                        <label for="">{{__('admin.Existing image')}}</label>
                                        <div>
                                            <img class="w_220"  src="{{ asset($about->banner_image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.New image')}}</label>
                                        <input type="file" name="banner_image" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Existing signature')}}</label>
                                        <div>
                                            <img class="w_50"  src="{{ asset($about->signature) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.New signature')}}</label>
                                        <input type="file" name="signature" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Founder image')}}</label>
                                        <div>
                                            <img class="w_50"  src="{{ asset($about->image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.New Image')}}</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="">{{__('admin.Name')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $about_language->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Desgination')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="desgination" class="form-control" value="{{ $about_language->desgination }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Title')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" value="{{ $about_language->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Header one')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="header1" class="form-control" value="{{ $about_language->header1 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Header two')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="header2" class="form-control" value="{{ $about_language->header2 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.Header Three')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="header3" class="form-control" value="{{ $about_language->header3 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('admin.About Us')}} <span class="text-danger">*</span></label>
                                        <textarea name="about_us" id="" class="summernote" cols="30" rows="10">{!! clean($about_language->about_us) !!}</textarea>
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
