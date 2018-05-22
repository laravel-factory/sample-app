@extends('admin.layouts.guest')

@section('title', 'Reset Password')

@section('content')
    <p class="login-box-msg">Please specify new credentials</p>

    <form method="post" action="{{ route('admin.reset_password') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group has-feedback">
            <input type="email"
                name="email"
                class="form-control"
                value="{{ $email or old('email') }}"
                placeholder="Email address"
                required
                autofocus
            >
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
    </form>
@endsection
