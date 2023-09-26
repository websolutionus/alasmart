@extends('admin.master_layout')
@section('title')
<title>{{__('Default Avatar')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Default Avatar')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Default Avatar')}}</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update-default-avatar') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{__('Existing Avatar')}}</label>
                                <div>
                                    <img class="default-avatar" src="{{ asset($default_avatar) }}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">{{__('New Avatar')}}</label>
                                <input type="file" name="avatar" class="form-control-file" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

@endsection
