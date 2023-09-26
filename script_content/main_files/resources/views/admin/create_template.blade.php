@extends('admin.master_layout')
@section('title')
<title>{{__('Create Template')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Create Template')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item active"><a href="{{ route('admin.template.index') }}">{{__('Template')}}</a></div>
              <div class="breadcrumb-item">{{__('Create Template')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.template.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Template')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.template.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('Icon')}} <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="image">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Title')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" value="{{ old('title') }}" name="title">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="link" class="form-control" value="{{ old('link') }}" name="link">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Description')}} <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control text-area-5">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1">{{__('Active')}}</option>
                                        <option value="0">{{__('Inactive')}}</option>
                                    </select>
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
@endsection
