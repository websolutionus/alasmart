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
                        <form action="{{ route('admin.template.update', $template->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

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

                                <div class="form-group col-12">
                                    <label>{{__('admin.Title')}}</label>
                                    <input type="text" id="title" class="form-control" value="{{ $template->title }}" name="title">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="link" class="form-control" value="{{ $template->link }}" name="link">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control text-area-5">{{ $template->description }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $template->status == 1 ? 'selected':'' }}>{{__('admin.Active')}}</option>
                                        <option value="0" {{ $template->status == 0 ? 'selected':'' }}>{{__('admin.Inactive')}}</option>
                                    </select>
                                </div>
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
