@extends($active_theme)

@section('title')
    <title>{{__('Seller withdraw')}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{__('Seller withdraw')}}">
@endsection

@section('frontend-content')


    <!--=============================
        PROFILE DOWNLOAD START
    ==============================-->
    <section class="wsus__profile pt_150">
        <div class="container">
            {{-- start header section --}}
            @include('user.inc.profile_header')
            {{-- end header section --}}

            <div class="row mt_5">
                <div class="col-xl-6">
                    <div class="wsus__current_balance">
                        <p>{{__('Current Balance')}}</p>
                        <h2>{{ $setting->currency_icon }}{{ $current_balance }}</h2>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#withdraw_modal">{{__('Withdraw')}}</a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="wsus__total_balance">
                        <span>
                            <img src="{{ asset('frontend') }}/images/withdraw_icon1.png" alt="today earning" class="img-fluid w-100">
                        </span>
                        <p>{{__('Total Earning')}}</p>
                        <h3>{{ $setting->currency_icon }}{{ $total_balance }}</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="wsus__total_balance">
                        <span>
                            <img src="{{ asset('frontend') }}/images/withdraw_icon2.png" alt="today earning" class="img-fluid w-100">
                        </span>
                        <p>{{__('Total Withdraw')}}</p>
                        <h3>{{ $setting->currency_icon }}{{ $total_withdraw }}</h3>
                    </div>
                </div>
            </div>
            
            <div class="row mt_30">
                @if ($withdraws->count()>0)
                <div class="col-12">
                    <div class="wsus__withdraw_list">
                        <h2>{{__('My Withdraw')}}</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class="number">{{__('Number')}}</th>
                                        <th class="method">{{__('Method')}}</th>
                                        <th class="method">{{__('Total Amount')}}</th>
                                        <th class="charge">{{__('Charge')}}</th>
                                        <th class="amount">{{__('Withdraw Amount')}}</th>
                                        <th class="status">{{__('Status')}}</th>
                                    </tr>
                                    @foreach ($withdraws as $index=>$withdraw)
                                    <tr>
                                        <td class="number">{{ ++$index }}</td>
                                        <td class="method">{{ $withdraw->method }}</td>
                                        <td class="method">{{ $setting->currency_icon }}{{ $withdraw->total_amount }}</td>
                                        <td class="charge">{{ $setting->currency_icon }}{{ $withdraw->total_amount-$withdraw->withdraw_amount }}</td>
                                        <td class="amount">{{ $setting->currency_icon }}{{ html_decode($withdraw->withdraw_amount) }}</td>
                                        @if ($withdraw->status==1)
                                        <td class="status"><span class="pending">{{__('Success')}}</span></td>
                                        @else
                                        <td class="status"><span class="cancel">{{__('Pending')}}</span></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                <!-- withdraw Modal start -->
                <div class="withdraw_modal_area">
                    <div class="modal fade" id="withdraw_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="withdraw_modal_content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('My Withdraw')}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('withdraw.store') }}" method="POST">
                                            @csrf
                                            <div class="withdraw_modal_input">
                                                <label>{{__('Select Withdraw Method')}}*</label>
                                                <select class="select_js" name="method_id" id="method_id">
                                                    <option value="">{{__('Select Withdraw Method')}}</option>
                                                    @foreach ($withdraw_methods as $withdraw_method)
                                                    <option value="{{ $withdraw_method->id }}">{{ $withdraw_method->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 mt-5 pt-3" id="method_des_box">
                                                
                                            </div>
                                            <div class="withdraw_modal_input mt-3">
                                                <label>{{__('Withdraw amount')}}*</label>
                                                <input type="text" name="withdraw_amount">
                                            </div>
                                            <div class="withdraw_modal_input">
                                                <label>{{__('Account Information')}}*</label>
                                                <textarea name="account_info" id="" cols="30" rows="10"></textarea>
                                            </div>
                                            <button type="submit" class="common_btn">{{__('Withdrow Now')}}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- withdraw Modal end -->
            </div>
        </div>
    </section>

@endsection
@section('frontend_js')
<script>
    (function($) {
    "use strict";
    $(document).ready(function () {
        $("#method_id").on('change', function(){
            var methodId = $(this).val();
            $.ajax({
                type:"get",
                url:"{{url('/get-withdraw-account-info/')}}"+"/"+methodId,
                success:function(response){
                   $("#method_des_box").html(response);
                },
                error:function(err){}
            })

            if(!methodId){
                $("#method_des").addClass('d-none')
            }

        });
    });
})(jQuery);
</script>
@endsection
