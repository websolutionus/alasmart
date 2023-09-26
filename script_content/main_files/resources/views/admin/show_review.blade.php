@extends('admin.master_layout')
@section('title')
<title>{{__('Review Details')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Review Details')}}</h1>

          </div>

          <div class="section-body">
            <a href="{{ route('admin.review-list') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Review List')}}</a>
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped table-bordered">
                           <tr>
                               <td>{{__('Client')}}</td>
                               <td><a href="{{ route('admin.customer-show', $review->user_id) }}">{{ $review->user->name }}</a></td>
                           </tr>
                           <tr>
                               <td>{{__('Client Email')}}</td>
                               <td>{{ $review->user->email }}</td>
                           </tr>
                           <tr>
                               <td>{{__('Service')}}</td>
                               <td><a href="{{ route('admin.service.edit', $review->service_id) }}">{{ $review->service->name }}</a></td>
                           </tr>

                           <tr>
                                <td>{{__('Provider')}}</td>
                                <td><a href="{{ route('admin.provider-show', $review->user_id) }}">{{ $review->provider->name }}</a></td>
                            </tr>

                           <tr>
                               <td>{{__('Rating')}}</td>
                               <td>{{ $review->rating }}</td>
                           </tr>
                           <tr>
                               <td>{{__('Review')}}</td>
                               <td>{{ html_decode($review->review) }}</td>
                           </tr>
                           <tr>
                               <td>{{__('Created At')}}</td>
                               <td>{{ $review->created_at->format('H:i A, d-m-Y') }}</td>
                           </tr>
                           <tr>
                               <td>{{__('Status')}}</td>
                               <td>
                                    @if ($review->status==1)
                                        <span class="badge badge-success">{{__('Active')}}</span>
                                    @else
                                        <span class="badge badge-danger">{{__('Inactive')}}</span>
                                    @endif
                               </td>
                           </tr>

                           <tr>
                               <td>{{__('Change Status')}}</td>
                               <form id="updateReview" action="{{ route('admin.update-review', $review->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>
                                    <select name="status" id="" class="form-control">
                                        <option {{ $review->status == 1 ? 'selected' : '' }} value="1">{{__('Active')}}</option>
                                        <option {{ $review->status == 0 ? 'selected' : '' }} value="0">{{__('Inactive')}}</option>
                                    </select>
                                </td>
                                </form>
                           </tr>


                        </table>
                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" onclick="deleteData({{ $review->id }})"><i class="fa fa-trash" aria-hidden="true"></i> {{__('Delete')}}</a>

                        <a href="javascript:;" id="updateBtn" class="btn btn-primary">{{__('Update Status')}}</a>

                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
<script>
    "use strict";
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/delete-service-review/") }}'+"/"+id)
    }

    (function($) {
        "use strict";
        $(document).ready(function () {
            $("#updateBtn").on("click", function(){
                $("#updateReview").submit();
            })
        });
    })(jQuery);




</script>
@endsection
