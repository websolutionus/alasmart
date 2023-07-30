@include('admin.header')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
            <div class="col-md-4"></div>
          <div class="col-md-4">

            <div class="card card-primary">
              <div class="card-header"><h4>{{__('admin.Reset Password')}}</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('admin.store.reset.password',$token) }}">
                    @csrf
                  <div class="form-group">
                    <label for="email">{{__('admin.Email')}}</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" autofocus value="{{ $admin->email }}">
                  </div>

                  <div class="form-group">
                    <label for="password">{{__('admin.New Password')}}</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2">
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">{{__('admin.Confirm Password')}}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" tabindex="2">
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      {{__('admin.Reset Password')}}
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <div class="mt-5 text-muted text-center">
                {{__('admin.Back To Login Page')}}, <a href="{{ route('admin.login') }}">{{__('admin.Click Here')}}</a>
            </div>

            <div class="simple-footer">
                {{ $setting->copyright }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@include('admin.footer')


