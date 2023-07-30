@extends('admin.master_layout')
@section('title')
<title>{{__('Trending Offer')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Trending Offer')}}</h1>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update-trending-offer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                                <div class="row">

                                    <div class="form-group col-12">
                                        <label for="">{{__('Existing Background')}}</label>
                                        <div>
                                            <img class="w_300_h_150" src="{{ asset($trending_offer->image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">{{__('admin.New Background')}}</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                </div>
                            

                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('Title one')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="title1" value="{{ $trending_offer->title1 }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Title two')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="title2" value="{{ $trending_offer->title2 }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="link" value="{{ $trending_offer->link }}">
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
