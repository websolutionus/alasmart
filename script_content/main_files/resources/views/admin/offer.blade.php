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

          @php
            $notify = trans('For bold text, write the text inside "<span>bold text here</span>" tag');
        @endphp

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <h3 class="h3 mb-3 text-gray-800">{{__('Language')}}</h3>
                        <hr>
                        <div class="lang_list_top">
                            <ul class="lang_list">
                                @foreach ($languages as $language)
                                <li><a href="{{ route('admin.offer', ['lang_code' => $language->lang_code]) }}"><i class="fas fa-edit"></i> {{ $language->lang_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="alert alert-danger mt-2" role="alert">
                            @php
                                $current_language = App\Models\Language::where('lang_code', request()->get('lang_code'))->first();
                            @endphp
                            <p>{{__('Your editing mode')}} : <b>{{ $current_language->lang_name }}</b></p>
                        </div>
                       </div>
                     </div>
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update-offer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">
                            @php
                                $home1= false;
                                if($setting->selected_theme == 0 || $setting->selected_theme == 1){
                                    $home1 = true;
                                }

                                $home2= false;
                                if($setting->selected_theme == 0 || $setting->selected_theme == 2){
                                    $home2 = true;
                                }

                                $home3 = false;
                                if($setting->selected_theme == 0 || $setting->selected_theme == 3){
                                    $home3 = true;
                                }
                            @endphp
                            @if ($home1 || $home3)
                            <div class="row">

                                <div class="form-group col-12">
                                    <label><span class="font-weight-bold">{{__('Title one')}} </span> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="title1" value="{{ $offer->title1 }}">
                                </div>

                                <div class="form-group col-12">
                                    <label><span class="font-weight-bold">{{__('Title two')}}</span> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="title2" value="{{ $offer->title2 }}">
                                </div>

                                @if (session()->get('admin_lang') == request()->get('lang_code'))
                                <div class="form-group col-12">
                                    <label>{{__('Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="link" value="{{ $offer->link }}">
                                </div>
                                @endif

                            </div>
                            @endif

                            @if ($home3)

                                <div class="row">

                                    <div class="col-12">
                                        <h6 class="home_border">{{__('admin.Home Three')}}</h6>
                                        <hr>
                                    </div>
                                    @if (session()->get('admin_lang') == request()->get('lang_code'))
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
                                    @endif
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

                                @if (session()->get('admin_lang') == request()->get('lang_code'))
                                <div class="form-group col-12">
                                    <label>{{__('Item one link')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="home3_item1_link" value="{{ $offer->home3_item1_link }}">
                                </div>
                                @endif
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
                                @if (session()->get('admin_lang') == request()->get('lang_code'))
                                <div class="form-group col-12">
                                    <label>{{__('Item two link')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="home3_item2_link" value="{{ $offer->home3_item2_link }}">
                                </div>
                                @endif
                            </div>

                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <h6 class="home_border">{{__('About Us')}}</h6>
                                    <hr>
                                </div>
                                @if (session()->get('admin_lang') == request()->get('lang_code'))
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
                                @endif

                                <div class="form-group col-12">
                                    <label for=""> <span class="font-weight-bold">{{__('Header')}}</span> <span class="text-danger">*</span></label>
                                    <input type="text" name="about_offer_title1" class="form-control" value="{{ $offer->about_offer_title1 }}">
                                </div>

                                <div class="form-group col-12">
                                    <label for="">{{__('Title')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="about_offer_title3" class="form-control" value="{{ $offer->about_offer_title3 }}">
                                </div>
                                @if (session()->get('admin_lang') == request()->get('lang_code'))
                                <div class="form-group col-12">
                                    <label for="">{{__('Link')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="about_offer_link" class="form-control" value="{{ $offer->about_offer_link }}">
                                </div>
                                @endif
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
