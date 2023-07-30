@extends('admin.master_layout')
@section('title')
<title>{{__('Websit ads')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Ads')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Ads')}}</div>
            </div>
          </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-ad') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">{{__('Ad Image')}}</label>
                                        <div>
                                            <img class="w_300_h_150" src="{{ asset($ad->image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New Ad Image')}}</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{__('Link')}}</label>
                                        <input type="text" name="link" class="form-control" value="{{ $ad->link }}">
                                    </div>
                                    <div class="form-group ">
                                        <label for="">{{__('Status')}}</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="1" {{ $ad->status==1 ? 'selected':'' }}>{{__('Active')}}</option>
                                            <option value="0" {{ $ad->status==0 ? 'selected':'' }}>{{__('Inactive')}}</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{__('admin.Update')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
@endsection
