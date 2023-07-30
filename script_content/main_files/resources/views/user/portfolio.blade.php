@extends($active_theme)

@section('title')
    <title>{{__('User portfolio')}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{__('User portfolio')}}">
@endsection

@section('frontend-content')

    <!--=============================
        PROFILE POERFOLIO START
    ==============================-->
    <section class="wsus__profile pt_150">
        <div class="container">
            {{-- start header section --}}
            @include('user.inc.profile_header')
            {{-- end header section --}}

            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="wsus__profile_portfolio mt_15">
                        <div class="row">
                            @forelse ($products as $product)
                            <div class="col-xl-6 col-md-6 wow fadeInUp" data-wow-duration="1s">
                                <div class="wsus__gallery_item">
                                    <div class="wsus__gallery_item_img">
                                        <img src="{{ asset($product->thumbnail_image) }}" alt="gallery" class="img-fluid w-100">
                                        <p><span>{{ $setting->currency_icon }}</span>{{ html_decode($product->regular_price) }}</p>
                                        <ul class="wsus__gallery_item_overlay">
                                            <li><a href="{{ route('product-edit', $product->id) }}">{{__('Edit')}}</a></li>
                                            <li><a data-bs-toggle="modal" data-bs-target="#dataDelete" onclick="deleteData({{ $product->id }})" href="javascript:;">{{__('Delete')}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="wsus__gallery_item_text">
                                        <p>{{__('By')}} <span>{{ $product->author->name }}</span> {{__('In')}} <a class="category" href="{{ route('products', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></p>
                                        <a class="title" href="{{ route('product-detail', $product->slug) }}">{{ html_decode($product->name) }}</a>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            @php
                                                $review=App\Models\Review::where(['product_id' => $product->id, 'status' => 1])->get()->average('rating');
                                                $sale=App\Models\OrderItem::where(['product_id' => $product->id, 'author_id' => $user->id])->get()->count();
                                            @endphp
                                            <li><a href="#"><i class="fas fa-download"></i> {{ $sale }} {{__('Sale')}}</a></li>
                                            <li>
                                                <p>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </p>
                                            
                                                <p class="product-review">
                                                    @for ($i = 0; $i < $review; $i++)
                                                    <i class="fas fa-star"></i>
                                                    @endfor
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center text-danger mt-5">
                                <h2 class="mt-5">{{__('Product Not Found')}}</h2>
                            </div>
                            @endforelse
                        </div>
                        <div class="row">
                            <div class="wsus__pagination mt_50">
                                <div class="col-12">
                                    {{ $products->links('custom_pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- information --}}
                @php
                    $order_item=App\Models\OrderItem::where('author_id', $user->id)->get()->count();
                    $total_product=App\Models\Product::where(['author_id' => $user->id, 'status' => 1])->get()->count();
                    $total_review=App\Models\Review::where(['author_id' => $user->id, 'status' => 1])->get()->count();
                @endphp
                <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-duration="1s">
                    <div class="wsus__profile_sidebar">
                        <div class="wsus__profile_sedebar_item wsus__sidebar_buy_info mt_30">
                            <h3>{{__('Selling Info')}}</h3>
                            <ul class="info">
                                <li>
                                    <p><i class="fal fa-cart-plus"></i> {{__('Total Sale')}}</p>
                                    <span>{{ $order_item }}</span>
                                </li>
                                <li>
                                    <p><i class="far fa-box"></i> {{__('Item')}}</p>
                                    <span>{{ $total_product }}</span>
                                </li>
                                <li>
                                    <p><i class="fas fa-star"></i> {{__('Item Rating')}}</p>
                                    <span><i class="fas fa-star"></i> ({{ $total_review }})</span>
                                </li>
                            </ul>
                        </div>
                        <div class="wsus__profile_sedebar_item wsus__sidebar_pro_info mt_30">
                            <h3>{{__('Personal Info')}}</h3>
                            <ul>
                                <li><span>{{__('Country')}}</span> {{ $user->country ? $user->country->name : '' }}</li>
                                <li><span>{{__('City')}}</span> {{ $user->country ? $user->city->name : ''}}</li>
                                <li><span>{{__('Member Since')}}</span> {{ Carbon\Carbon::parse($user->created_at)->format('F Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        PROFILE POERFOLIO END
    ==============================-->

    <div class="modal fade" id="dataDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="deleteForm">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Item Delete Confirmation')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{__('Are You sure delete this item')}} ?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('Close')}}</button>
                <button type="submit" class="btn btn-primary">{{__('Yes, Delete')}}</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection
@section('frontend_js')
<script>
    (function($) {
        "use strict";
        $(document).ready(function () {
            $("#contactWithAuthor").on("submit", function(e){
                e.preventDefault();

                var isDemo = "{{ env('APP_MODE') }}"
                if(isDemo == 'DEMO'){
                    toastr.error('This Is Demo Version. You Can Not Change Anything');
                    return;
                }
                 $('#submitBtn').addClass('d-none');
                 $('#showSpain').removeClass('d-none');
                $.ajax({
                    url: "{{ route('contact-with-author') }}",
                    type:"post",
                    data:$('#contactWithAuthor').serialize(),
                    success:function(response){
                        if(response.status == 1){
                            toastr.success(response.message)
                            $("#contactWithAuthor").trigger("reset");
                            $('#submitBtn').removeClass('d-none');
                            $('#showSpain').addClass('d-none');
                        }
                    },
                    error:function(response){
                        if(response.status == 403){
                            toastr.error(response.responseJSON.message);
                            $('#submitBtn').removeClass('d-none');
                            $('#showSpain').addClass('d-none');
                        }else{
                            if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                            if(response.responseJSON.errors.message)toastr.error(response.responseJSON.errors.message[0])
                            $('#submitBtn').removeClass('d-none');
                            $('#showSpain').addClass('d-none');
                        }
                    }
                });
            });
        });
    })(jQuery);

    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("delete-product") }}'+"/"+id)
    }
</script>
@endsection
