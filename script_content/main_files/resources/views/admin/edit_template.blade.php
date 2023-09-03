@extends('admin.master_layout')
@section('title')
<title>{{__('Edit Template')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Edit Template')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item active"><a href="{{ route('admin.template.index') }}">{{__('Template')}}</a></div>
              <div class="breadcrumb-item">{{__('Edit Template')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.template.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Template')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <h3 class="h3 mb-3 text-gray-800">{{__('Language')}}</h3>
                        <hr>
                        <div class="lang_list_top">
                            <ul class="lang_list">
                                @foreach ($languages as $language)
                                <li><a href="{{ route('admin.template.edit', ['template' => $template->id, 'lang_code' => $language->lang_code]) }}"><i class="fas fa-edit"></i> {{ $language->lang_name }}</a></li>
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
                        <form action="{{ route('admin.template.update', $template->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">
                            <div class="row">

                                @if(session()->get('admin_lang') == request()->get('lang_code'))
                                <div class="form-group col-12">
                                    <label>{{__('admin.Existing Icon')}}</label>
                                    <div>
                                        <img class="icon_w100" src="{{ asset($template->image) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('New Icon')}}</label>
                                    <input type="file" class="form-control-file"  name="image">
                                </div>
                                @endif

                                <div class="form-group col-12">
                                    <label>{{__('admin.Title')}}</label>
                                    <input type="text" id="title" class="form-control" value="{{ $template_language->title }}" name="title">
                                </div>

                                @if(session()->get('admin_lang') == request()->get('lang_code'))
                                <div class="form-group col-12">
                                    <label>{{__('admin.Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="link" class="form-control" value="{{ $template->link }}" name="link">
                                </div>
                                @endif

                                <div class="form-group col-12">
                                    <label>{{__('admin.Description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control text-area-5">{{ $template_language->description }}</textarea>
                                </div>
                                @if(session()->get('admin_lang') == request()->get('lang_code'))
                                <div class="form-group col-12">
                                    <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $template->status == 1 ? 'selected':'' }}>{{__('admin.Active')}}</option>
                                        <option value="0" {{ $template->status == 0 ? 'selected':'' }}>{{__('admin.Inactive')}}</option>
                                    </select>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('admin.Save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
