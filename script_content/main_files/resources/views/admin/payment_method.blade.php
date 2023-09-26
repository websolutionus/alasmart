@extends('admin.master_layout')
@section('title')
<title>{{__('Payment Methods')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Payment Methods')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            </div>
          </div>

        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">


                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link active" id="paypal-tab" data-toggle="tab" href="#paypalTab" role="tab" aria-controls="paypalTab" aria-selected="true">{{__('Paypal')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="stripe-tab" data-toggle="tab" href="#stripeTab" role="tab" aria-controls="stripeTab" aria-selected="true">{{__('Stripe')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="razorpay-tab" data-toggle="tab" href="#razorpayTab" role="tab" aria-controls="razorpayTab" aria-selected="true">{{__('Razorpay')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="flutterwave-tab" data-toggle="tab" href="#flutterwaveTab" role="tab" aria-controls="flutterwaveTab" aria-selected="true">{{__('Flutterwave')}}</a>
                                        </li>



                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="mollie-tab" data-toggle="tab" href="#mollieTab" role="tab" aria-controls="mollieTab" aria-selected="true">{{__('Mollie')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="pay-stack-tab" data-toggle="tab" href="#payStackTab" role="tab" aria-controls="payStackTab" aria-selected="true">{{__('PayStack')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="instamojo-tab" data-toggle="tab" href="#instamojoTab" role="tab" aria-controls="instamojoTab" aria-selected="true">{{__('Instamojo')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="bank-account-tab" data-toggle="tab" href="#bankAccountTab" role="tab" aria-controls="bankAccountTab" aria-selected="true">{{__('Bank Account')}}</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="ssl-tab" data-toggle="tab" href="#sslTab" role="tab" aria-controls="sslTab" aria-selected="true">{{__('Sslcommerz')}}</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9">
                                    <div class="border rounded">
                                        <div class="tab-content no-padding" id="settingsContent">

                                            <div class="tab-pane fade show active" id="paypalTab" role="tabpanel" aria-labelledby="paypal-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-paypal') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('Paypal Status')}}</label>
                                                                <div>
                                                                    @if ($paypal->status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Account Mode')}}</label>
                                                                <select name="account_mode" id="account_mode" class="form-control">
                                                                    <option {{ $paypal->account_mode == 'live' ? 'selected' : '' }} value="live">{{__('Live')}}</option>
                                                                    <option {{ $paypal->account_mode == 'sandbox' ? 'selected' : '' }} value="sandbox">{{__('Sandbox')}}</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Country Name')}}</label>
                                                                <select name="country_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Country')}}
                                                                  </option>
                                                                  @foreach ($countires as $country)
                                                                  <option {{ $paypal->country_code == $country->code ? 'selected' : '' }} value="{{ $country->code }}">{{ $country->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{ __('admin.Currency Name')}}</label>
                                                                <select name="currency_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Currency')}}
                                                                  </option>
                                                                  @foreach ($currencies as $currency)
                                                                  <option {{ $paypal->currency_code == $currency->code ? 'selected' : '' }} value="{{ $currency->code }}">{{ $currency->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency rate')}} ( {{__('Per')}} {{ $setting->currency_name }})</label>
                                                                <input type="text" class="form-control" name="currency_rate" value="{{ $paypal->currency_rate }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Paypal Client Id')}}</label>
                                                                <input type="text" class="form-control" name="paypal_client_id" value="{{ $paypal->client_id }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Paypal Secret Key')}}</label>
                                                                <input type="text" class="form-control" name="paypal_secret_key" value="{{ $paypal->secret_id }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($paypal->image) }}" alt="" class="w_200">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <input type="file" name="image" class="form-control-file">
                                                            </div>

                                                            <button class="btn btn-primary">{{__('Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="stripeTab" role="tabpanel" aria-labelledby="stripe-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-stripe') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('Stripe Status')}}</label>
                                                                <div>
                                                                    @if ($stripe->status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Country Name')}}</label>
                                                                <select name="country_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Country')}}
                                                                  </option>
                                                                  @foreach ($countires as $country)
                                                                  <option {{ $stripe->country_code == $country->code ? 'selected' : '' }} value="{{ $country->code }}">{{ $country->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Name')}}</label>
                                                                <select name="currency_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Currency')}}
                                                                  </option>
                                                                  @foreach ($currencies as $currency)
                                                                  <option {{ $stripe->currency_code == $currency->code ? 'selected' : '' }} value="{{ $currency->code }}">{{ $currency->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency rate')}} ( {{__('per')}} {{ $setting->currency_name }})</label>
                                                                <input type="text" class="form-control" name="currency_rate" value="{{ $stripe->currency_rate }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Stripe Key')}}</label>
                                                                <input type="text" class="form-control" name="stripe_key" value="{{ $stripe->stripe_key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Stripe Secret')}}</label>
                                                                <input type="text" class="form-control" name="stripe_secret" value="{{ $stripe->stripe_secret }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($stripe->image) }}" alt="" class="w_200">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <input type="file" name="image" class="form-control-file">
                                                            </div>





                                                            <button class="btn btn-primary">{{__('Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="razorpayTab" role="tabpanel" aria-labelledby="razorpay-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-razorpay') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('Razorpay Status')}}</label>
                                                                <div>
                                                                    @if ($razorpay->status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Razorpay Key')}}</label>
                                                                <input type="text" class="form-control" name="razorpay_key" value="{{ $razorpay->key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Razorpay Secret Key')}}</label>
                                                                <input type="text" class="form-control" name="razorpay_secret" value="{{ $razorpay->secret_key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Name')}}</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $razorpay->name }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Description')}}</label>
                                                                <input type="text" class="form-control" name="description" value="{{ $razorpay->description }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Country Name')}}</label>
                                                                <select name="country_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Country')}}
                                                                  </option>
                                                                  @foreach ($countires as $country)
                                                                  <option {{ $razorpay->country_code == $country->code ? 'selected' : '' }} value="{{ $country->code }}">{{ $country->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Name')}}</label>
                                                                <select name="currency_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Currency')}}
                                                                  </option>
                                                                  @foreach ($currencies as $currency)
                                                                  <option {{ $razorpay->currency_code == $currency->code ? 'selected' : '' }} value="{{ $currency->code }}">{{ $currency->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Rate')}} ({{__('per')}} {{ $setting->currency_name }})</label>
                                                                <input type="text" class="form-control" name="currency_rate" value="{{ $razorpay->currency_rate }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Current Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($razorpay->image) }}" width="200px" alt="">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('New Image')}}</label>
                                                                <input type="file" class="form-control-file" name="image">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Theme Color')}}</label>
                                                                <input type="color" value="{{ $razorpay->color }}" class="form-control" name="theme_color">
                                                            </div>

                                                            <button class="btn btn-primary">{{__('Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="flutterwaveTab" role="tabpanel" aria-labelledby="flutterwave-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-flutterwave') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('Flutterwave Status')}}</label>
                                                                <div>
                                                                    @if ($flutterwave->status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Public Key')}}</label>
                                                                <input type="text" class="form-control" name="public_key" value="{{ $flutterwave->public_key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Secret Key')}}</label>
                                                                <input type="text" class="form-control" name="secret_key" value="{{ $flutterwave->secret_key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Title')}}</label>
                                                                <input type="text" class="form-control" name="title" value="{{ $flutterwave->title }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Country Name')}}</label>
                                                                <select name="country_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Country')}}
                                                                  </option>
                                                                  @foreach ($countires as $country)
                                                                  <option {{ $flutterwave->country_code == $country->code ? 'selected' : '' }} value="{{ $country->code }}">{{ $country->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Name')}}</label>
                                                                <select name="currency_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Currency')}}
                                                                  </option>
                                                                  @foreach ($currencies as $currency)
                                                                  <option {{ $flutterwave->currency_code == $currency->code ? 'selected' : '' }} value="{{ $currency->code }}">{{ $currency->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Rate')}} ({{__('Per')}} {{ $setting->currency_name }})</label>
                                                                <input type="text" class="form-control" name="currency_rate" value="{{ $flutterwave->currency_rate }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Current Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($flutterwave->logo) }}" width="200px" alt="">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('New Image')}}</label>
                                                                <input type="file" class="form-control-file" name="image">
                                                            </div>

                                                            <button class="btn btn-primary">{{__('Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="mollieTab" role="tabpanel" aria-labelledby="mollie-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-mollie') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('Mollie Status')}}</label>
                                                                <div>
                                                                    @if ($paystackAndMollie->mollie_status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Mollie Key')}}</label>
                                                                <input type="text" class="form-control" name="mollie_key" value="{{ $paystackAndMollie->mollie_key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Country Name')}}</label>
                                                                <select name="mollie_country_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Country')}}
                                                                  </option>
                                                                  @foreach ($countires as $country)
                                                                  <option {{ $paystackAndMollie->mollie_country_code == $country->code ? 'selected' : '' }} value="{{ $country->code }}">{{ $country->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Name')}}</label>
                                                                <select name="mollie_currency_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Currency')}}
                                                                  </option>
                                                                  @foreach ($currencies as $currency)
                                                                  <option {{ $paystackAndMollie->mollie_currency_code == $currency->code ? 'selected' : '' }} value="{{ $currency->code }}">{{ $currency->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Rate')}} ({{__('per')}} {{ $setting->currency_name }})</label>
                                                                <input type="text" class="form-control" name="mollie_currency_rate" value="{{ $paystackAndMollie->mollie_currency_rate }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($paystackAndMollie->mollie_image) }}" alt="" class="w_200">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <input type="file" name="image" class="form-control-file">
                                                            </div>

                                                            <button class="btn btn-primary">{{__('Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="payStackTab" role="tabpanel" aria-labelledby="pay-stack-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-paystack') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('PayStack Status')}}</label>
                                                                <div>
                                                                    @if ($paystackAndMollie->paystack_status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Public Key')}}</label>
                                                                <input type="text" name="paystack_public_key" class="form-control" value="{{ $paystackAndMollie->paystack_public_key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Secret Key')}}</label>
                                                                <input type="text" name="paystack_secret_key" class="form-control" value="{{ $paystackAndMollie->paystack_secret_key }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Country Name')}}</label>
                                                                <select name="paystack_country_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Country')}}
                                                                  </option>
                                                                  @foreach ($countires as $country)
                                                                  <option {{ $paystackAndMollie->paystack_country_code == $country->code ? 'selected' : '' }} value="{{ $country->code }}">{{ $country->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Name')}}</label>
                                                                <select name="paystack_currency_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Currency')}}
                                                                  </option>
                                                                  @foreach ($currencies as $currency)
                                                                  <option {{ $paystackAndMollie->paystack_currency_code == $currency->code ? 'selected' : '' }} value="{{ $currency->code }}">{{ $currency->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Rate')}} ({{__('per')}} {{ $setting->currency_name }})</label>
                                                                <input type="text" class="form-control" name="paystack_currency_rate" value="{{ $paystackAndMollie->paystack_currency_rate }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($paystackAndMollie->paystack_image) }}" alt="" class="w_200">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <input type="file" name="image" class="form-control-file">
                                                            </div>

                                                            <button class="btn btn-primary">{{__('Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="instamojoTab" role="tabpanel" aria-labelledby="instamojo-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-instamojo') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('Instamojo Status')}}</label>
                                                                <div>
                                                                    @if ($instamojo->status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Account Mode')}}</label>
                                                                <select name="account_mode" id="account_mode" class="form-control">
                                                                    <option value="Sandbox">{{__('Sandbox')}}</option>
                                                                    <option value="Live">{{__('Live')}}</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Api Key')}}</label>
                                                                <input type="text" name="api_key" class="form-control" value="{{ $instamojo->api_key }}">
                                                            </div>



                                                            <div class="form-group">
                                                                <label for="">{{__('Auth Token')}}</label>
                                                                <input type="text" name="auth_token" class="form-control" value="{{ $instamojo->auth_token }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('INR Currency Rate')}} ({{__('per')}} {{ $setting->currency_name }})</label>
                                                                <input type="text" class="form-control" name="currency_rate" value="{{ $instamojo->currency_rate }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($instamojo->image) }}" alt="" class="w_200">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <input type="file" name="image" class="form-control-file">
                                                            </div>

                                                            <button class="btn btn-primary">{{__('Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="bankAccountTab" role="tabpanel" aria-labelledby="bank-account-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-bank') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('Bank Payment Status')}}</label>
                                                                <div>
                                                                    @if ($bank->status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Account Information')}}</label>
                                                                <textarea name="account_info" id="" cols="30" rows="10" class="text-area-5 form-control">{{ $bank->account_info }}</textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($bank->image) }}" alt="" class="w_200">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <input type="file" name="image" class="form-control-file">
                                                            </div>

                                                            <button class="btn btn-primary">{{__('Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="sslTab" role="tabpanel" aria-labelledby="stripe-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.update-sslcommerz') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="">{{__('Sslcommerz Status')}}</label>
                                                                <div>
                                                                    @if ($sslcommerzPayment->status == 1)
                                                                        <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                        @else
                                                                        <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Enable')}}" data-off="{{__('Disable')}}" data-onstyle="success" data-offstyle="danger" name="status">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Country Name')}}</label>
                                                                <select name="country_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Country')}}
                                                                  </option>
                                                                  @foreach ($countires as $country)
                                                                  <option {{ $sslcommerzPayment->country_code == $country->code ? 'selected' : '' }} value="{{ $country->code }}">{{ $country->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency Name')}}</label>
                                                                <select name="currency_name" id="" class="form-control select2">
                                                                    <option value="">{{__('Select Currency')}}
                                                                  </option>
                                                                  @foreach ($currencies as $currency)
                                                                  <option {{ $sslcommerzPayment->currency_code == $currency->code ? 'selected' : '' }} value="{{ $currency->code }}">{{ $currency->name }}
                                                                  </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Currency rate')}} ( {{__('per')}} {{ $setting->currency_name }})</label>
                                                                <input type="text" class="form-control" name="currency_rate" value="{{ $sslcommerzPayment->currency_rate }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Store Id')}}</label>
                                                                <input type="text" class="form-control" name="store_id" value="{{ $sslcommerzPayment->store_id }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Store Password')}}</label>
                                                                <input type="text" class="form-control" name="store_password" value="{{ $sslcommerzPayment->store_password }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <div>
                                                                    <img src="{{ asset($sslcommerzPayment->image) }}" alt="" class="w_200">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Existing Image')}}</label>
                                                                <input type="file" name="image" class="form-control-file">
                                                            </div>
                                                            <button class="btn btn-primary">{{__('Update')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
      </div>
@endsection
