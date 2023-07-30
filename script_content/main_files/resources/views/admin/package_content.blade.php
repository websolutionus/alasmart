@extends('admin.master_layout')
@section('title')
<title>{{__('Package content')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Package content')}}</h1>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Products')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update.package.content') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('Regular Content')}} <span class="text-danger">*</span></label>
                                    <textarea name="regular_content" id="" cols="30" rows="10" class="summernote">{{ $package_content->regular_content }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                  <label>{{__('Extend Content')}} <span class="text-danger">*</span></label>
                                  <textarea name="extend_content" id="" cols="30" rows="10" class="summernote">{{ $package_content->extend_content }}</textarea>
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
