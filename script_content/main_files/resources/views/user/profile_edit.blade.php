@extends($active_theme)

@section('title')
    <title>{{__('Profile edit')}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{__('Profile edit')}}">
@endsection

@section('frontend-content')
    <!--=============================
        AUTHOR EDIT PROFILE START
    ==============================-->
    <div class="wsus__author_edit_profile mt_180 pb_120 xs_pb_80">
        <div class="container">
            <div class="wsus__author_edit_profile_bg">
                <h2 class="edit_heading">{{__('Edit Your Profile')}}</h2>
                <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="wsus__author_edit_form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Name')}}*</legend>
                                                <input type="text" name="name" value="{{ html_decode($user->name) }}">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Designation')}}*</legend>
                                                <input type="text" name="designation" value="{{ html_decode($user->designation) }}">
                                            </fieldset>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Phone')}}*</legend>
                                                <input type="text" name="phone" value="{{ html_decode($user->phone) }}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Country')}}</legend>
                                                <input type="text" name="country" value="{{ html_decode($user->country) }}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('State')}}</legend>
                                                <input type="text" name="state" value="{{ html_decode($user->phone) }}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Town/City')}}</legend>
                                                <input type="text" name="city" value="{{ html_decode($user->city) }}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Address')}}*</legend>
                                                <input type="text" name="address" value="{{ html_decode($user->address) }}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Facebook')}}*</legend>
                                                <input type="text" name="facebook" value="{{ html_decode($user->facebook )}}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Pinterest')}}*</legend>
                                                <input type="text" name="pinterest" value="{{ html_decode($user->pinterest) }}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Linkedin')}}*</legend>
                                                <input type="text" name="linkedIn" value="{{ html_decode($user->linkedIn) }}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Dribbble')}}*</legend>
                                                <input type="text" name="dribbble" value="{{ html_decode($user->dribbble) }}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Twitter')}}*</legend>
                                                <input type="text" name="twitter" value="{{ html_decode($user->twitter) }}">
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('About Me')}}*</legend>
                                                <textarea rows="4" name="about_me" id="editor">{{ html_decode($user->about_me) }}</textarea>
                                            </fieldset>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-12">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('My Skills')}}*</legend>
                                                <textarea rows="4" name="my_skill" rows="7" id="editor">{{ html_decode($user->my_skill) }}</textarea>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="button_area d-flex flex-wrap align-items-center">
                                            <li><a href="{{ url()->previous() }}" class="cancel">{{__('cancel')}}</a></li>
                                            <li><button type="submit" class="common_btn">{{__('Save and change')}} </button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="wsus__author_edit_photo">
                                <div class="img">
                                    <img src="{{ asset('frontend/images/author_upload_img.jpg') }}" alt="upload" class="img-fluid w-100">
                                </div>
                                <input type="file" name="image" hidden id="author_photo">
                                <label for="author_photo"><i class="fal fa-upload"></i> {{__('Upload a Picture')}}</label>
                                <h4>{{__('Upload Your Image')}}</h4>
                                <p>{{__('Choose a image PNG, JPEG, PDF')}}</p>
                                <p><span>{{__('Note')}}:</span> {{__('Max File Size 10MB')}}</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--=============================
        AUTHOR EDIT PROFILE END
    ==============================-->
@endsection
