@extends('admin.master_layout')
@section('title')
<title>{{__('Become author')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Become author')}}</h1>
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
                                    <li><a href="{{ route('admin.become-author', ['lang_code' => $language->lang_code]) }}"><i class="fas fa-edit"></i> {{ $language->lang_name }}</a></li>
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
                                <form action="{{ route('admin.update-become-author') }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">

                                    @if (session()->get('admin_lang') == request()->get('lang_code'))
                                    <div class="form-group">
                                        <label for="">{{__('Existing Background')}}</label>
                                        <div>
                                            <img class="w_200"  src="{{ asset($become_author->bg_image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New Background')}}</label>
                                        <input type="file" name="bg_image" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Foreground Image')}}</label>
                                        <div>
                                            <img class="w_220"  src="{{ asset($become_author->image1) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New Foreground')}}</label>
                                        <input type="file" name="image1" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Image')}}</label>
                                        <div>
                                            <img class="w_220"  src="{{ asset($become_author->image2) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New image')}}</label>
                                        <input type="file" name="image2" class="form-control-file">
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="">{{__('Title')}} <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" class="form-control" value="{{ $become_language->title }}">
                                    </div>

                                    @if (session()->get('admin_lang') == request()->get('lang_code'))
                                    <div class="form-group">
                                        <label for="">{{__('Icon one')}}</label>
                                        <div>
                                            <img class="icon_w100"  src="{{ asset($become_author->icon1) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New icon')}}</label>
                                        <input type="file" name="icon1" class="form-control-file">
                                    </div>
                                    @endif


                                    <div class="form-group">
                                        <label for="">{{__('Item one')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="item1" class="form-control" value="{{ $become_language->item1 }}">
                                    </div>

                                    @if (session()->get('admin_lang') == request()->get('lang_code'))
                                    <div class="form-group">
                                        <label for="">{{__('Icon two')}}</label>
                                        <div>
                                            <img class="icon_w100"  src="{{ asset($become_author->icon2) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New icon')}}</label>
                                        <input type="file" name="icon2" class="form-control-file">
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="">{{__('Item two')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="item2" class="form-control" value="{{ $become_language->item2 }}">
                                    </div>

                                    @if (session()->get('admin_lang') == request()->get('lang_code'))
                                    <div class="form-group">
                                        <label for="">{{__('Icon three')}}</label>
                                        <div>
                                            <img class="icon_w100"  src="{{ asset($become_author->icon3) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New icon')}}</label>
                                        <input type="file" name="icon3" class="form-control-file">
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="">{{__('Item three')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="item3" class="form-control" value="{{ $become_language->item3 }}">
                                    </div>

                                    @if (session()->get('admin_lang') == request()->get('lang_code'))
                                    <div class="form-group">
                                        <label for="">{{__('Icon four')}}</label>
                                        <div>
                                            <img class="icon_w100"  src="{{ asset($become_author->icon4) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New icon')}}</label>
                                        <input type="file" name="icon4" class="form-control-file">
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="">{{__('Item four')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="item4" class="form-control" value="{{ $become_language->item4 }}">
                                    </div>

                                    @if (session()->get('admin_lang') == request()->get('lang_code'))
                                    <div class="form-group">
                                        <label for="">{{__('Existing signature')}}</label>
                                        <div>
                                            <img class="w_50"  src="{{ asset($become_author->signature) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New signature')}}</label>
                                        <input type="file" name="signature" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Founder image')}}</label>
                                        <div>
                                            <img class="w_50"  src="{{ asset($become_author->image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('New Image')}}</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="">{{__('Name')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $become_language->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Desgination')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="desgination" class="form-control" value="{{ $become_language->desgination }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{__('Header one')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="header1" class="form-control" value="{{ $become_language->header1 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Header two')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="header2" class="form-control" value="{{ $become_language->header2 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{__('Description')}} <span class="text-danger">*</span></label>
                                        <textarea name="description" id="" class="summernote" cols="30" rows="10">{!! clean($become_language->description) !!}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{__('admin.Update')}}</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
@endsection
