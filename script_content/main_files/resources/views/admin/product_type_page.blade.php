@extends('admin.master_layout')
@section('title')
<title>{{__('Product Type Page')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Product Type Page')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Product Type Page')}}</div>
            </div>
          </div>

          <div class="section-body">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="h3 mb-3 text-gray-800">{{__('Language')}}</h3>
                    <hr>
                    <div class="lang_list_top">
                        <ul class="lang_list">
                            @foreach ($languages as $language)
                            <li><a href="{{ route('admin.product-type-page.index', ['lang_code' => $language->lang_code]) }}"><i class="fas fa-edit"></i> {{ $language->lang_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="alert alert-danger mt-2" role="alert">
                        @php
                            $current_language = App\Models\Language::where('lang_code', request()->get('lang_code'))->first();
                        @endphp
                        <p>{{__('Your editing mode')}} : <b>{{ $current_language->lang_name }}</b></p> 
                    </div> 
                  </div>
                </div>
            </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.product-type-page.update',$productType->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf

                                    <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">
                                    
                                    <div class="row">
                                      @if(session()->get('admin_lang') == request()->get('lang_code'))
                                        <div class="form-group col-12">
                                            <label for="">{{__('Image')}}</label>
                                            <div>
                                                <img class="error_404"  src="{{ asset($productType->image) }}" alt="">
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('New Image')}}</label>
                                            <input type="file" name="image" class="form-control-file">
                                        </div>
                                        @endif

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Title')}}</label>
                                                <input type="text" name="title" class="form-control" value="{{ $product_type_language->title }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Description')}}</label>
                                                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $product_type_language->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
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
