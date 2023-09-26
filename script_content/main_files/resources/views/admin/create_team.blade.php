@extends('admin.master_layout')
@section('title')
<title>{{__('Create team')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Create team')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.our-team.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Our team')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.our-team.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('Image')}} <span class="text-danger">*</span></label>
                                    <input type="file" id="title" class="form-control-file"  name="image">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control"  name="name">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Desgination')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="designation" class="form-control"  name="designation">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Facebook')}}</label>
                                    <input type="text" class="form-control"  name="facebook">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Twitter')}}</label>
                                    <input type="text" class="form-control"  name="twitter">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Instagram')}}</label>
                                    <input type="text" class="form-control"  name="instagram">
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
