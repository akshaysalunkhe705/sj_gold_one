@extends('layouts.admin_layout',[
'title'=>"User",
'heading'=>$form_type.' User',
'breadcrumb1'=>"User",
'breadcrumb2'=>"$form_type",
'nav_status'=>'user',
'sub_nav_status'=>'user-form'
])


@section('main_container')
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif

    @if (!empty($errors->all()))
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif


    <form action="{{ url('user/create') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" placeholder="First Name"
                    value="{{ old('first_name') }}">
            </div>
            <div class="col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                    value="{{ old('last_name') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="email_address">Email Address</label>
                <input type="email" name="email_address" class="form-control" placeholder="Email Address"
                    value="{{ old('email_address') }}">
            </div>
            <div class="col-md-6">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password"
                    value="{{ old('password') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="primary_phone_number">Primary Phone Number</label>
                <input type="text" name="primary_phone_number" class="form-control" placeholder="Primary Phone Number"
                    value="{{ old('primary_phone_number') }}">
            </div>
            <div class="col-md-6">
                <label for="secondary_phone_number">Secondary Phone Number</label>
                <input type="text" name="secondary_phone_number" class="form-control" placeholder="Secondary Phone Number"
                    value="{{ old('secondary_phone_number') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="state">State</label>
                <input type="text" name="state" class="form-control" placeholder="State"
                    value="{{ old('state') }}">
            </div>
            <div class="col-md-6">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" placeholder="City"
                    value="{{ old('city') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="area">Area</label>
                <input type="text" name="area" class="form-control" placeholder="Area"
                    value="{{ old('area') }}">
            </div>
            <div class="col-md-6">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address"
                    value="{{ old('address') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="pincode">Pincode</label>
                <input type="number" name="pincode" class="form-control" placeholder="Pincode"
                    value="{{ old('pincode') }}">
            </div>
       </div>
       
       
        <br>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection
