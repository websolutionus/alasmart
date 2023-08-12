@extends($active_theme)

@section('title')
    <title>{{__('Change password')}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{__('Change password')}}">
@endsection

@section('frontend-content')
    <!--=============================
        AUTHOR EDIT PROFILE START
    ==============================-->
    <div class="wsus__author_edit_profile mt_180 pb_120 xs_pb_80">
        <div class="container">
            <div class="wsus__author_edit_profile_bg">
                <h2 class="edit_heading">{{__('Change password')}}</h2>
                <form action="{{ route('update-password') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="wsus__author_edit_form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Current password')}}*</legend>
                                                <input type="password" name="current_password" placeholder="*****">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Password')}}*</legend>
                                                <input type="password" name="password" placeholder="*****">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="wsus__comment_single_input">
                                            <fieldset>
                                                <legend>{{__('Confirm Password')}}*</legend>
                                                <input type="password" name="c_password" placeholder="*****">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--=============================
        AUTHOR EDIT PROFILE END
    ==============================-->
@endsection
