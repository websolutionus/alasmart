@extends('admin.master_layout')
@section('title')
<title>{{__('Special Offer')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Special Offer')}}</h1>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update-offer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @php
                                $home2= false;
                                if($setting->selected_theme == 0 || $setting->selected_theme == 2){
                                    $home2 = true;
                                }

                                $home3 = false;
                                if($setting->selected_theme == 0 || $setting->selected_theme == 3){
                                    $home3 = true;
                                }
                            @endphp
                            @if ($home2 || $home3)
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('Title one')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="title1" value="{{ $offer->title1 }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Title two')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="title2" value="{{ $offer->title2 }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="link" value="{{ $offer->link }}">
                                </div>
                            </div>
                            @endif

                            @if ($home3)

                                <div class="row">

                                    <div class="col-12">
                                        <h6 class="home_border">{{__('admin.Home Three')}}</h6>
                                        <hr>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">{{__('Existing Background')}}</label>
                                        <div>
                                            <img class="w_300_h_150" src="{{ asset($offer->home3_background) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">{{__('admin.New Background')}}</label>
                                        <input type="file" name="home3_background" class="form-control-file">
                                    </div>
                                </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('Item one title')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="home3_item1_title" value="{{ $offer->home3_item1_title }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Item one description')}} <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="home3_item1_description" id="" cols="30" rows="10">{{ $offer->home3_item1_description }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Item one link')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="home3_item1_link" value="{{ $offer->home3_item1_link }}">
                                </div>
                            </div>



                            <div class="row">

                                <div class="form-group col-12">
                                    <label>{{__('Item two title')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="home3_item2_title" value="{{ $offer->home3_item2_title }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Item two description')}} <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="home3_item2_description" id="" cols="30" rows="10">{{ $offer->home3_item2_description }}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Item two link')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="home3_item2_link" value="{{ $offer->home3_item2_link }}">
                                </div>
                            </div>

                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <h6 class="home_border">{{__('About Us')}}</h6>
                                    <hr>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">{{__('Existing image')}}</label>
                                    <div>
                                        <img class="w_200"  src="{{ asset($offer->about_offer_background) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="">{{__('New image')}}</label>
                                    <input type="file" name="about_offer_background" class="form-control-file">
                                </div>

                                <div class="form-group col-12">
                                    <label for="">{{__('Title one')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="about_offer_title1" class="form-control" value="{{ $offer->about_offer_title1 }}">
                                </div>

                                <div class="form-group col-12">
                                    <label for="">{{__('Title two')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="about_offer_title2" class="form-control" value="{{ $offer->about_offer_title2 }}">
                                </div>

                                <div class="form-group col-12">
                                    <label for="">{{__('Title three')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="about_offer_title3" class="form-control" value="{{ $offer->about_offer_title3 }}">
                                </div>

                                <div class="form-group col-12">
                                    <label for="">{{__('Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="about_offer_link" class="form-control" value="{{ $offer->about_offer_link }}">
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
