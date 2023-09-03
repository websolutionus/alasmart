@extends('admin.master_layout')
@section('title')
<title>{{__('Product discount')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Product Discount')}}</h1>
          </div>

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
                              <li><a href="{{ route('admin.discount.product', ['lang_code' => $language->lang_code]) }}"><i class="fas fa-edit"></i> {{ $language->lang_name }}</a></li>
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
                        <form action="{{ route('admin.update.product.discount') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">
                            <div class="row">
                                @if (session()->get('admin_lang') == request()->get('lang_code'))
                                <div class="form-group col-12">
                                    <label>{{__('Offer')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $discount->offer }}" name="offer">
                                </div>
                                @endif

                                <div class="form-group col-12">
                                    <label>{{__('Title')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" name="title" value="{{ $product_discount_language->title }}" type="text">
                                </div>

                                @if (session()->get('admin_lang') == request()->get('lang_code'))
                                <div class="form-group col-12">
                                  <label>{{__('Link')}} <span class="text-danger">*</span></label>
                                  <input class="form-control" name="link" value="{{ $discount->link }}" type="text">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('End Time')}} <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" value="{{ $discount->end_time }}" name="end_time" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" autocomplete="off">
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('Status')}}</label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $discount->status == 1 ? 'selected':'' }}>{{__('Active')}}</option>
                                        <option value="0" {{ $discount->status == 0 ? 'selected':'' }}>{{__('Inactive')}}</option>
                                    </select>
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
