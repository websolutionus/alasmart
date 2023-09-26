@extends('admin.master_layout')
@section('title')
<title>{{__('Language create')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Create Language')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Create language')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.languages') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Languages')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.language.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('Language Name')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="lang_name" value="{{ old('lang_name') }}">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Language Code')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="lang_code" value="{{ old('lang_code') }}">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Default')}} <span class="text-danger">*</span></label>
                                    <select name="is_default" class="form-control">
                                        <option value="No">{{__('No')}}</option>
                                        <option value="Yes">{{__('Yes')}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Language Direction')}} <span class="text-danger">*</span></label>
                                    <select name="lang_direction" class="form-control">
                                        <option value="left_to_right">{{__('Left to Right')}}</option>
                                        <option value="right_to_left">{{__('Right to left')}}</option>
                                    </select>
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
