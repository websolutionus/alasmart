@extends($active_theme)

@section('title')
    <title>{{__('User Collection')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('User Collection')}}">
@endsection

@section('frontend-content')

    <!--=============================
        PROFILE COLLECTION START
    ==============================-->
    <section class="wsus__profile pt_130 xs_pt_100 pb_120 xs_pb_80">

        @include('user.inc.profile_header')

            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="wsus__profile_portfolio">
                        <div class="row">
                            @forelse ($wishlists as $wishlist)
                            <div class="col-xl-6 col-md-6">
                                <div class="wsus__gallery_item">
                                    <div class="wsus__gallery_item_img">
                                        <img src="{{ asset($wishlist->product->thumbnail_image) }}" alt="gallery" class="img-fluid w-100">
                                        <ul class="wsus__gallery_item_overlay">
                                            <li><a target="__blank" href="{{ $wishlist->product->preview_link }}">{{__('Preview')}}</a></li>
                                            <li><a href="{{ route('delete-wishlist', $wishlist->id) }}">{{__('Delete')}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="wsus__gallery_item_text">
                                        <p class="price">{{ $setting->currency_icon }}{{ html_decode($wishlist->product->regular_price) }}</p>
                                        <a class="title" href="{{ route('product-detail', $wishlist->product->slug) }}">{{ html_decode($wishlist->product->name) }}</a>
                                        <p>{{__('By')}} <span>{{ $wishlist->product->author->name }}</span> {{__('In')}} <a class="category" href="{{ route('products', ['category' => $wishlist->product->category->slug]) }}">{{ $wishlist->product->category->name }}</a></p>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            @php
                                                $review=App\Models\Review::where(['product_id' => $wishlist->product->id, 'status' => 1])->get()->average('rating');
                                                $sale=App\Models\OrderItem::where(['product_id' => $wishlist->product->id])->get()->count();
                                                $wishlist=App\Models\Wishlist::where(['product_id' => $wishlist->product->id])->get()->count();
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
                            <div class="col-12 text-center mt-5">
                                <h2 class="mt-5 text-danger">{{__('Collection not found')}}</h2>
                           </div>
                            @endforelse
                        </div>
                        @if ($wishlists->hasPages())
                        <div class="wsus__pagination mt_25">
                            {{ $wishlists->links('custom_pagination') }}
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
        PROFILE COLLECTION END
    ==============================-->

@endsection
