@extends($active_theme)

@section('title')
    <title>{{__('User portfolio')}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{__('User portfolio')}}">
@endsection

@section('frontend-content')

    <!--=============================
        PROFILE PORTFOLIO START
    ==============================-->
    <section class="wsus__profile pt_130 xs_pt_100 pb_120 xs_pb_80">
        
        @include('user.inc.profile_header')

            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="wsus__profile_portfolio">
                        <div class="row">
                            @forelse ($products as $product)
                            <div class="col-xl-6 col-md-6">
                                <div class="wsus__gallery_item">
                                    <div class="wsus__gallery_item_img">
                                        <img src="{{ asset($product->thumbnail_image) }}" alt="gallery" class="img-fluid w-100">
                                        <ul class="wsus__gallery_item_overlay">
                                            <li><a href="{{ route('product-edit', $product->id) }}">{{__('user.Edit')}}</a></li>
                                            <li><a data-bs-toggle="modal" data-bs-target="#dataDelete" onclick="deleteData({{ $product->id }})" href="javascript:;">{{__('Delete')}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="wsus__gallery_item_text">
                                        <p class="price">{{ $setting->currency_icon }}{{ html_decode($product->regular_price) }}</p>
                                        <a class="title" href="{{ route('product-detail', $product->slug) }}">{{ html_decode($product->name) }}</a>
                                        <p>{{__('By')}} <span>{{ $product->author->name }}</span> {{__('In')}} <a class="category" href="{{ route('products', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></p>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            @php
                                                $review=App\Models\Review::where(['product_id' => $product->id, 'status' => 1])->get()->average('rating');
                                                $sale=App\Models\OrderItem::where(['product_id' => $product->id])->get()->count();
                                                $wishlist=App\Models\Wishlist::where(['product_id' => $product->id])->get()->count();
                                            @endphp
                                            <li>
                                                <p>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <span>({{ $review == 0 ? 0 : $review }})</span>
                                                </p>
                                                @if ($review > 0)
                                                <p class="product-review-rating">
                                                    @for ($i = 0; $i < $review; $i++)
                                                    <i class="fas fa-star"></i>
                                                    @endfor
                                                </p>
                                                @endif
                                            </li>
                                            <li>
                                                <span class="love"><i class="far fa-heart"></i> {{ $wishlist }}</span>
                                                <span class="download"><i class="far fa-download"></i> {{ $sale }} {{__('Sale')}}</span>
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
                        @if ($products->hasPages())
                            <div class="wsus__pagination mt_25">
                                {{ $products->links('custom_pagination') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    @include('user.inc.user_information')
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        PROFILE PORTFOLIO END
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
@push('frontend_js')
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
@endpush
