@extends('admin.layouts.app', ['page' => 'customer'])

@section('title', 'Add New Customer')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Customer</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.customers.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text"
                            class="form-control"
                            name="first_name"
                            required
                            placeholder="First Name"
                            value="{{ old('first_name') }}"
                            id="first_name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text"
                            class="form-control"
                            name="last_name"
                            required
                            placeholder="Last Name"
                            value="{{ old('last_name') }}"
                            id="last_name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"
                            class="form-control"
                            name="email"
                            required
                            placeholder="Email"
                            value="{{ old('email') }}"
                            id="email"
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text"
                            class="form-control"
                            name="phone_number"
                            required
                            placeholder="Phone Number"
                            value="{{ old('phone_number') }}"
                            id="phone_number"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                            class="form-control"
                            name="password"
                            required
                            placeholder="Password"
                            id="password"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password"
                            class="form-control"
                            name="password_confirmation"
                            required
                            placeholder="Password"
                            id="password-confirmation"
                        >
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.customers.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
