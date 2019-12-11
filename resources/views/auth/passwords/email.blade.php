@extends('layouts.start')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="sign-box">
        <header class="sign-title">{{ __('Reset Password') }}</header>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <input placeholder="E-Mail Address" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-danger btn-block">
                                {{ __('Send Password Reset Link') }}
                            </button>

                            <div class="col-xs-12"><p class="sign-note"><a href="{{ route('login') }}">Back</a></p>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
