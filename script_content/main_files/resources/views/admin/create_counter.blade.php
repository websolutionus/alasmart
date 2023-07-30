@extends('admin.master_layout')
@section('title')
<title>{{__('Counter')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Counter')}}</h1>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update-counter') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @php
                                $home1= false;
                                if($setting->selected_theme == 0 || $setting->selected_theme == 1){
                                    $home1 = true;
                                }
                            @endphp


                            <div class="row mt-4">
                                @if ($home1)
                                <div class="col-12">
                                    <h6 class="home_border">{{__('Home One & About Us')}}</h6>
                                    <hr>
                                </div>
                                @else
                                <div class="col-12">
                                    <h6 class="home_border">{{__('About Us')}}</h6>
                                    <hr>
                                </div>
                                @endif
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__('Item one icon')}}</label>
                                        <div>
                                            <img class="icon_w100" src="{{ asset($counter->counter_icon1) }}" alt="">
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label>{{__('New icon')}} </label>
                                        <input type="file" class="form-control-file" name="counter_icon1">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__('Item two icon')}}</label>
                                        <div>
                                            <img class="icon_w100" src="{{ asset($counter->counter_icon2) }}" alt="">
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label>{{__('New icon')}} </label>
                                        <input type="file" class="form-control-file" name="counter_icon2">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__('Item three icon')}}</label>
                                        <div>
                                            <img class="icon_w100" src="{{ asset($counter->counter_icon3) }}" alt="">
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label>{{__('New icon')}} </label>
                                        <input type="file" class="form-control-file" name="counter_icon3">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group col-12">
                                        <label>{{__('Item four icon')}}</label>
                                        <div>
                                            <img class="icon_w100" src="{{ asset($counter->counter_icon4) }}" alt="">
                                        </div>
                                    </div>
    
                                    <div class="form-group col-12">
                                        <label>{{__('New icon')}} </label>
                                        <input type="file" class="form-control-file" name="counter_icon4">
                                    </div>
                                </div>
                            </div>

                            @php
                                $home2= false;
                                if($setting->selected_theme == 0 || $setting->selected_theme == 2){
                                    $home2 = true;
                                }
                            @endphp

                            @if ($home2)
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="home_border">{{__('admin.Home Two')}}</h6>
                                    <hr>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">{{__('Background')}}</label>
                                    <div>
                                        <img class="w_300_h_150" src="{{ asset($counter->home2_background) }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="">{{__('New background')}}</label>
                                    <input type="file" name="home2_background" class="form-control-file">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__('Item one icon')}}</label>
                                        <div>
                                            <img class="icon_w100" src="{{ asset($counter->counter_icon5) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('New icon')}} </label>
                                        <input type="file" class="form-control-file" name="counter_icon5">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group col-12">
                                        <label>{{__('Item two icon')}}</label>
                                        <div>
                                            <img class="icon_w100" src="{{ asset($counter->counter_icon6) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{__('New icon')}} </label>
                                        <input type="file" class="form-control-file" name="counter_icon6">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group col-12">
                                        <label>{{__('Item three icon')}}</label>
                                        <div>
                                            <img class="icon_w100" src="{{ asset($counter->counter_icon7) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{__('New icon')}} </label>
                                        <input type="file" class="form-control-file" name="counter_icon7">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group col-12">
                                        <label>{{__('Item four icon')}}</label>
                                        <div>
                                            <img class="icon_w100" src="{{ asset($counter->counter_icon8) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{__('New icon')}} </label>
                                        <input type="file" class="form-control-file" name="counter_icon8">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            @endif

                            <div class="row mt-3">

                                <div class="form-group col-md-6">
                                    <label>{{__('Counter one quantity')}} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control"  name="counter1_value" value="{{ $counter->counter1_value }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{__('Counter one title')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="counter1_title" class="form-control"  name="counter1_title" value="{{ $counter->counter1_title }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{__('Counter two quantity')}} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control"  name="counter2_value" value="{{ $counter->counter2_value }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{__('Counter two title')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="counter2_title" class="form-control"  name="counter2_title" value="{{ $counter->counter2_title }}">
                                </div>


                                <div class="form-group col-md-6">
                                    <label>{{__('Counter three quantity')}} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control"  name="counter3_value" value="{{ $counter->counter3_value }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{__('Counter three title')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="counter3_title" class="form-control"  name="counter3_title" value="{{ $counter->counter3_title }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{__('Counter four quantity')}} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control"  name="counter4_value" value="{{ $counter->counter4_value }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{__('Counter four title')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="counter4_title" class="form-control"  name="counter4_title" value="{{ $counter->counter4_title }}">
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
