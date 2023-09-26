@extends('admin.master_layout')
@section('title')
<title>{{__('Product Review')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Product Review')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">{{__('Product')}}</a></div>
              <div class="breadcrumb-item">{{__('Product Review')}}</div>
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
                                    <th width="30%">{{__('Product Name')}}</th>
                                    <th width="30%">{{__('Review')}}</th>
                                    <th width="5%">{{__('Product')}}</th>
                                    <th width="15%">{{__('Status')}}</th>
                                    <th width="5%">{{__('Action')}}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($productReviews as $index => $productReview)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td><a href="{{ route('admin.product.edit', $productReview->product->id) }}">{{ html_decode($productReview->product->productlangadmin->name) }}</a></td>
                                        <td>{{ html_decode($productReview->review) }}</td>
                                        <td> <a class="btn btn-success btn-sm" href="{{ route('product-detail',$productReview->product->slug) }}">{{__('view')}}</a></td>
                                        <td>

                                            @if($productReview->status == 1)
                                            <a href="javascript:;" onclick="changeProductReviewStatus({{ $productReview->id }})">
                                                <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Active')}}" data-off="{{__('Inactive')}}" data-onstyle="success" data-offstyle="danger">
                                            </a>

                                            @else
                                            <a href="javascript:;" onclick="changeProductReviewStatus({{ $productReview->id }})">
                                                <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Active')}}" data-off="{{__('Inactive')}}" data-onstyle="success" data-offstyle="danger">
                                            </a>

                                            @endif
                                        </td>
                                        <td>

                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $productReview->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/product-review/") }}'+"/"+id)
    }
    function changeProductReviewStatus(id){
        var isDemo = "{{ env('APP_MODE') }}"
        if(isDemo == 'DEMO'){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/product-review-status/')}}"+"/"+id,
            success:function(response){
                toastr.success(response)
            },
            error:function(err){


            }
        })
    }
</script>
@endsection
