@extends('admin.master_layout')
@section('title')
<title>{{__('Email Template')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Edit Email Template')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item active"><a href="{{ route('admin.email-template') }}">{{__('Email Template')}}</a></div>
              <div class="breadcrumb-item">{{__('Edit Email Template')}}</div>
            </div>
          </div>

        <div class="section-body">
            <a href="{{ route('admin.email-template') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Email Template')}}</a>
            <div class="row mt-4">
                @if ($template->id != 3)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>{{__('Variable')}}</th>
                                        <th>{{__('Meaning')}}</th>
                                    </thead>
                                    <tbody>
                                        @if ($template->id == 1)
                                            <tr>
                                                @php
                                                    $name="{{name}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('User Name')}}</td>
                                            </tr>
                                        @endif

                                        @if ($template->id == 2)
                                            <tr>
                                                @php
                                                    $name="{{name}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('User Name')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $email="{{email}}";
                                                @endphp
                                                <td>{{ $email }}</td>
                                                <td>{{__('User Email')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $phone="{{phone}}";
                                                @endphp
                                                <td>{{ $phone }}</td>
                                                <td>{{__('User Phone')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $subject="{{subject}}";
                                                @endphp
                                                <td>{{ $subject }}</td>
                                                <td>{{__('User Subject')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $message="{{message}}";
                                                @endphp
                                                <td>{{ $message }}</td>
                                                <td>{{__('Message')}}</td>
                                            </tr>
                                        @endif

                                        @if ($template->id == 4)
                                            <tr>
                                                @php
                                                    $name="{{user_name}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('User Name')}}</td>
                                            </tr>
                                        @endif

                                        @if ($template->id == 5)
                                            <tr>
                                                @php
                                                    $name="{{seller_name}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('Seller Name')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $method="{{withdraw_method}}";
                                                @endphp
                                                <td>{{ $method }}</td>
                                                <td>{{__('Withdraw method')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $total_amount="{{total_amount}}";
                                                @endphp
                                                <td>{{ $total_amount }}</td>
                                                <td>{{__('Total amount')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $withdraw_charge="{{withdraw_charge}}";
                                                @endphp
                                                <td>{{ $withdraw_charge }}</td>
                                                <td>{{__('Withdraw Charge')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $withdraw_amount="{{withdraw_amount}}";
                                                @endphp
                                                <td>{{ $withdraw_amount }}</td>
                                                <td>{{__('Withdraw amount')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $approval_date="{{approval_date}}";
                                                @endphp
                                                <td>{{ $approval_date }}</td>
                                                <td>{{__('Approval Date')}}</td>
                                            </tr>
                                        @endif

                                        @if ($template->id == 6)
                                            <tr>
                                                @php
                                                    $name="{{user_name}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('User Name')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $total_amount="{{total_amount}}";
                                                @endphp
                                                <td>{{ $total_amount }}</td>
                                                <td>{{__('Total amount')}}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $payment_method="{{payment_method}}";
                                                @endphp
                                                <td>{{ $payment_method }}</td>
                                                <td>{{__('Payment Method')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $payment_status="{{payment_status}}";
                                                @endphp
                                                <td>{{ $payment_status }}</td>
                                                <td>{{__('Payment Status')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $order_status="{{order_status}}";
                                                @endphp
                                                <td>{{ $order_status }}</td>
                                                <td>{{__('Order Status')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $order_date="{{order_date}}";
                                                @endphp
                                                <td>{{ $order_date }}</td>
                                                <td>{{__('Order Date')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $order_detail="{{order_detail}}";
                                                @endphp
                                                <td>{{ $order_detail }}</td>
                                                <td>{{__('Order Detail')}}</td>
                                            </tr>
                                        @endif


                                        @if ($template->id == 8)
                                            <tr>
                                                @php
                                                    $name="{{name}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('Client Name')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $name="{{order_id}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('Order Id')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $name="{{amount}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('Total Amount')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $name="{{schedule_date}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('Schedule Date')}}</td>
                                            </tr>
                                        @endif

                                        @if ($template->id == 9)
                                            <tr>
                                                @php
                                                    $name="{{name}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('Provider Name')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $name="{{order_id}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('Order Id')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $name="{{amount}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('Total Amount')}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                    $name="{{schedule_date}}";
                                                @endphp
                                                <td>{{ $name }}</td>
                                                <td>{{__('Schedule Date')}}</td>
                                            </tr>
                                        @endif

                                        @if ($template->id == 12)
                                            <tr>
                                                @php
                                                    $message="{{message}}";
                                                @endphp
                                                <td>{{ $message }}</td>
                                                <td>{{__('User message')}}</td>
                                            </tr>
                                        @endif



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update-email-template',$template->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">{{__('Subject')}} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $template->subject }}" name="subject">
                            </div>
                            <div class="form-group">
                                <label for="">{{__('Description')}} <span class="text-danger">*</span></label>
                                <textarea name="description" cols="30" rows="10" class="form-control summernote">{{ $template->description }}</textarea>
                            </div>
                            <button class="btn btn-success" type="submit">{{__('Update')}}</button>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
