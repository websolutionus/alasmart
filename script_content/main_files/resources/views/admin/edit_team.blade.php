@extends('admin.master_layout')
@section('title')
<title>{{__('Edit team')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Edit team')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.our-team.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Our team')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.our-team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Existing Image')}}</label>
                                    <div>
                                        <img src="{{ asset($team->image) }}" alt="" width="150px">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Image')}} <span class="text-danger">*</span></label>
                                    <input type="file" id="title" class="form-control-file"  name="image">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('admin.Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control"  name="name" value="{{ $team->name }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Desgination')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="designation" class="form-control"  name="designation" value="{{ $team->designation }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Facebook')}}</label>
                                    <input type="text" class="form-control"  name="facebook" value="{{ $team->facebook }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Twitter')}}</label>
                                    <input type="text" class="form-control"  name="twitter" value="{{ $team->twitter }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Instagram')}}</label>
                                    <input type="text" class="form-control"  name="instagram" value="{{ $team->instagram }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option  {{ $team->status == 1 ? 'selected' : '' }} value="1">{{__('admin.Active')}}</option>
                                        <option  {{ $team->status == 0 ? 'selected' : '' }} value="0">{{__('admin.Inactive')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('Update')}}</button>
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
