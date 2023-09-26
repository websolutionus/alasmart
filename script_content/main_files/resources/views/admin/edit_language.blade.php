@extends('admin.master_layout')
@section('title')
<title>{{__('Edit language')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Edit Language')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Edit language')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.languages') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Languages')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.language.update', $language->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('Language Name')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="lang_name" value="{{ $language->lang_name }}">
                                </div>

                                @if ($language->id != 1)
                                <div class="form-group col-12">
                                    <label>{{__('Language Code')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="lang_code" value="{{ $language->lang_code }}">
                                </div>
                                @endif

                                <div class="form-group col-12">
                                    <label>{{__('Default')}} <span class="text-danger">*</span></label>
                                    <select name="is_default" class="form-control">
                                        <option value="No" {{ $language->is_default == 'No' ? 'selected':'' }}>{{__('No')}}</option>
                                        <option value="Yes" {{ $language->is_default == 'Yes' ? 'selected':'' }}>{{__('Yes')}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Language Direction')}} <span class="text-danger">*</span></label>
                                    <select name="lang_direction" class="form-control">
                                        <option value="left_to_right" {{ $language->lang_direction == 'left_to_right' ? 'selected':'' }}>{{__('Left to Right')}}</option>
                                        <option value="right_to_left" {{ $language->lang_direction == 'right_to_left' ? 'selected':'' }}>{{__('Right to left')}}</option>
                                    </select>
                                </div>

                                @if ($language->id != 1)
                                <div class="form-group col-12">
                                    <label>{{__('Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $language->status == 1 ? 'selected':'' }}>{{__('Active')}}</option>
                                        <option value="0" {{ $language->status == 0 ? 'selected':'' }}>{{__('Inactive')}}</option>
                                    </select>
                                </div>
                                @endif

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
