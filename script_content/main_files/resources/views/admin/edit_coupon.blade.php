@extends('admin.master_layout')
@section('title')
<title>{{__('Coupon')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Edit Coupon')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Edit coupon')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.coupon.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Coupon')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>{{__('Coupon name')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="coupon_name" value="{{ $coupon->coupon_name }}">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Coupon discount')}}(%) <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="coupon_discount" value="{{ $coupon->coupon_discount }}">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Coupon validity')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" value="{{ $coupon->coupon_validity }}" name="coupon_validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $coupon->status==1? 'selected':'' }}>{{__('Active')}}</option>
                                        <option value="0" {{ $coupon->status==0? 'selected':'' }}>{{__('Inactive')}}</option>
                                    </select>
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
