@extends('admin.layouts.app', ['page' => ''])

@section('title', 'Profile')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Profile</h3>
            </div>

            <form method="post">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            id="name"
                            placeholder="Name"
                            value="{{ $admin->name }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email"
                            name="email"
                            class="form-control"
                            id="email"
                            placeholder="Email address"
                            value="{{ $admin->email }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"
                            name="username"
                            class="form-control"
                            id="username"
                            placeholder="Username"
                            value="{{ $admin->username }}"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Password update --}}
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Change Password</h3>
            </div>

            <form method="post" action="{{ route('admin.password_update') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password"
                            name="current_password"
                            class="form-control"
                            id="current-password"
                            placeholder="Current Password"
                            pattern=".{6,}"
                            title="6 characters minimum"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password"
                            name="password"
                            class="form-control"
                            id="password"
                            placeholder="New Password"
                            pattern=".{6,}"
                            title="6 characters minimum"
                        >
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password"
                            name="password_confirmation"
                            class="form-control"
                            id="confirm-password"
                            placeholder="Confirm Password"
                            pattern=".{6,}"
                            title="6 characters minimum"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection