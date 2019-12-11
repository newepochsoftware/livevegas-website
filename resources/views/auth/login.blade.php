@extends('layouts.start')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="sign-box">
          <header class="sign-title">{{ __('Login') }}</header>
          <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <input placeholder="E-Mail or Phone" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                  </div>
                </div>

                <div class="col-xs-12">
                  <button type="submit" class="btn btn-danger btn-block">
                      {{ __('Sign in') }}
                  </button>
                </div>
                <div class="col-xs-12">
                  @if (Route::has('password.request'))
                      <a class="btn btn-default btn-block" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
                </div>
                <div class="col-xs-12"><p class="sign-note"><a href="{{ route('register') }}">Request Login</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
