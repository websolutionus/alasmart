@extends('admin.master_layout')
@section('title')
<title>{{__('Select Your Product Type')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Select Your Product Type')}}</h1>
          </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($productItem->script_image) }}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{ $productItem->script_title }}</h5>
                              <p class="card-text">{{ $productItem->script_description }}</p>
                              <a href="{{ route('admin.product.create',['product_type' => 'script']) }}" class="btn btn-primary">{{__('Go to create page')}}</a>
                            </div>
                          </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($productItem->image_image) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $productItem->image_title }}</h5>
                                <p class="card-text">{{ $productItem->image_description }}</p>
                                <a href="{{ route('admin.product.create',['product_type' => 'image']) }}" class="btn btn-primary">{{__('Go to create page')}}</a>
                              </div>
                          </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($productItem->video_image) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $productItem->video_title }}</h5>
                                <p class="card-text">{{ $productItem->video_description }}</p>
                                <a href="{{ route('admin.product.create',['product_type' => 'video']) }}" class="btn btn-primary">{{__('Go to create page')}}</a>
                              </div>
                          </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($productItem->audio_image) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $productItem->audio_title }}</h5>
                                <p class="card-text">{{ $productItem->audio_description }}</p>
                                <a href="{{ route('admin.product.create',['product_type' => 'audio']) }}" class="btn btn-primary">{{__('Go to create page')}}</a>
                              </div>
                          </div>
                    </div>
                </div>
            </div>

        </section>
      </div>
@endsection
