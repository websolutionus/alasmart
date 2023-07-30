<div class="wsus__profile_header">
    <div class="row">
        <div class="col-xl-12">
            <div class="wsus__profile_header_text">
                <div class="img wow fadeInLeft" data-wow-duration="1s">
                    @if ($user->image!=null)
                    <img src="{{ asset($user->image) }}" alt="profile" class="img-fluid w-100">
                    @elseif($user->provider=='google')
                    <img src="{{ asset($user->provider_avatar) }}" alt="profile" class="img-fluid w-100">
                    @else
                    <img src="{{ asset($setting->default_avatar) }}" alt="profile" class="img-fluid w-100">
                    @endif
                    <span></span>
                </div>
                <div class="text wow fadeInRight" data-wow-duration="1s">
                    <h2>{{ html_decode($user->name) }}</h2>
                    <p class="skills">{{ $user->designation }}</p>
                    @php
                        $review=App\Models\Review::where(['author_id' => $user->id, 'status' => 1])->get()->average('rating');
                        $votes=App\Models\Review::where(['author_id' => $user->id, 'status' => 1])->get()->count();
                    @endphp
                    <div class="rating">
                        <div class="user-rating-box">
                            <span>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                        <div class="user-rating-box2">
                            <span>
                                @for ($i = 0; $i < $review; $i++)
                                <i class="fas fa-star"></i>
                                @endfor
                            </span>
                        </div>
                        <p>{{__('Average rating of')}} {{ $review==0?0:$review }} {{__('based on')}} {{ $votes }} {{__('votes')}}</p>
                    </div>
                </div>
                <div class="profile_bg_animi">
                    <ul class="bg_animation">
                        <li class="wow bounceIn" data-wow-duration=" 1000ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1100ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1200ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1300ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1400ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1500ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1600ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1700ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1800ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1900ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 2000ms"></li>
                    </ul>
                    <ul class="bg_animation bg_animation_r">
                        <li class="wow bounceIn" data-wow-duration=" 1000ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1100ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1200ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1300ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1400ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1500ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1600ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1700ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1800ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 1900ms"></li>
                        <li class="wow bounceIn" data-wow-duration=" 2000ms"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <ul class="header_menu d-flex flex-wrap">
        <li><a class="{{ Route::is('author-profile') ? 'active' : '' }}" href="{{ route('author-profile', $user->user_name) }}"><i class="fal fa-layer-group"></i>{{__('Overview')}}</a>
        </li>
        <li><a class="{{ Route::is('author-portfolio') ? 'active' : '' }}" href="{{ route('author-portfolio', $user->user_name) }}"><i class="far fa-box"></i> {{__('Portfolio')}}</a></li>
    </ul>
</div>