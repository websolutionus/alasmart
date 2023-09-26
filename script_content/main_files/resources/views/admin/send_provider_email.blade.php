@extends('admin.master_layout')
@section('title')
<title>{{__('Send Mail To Seller')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Send Mail To Seller')}}</h1>

          </div>

        <div class="section-body">
            <a href="{{ route('admin.provider') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Seller List')}}</a>
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h1>{{__('Send Email to')}} {{ $user->email }}</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.send-mail-to-single-provider',$user->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">{{__('Subject')}}</label>
                                    <input type="text" name="subject" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('Message')}}</label>
                                    <textarea name="message" id="message" class="summernote" cols="30" rows="10"></textarea>
                                </div>
                                <button class="btn btn-primary">{{__('Send Email')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
      </div>
@endsection
