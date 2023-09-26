@extends('admin.master_layout')
@section('title')
<title>{{__('Testimonial')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Create Testimonial')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item active"><a href="{{ route('admin.testimonial.index') }}">{{__('Testimonial')}}</a></div>
              <div class="breadcrumb-item">{{__('Create Testimonial')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Testimonial')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label>{{__('Rating')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="rating" class="form-control"  name="rating">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Comment')}} <span class="text-danger">*</span></label>
                                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control text-area-5"></textarea>
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
