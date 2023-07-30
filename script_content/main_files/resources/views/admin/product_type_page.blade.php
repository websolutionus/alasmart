@extends('admin.master_layout')
@section('title')
<title>{{__('Product Type Page')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Product Type Page')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Product Type Page')}}</div>
            </div>
          </div>

          <div class="section-body">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('admin.product-type-page.update',$productType->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="">{{__('Image')}}</label>
                                            <div>
                                                <img class="error_404"  src="{{ asset($productType->image) }}" alt="">
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('New Image')}}</label>
                                            <input type="file" name="image" class="form-control-file">
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Title')}}</label>
                                                <input type="text" name="title" class="form-control" value="{{ $productType->title }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{__('Description')}}</label>
                                                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $productType->description }}</textarea>
                                            </div>
                                        </div>


                                    </div>
                                    <button type="submit" class="btn btn-primary">{{__('admin.Update')}}</button>
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
