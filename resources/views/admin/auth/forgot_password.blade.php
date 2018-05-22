@extends('admin.layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <p class="login-box-msg">Please specify your email address</p>

    <form method="post">
        @csrf

        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
        </div>
    </form>

    <a href="{{ route('admin.login') }}">
        Login
    </a>
@endsection
