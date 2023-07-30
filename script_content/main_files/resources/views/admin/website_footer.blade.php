@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Footer')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Footer')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.Footer')}}</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.footer.update', $footer->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('admin.Existing Image')}}</label>
                                    <div>
                                        <img src="{{ asset($footer->payment_image) }}" alt="" width="220px">
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('admin.Payment Card Image')}}</label>
                                    <input type="file" name="card_image" class="form-control-file" >
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Copyright')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="copyright" class="form-control" value="{{ $footer->copyright }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Community')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="community" class="form-control" value="{{ $footer->community }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Community link')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="community_link" class="form-control" value="{{ $footer->community_link }}">
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
