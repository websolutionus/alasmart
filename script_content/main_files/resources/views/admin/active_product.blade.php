@extends('admin.master_layout')
@section('title')
<title>{{__('Active Products')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Active Products')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Active Products')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.select-product-type') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{__('Add New')}}</a>
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th >{{__('SN')}}</th>
                                    <th >{{__('Name')}}</th>
                                    <th >{{__('Total Sale')}}</th>
                                    <th >{{__('Category')}}</th>
                                    <th >{{__('Status')}}</th>
                                    <th >{{__('Action')}}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($active_products as $index => $product)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td><a href="{{ route('admin.product.edit',$product->id) }}">{{ html_decode($product->name) }}</a></td>
                                        @php
                                            $total_sold=App\Models\OrderItem::where('Product_id', $product->id)->get()->count();
                                        @endphp
                                        <td>{{ $total_sold }}</td>
                                        <td>{{ $product->category->name }}</td>


                                        <td>
                                            @if($product->status == 1)
                                                <span class="badge badge-success">{{__('Active')}}</span>
                                            @else
                                                <span class="badge badge-success">{{__('Inactive')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                        <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                        @php
                                            $order_item = App\Models\OrderItem::where('product_id', $product->id)->first();
                                        @endphp

                                        @if ($order_item)
                                        <a href="javascript:;" data-toggle="modal" data-target="#canNotDeleteModal" class="btn btn-danger btn-sm""><i class="fa fa-trash" aria-hidden="true"></i></a>                                      
                                        @else
                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $product->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        @endif
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

      <!-- Modal -->
      <div class="modal fade" id="canNotDeleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                        <div class="modal-body">
                            {{__('You can not delete this product. Because there are one or more order has been created in this product.')}}
                        </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Close')}}</button>
                  </div>
              </div>
          </div>
      </div>
<script>
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/product/") }}'+"/"+id)
    }
    function changeProductStatus(id){
        var isDemo = "{{ env('APP_VERSION') }}"
        if(isDemo == 0){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/product-status/')}}"+"/"+id,
            success:function(response){
                toastr.success(response)
            },
            error:function(err){
                console.log(err);

            }
        })
    }
</script>
@endsection
