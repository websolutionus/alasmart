@extends('admin.master_layout')
@section('title')
<title>{{__('Error Page')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Error Page')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Error Page')}}</div>
            </div>
          </div>

          <div class="section-body">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.error-page.update',$errorpage->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="">{{__('Icon two')}}</label>
                                            <div>
                                                <img class="error_404"  src="{{ asset($errorpage->image) }}" alt="">
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('New icon')}}</label>
                                            <input type="file" name="image" class="form-control-file">
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Title')}}</label>
                                                <input type="text" name="title" class="form-control" value="{{ $errorpage->title }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Button Text')}}</label>
                                                <input type="text" name="button_text" class="form-control" value="{{ $errorpage->button_text }}">
                                            </div>
                                        </div>


                                    </div>
                                    <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
