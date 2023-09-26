@extends('admin.master_layout')
@section('title')
<title>{{__('Contact Message')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Contact Message')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Contact Message')}}</div>
            </div>
          </div>

        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                        <div class="card-body">
                            <form action="{{ route('admin.enable-save-contact-message') }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="">{{__('Receive contact message email')}}</label>
                                    <input type="email" name="contact_email" class="form-control" value="{{ $setting->contact_email }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{__('Want to save email in database?')}}</label>
                                    <select name="enable_save_contact_message" id="" class="form-control">
                                        <option {{ $setting->enable_save_contact_message == 1 ? 'selected' : '' }} value="1">{{__('Yes')}}</option>
                                        <option {{ $setting->enable_save_contact_message == 0 ? 'selected' : '' }} value="0">{{__('No')}}</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">{{__('SN')}}</th>
                                    <th width="10%">{{__('Name')}}</th>
                                    <th width="15%">{{__('Email')}}</th>
                                    <th width="10%">{{__('Phone')}}</th>
                                    <th width="20%">{{__('Subject')}}</th>
                                    <th width="35%">{{__('Message')}}</th>
                                    <th width="5%">{{__('Action')}}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactMessages as $index => $contactMessage)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ html_decode($contactMessage->name) }}</td>
                                        <td>{{ html_decode($contactMessage->email) }}</td>
                                        <td>{{ html_decode($contactMessage->phone) }}</td>
                                        <td>{{ html_decode($contactMessage->subject) }}</td>
                                        <td>{{ html_decode($contactMessage->message) }}</td>

                                        <td>
                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $contactMessage->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>

                                    </tr>
                                  @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

      <script>
        "use strict";
          function handleSaveContactMessage(){
            var isDemo = "{{ env('APP_MODE') }}"
            if(isDemo == 'DEMO'){
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }
              $.ajax({
                type:"put",
                data: { _token : '{{ csrf_token() }}' },
                url:"{{ url('/admin/enable-save-contact-message') }}",
                success:function(response){
                   toastr.success(response)
                },
                error:function(err){

                }
              })
          }

        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("admin/delete-contact-message/") }}'+"/"+id)
        }

      </script>
@endsection
