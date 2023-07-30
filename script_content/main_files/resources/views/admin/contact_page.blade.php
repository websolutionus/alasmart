@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Conact Us')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Conact Us')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.Conact Us')}}</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.contact-us.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group col-12">
                                    <label for="">{{__('Existing image')}}</label>
                                    <div>
                                        <img class="w_220"  src="{{ asset($contact->image) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="">{{__('New image')}}</label>
                                    <input type="file" name="image" class="form-control-file">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Title')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="title1" class="form-control" value="{{ $contact->title1 }}">
                                </div>

                                <div class="form-group col-12">
                                  <label>{{__('Support title')}} <span class="text-danger">*</span></label>
                                  <input type="text" name="title2" class="form-control" value="{{ $contact->title2 }}">
                                </div>

                                <div class="form-group col-12">
                                  <label>{{__('Support time')}} <span class="text-danger">*</span></label>
                                  <input type="text" name="time" class="form-control" value="{{ $contact->time }}">
                                </div>

                                <div class="form-group col-12">
                                  <label>{{__('Off Day')}} <span class="text-danger">*</span></label>
                                  <input type="text" name="off_day" class="form-control" value="{{ $contact->off_day }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Email')}} <span class="text-danger">*</span></label>
                                    <textarea name="email" cols="30" rows="10" class="form-control text-area-5">{{ $contact->email }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                  <label>{{__('Address')}} <span class="text-danger">*</span></label>
                                  <textarea name="address" cols="30" rows="10" class="form-control text-area-5">{{ $contact->address }}</textarea>
                              </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Phone')}} <span class="text-danger">*</span></label>
                                    <textarea name="phone" cols="30" rows="10" class="form-control text-area-5">{{ $contact->phone }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Google Map')}} <span class="text-danger">*</span></label>
                                    <textarea name="google_map" cols="30" rows="10" class="form-control text-area-5">{{ $contact->map }}</textarea>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('admin.Update')}}</button>
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