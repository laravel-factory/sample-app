@extends('admin.layouts.guest')

@section('title', 'Login')

@section('content')
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
        @csrf

        <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="fa fa-lock form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>

            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
        </div>
    </form>

    <a href="{{ route('admin.forgot_password') }}">
        I forgot my password
    </a>
@endsection
