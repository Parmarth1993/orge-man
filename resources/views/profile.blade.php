@extends('layouts.app')

@section('content')
<h2>Update Profile</h2>
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div>
@endif
@if(session()->get('error'))
  <div class="alert alert-danger">
    {{ session()->get('error') }}  
  </div>
@endif
<div class="sales_input-details">
    {!! Form::open(['url' => '/profile/update', 'class' => 'sales-dashbard-form']) !!}
        {{ csrf_field() }}   
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-grouph">
            <label for="first_name" >First Name</label>
            <input type="text" name="first_name" placeholder="Please enter your first name here" class="form-control" value="{{ $user->first_name }}" />
        </div>
        <div class="form-grouph">
            <label for="last_name" >Last Name</label>
            <input type="text" name="last_name" placeholder="Please enter your last name here" class="form-control" value="{{ $user->last_name }}" />

        </div>
        <div class="form-grouph">
            <label for="email" >Email</label>
            <input type="text" name="email" placeholder="Please enter your email here" class="form-control" value="{{ $user->email }}" disabled/>
        </div>
        <div class="form-grouph">
            <label for="phone_number" >Phone Number</label>
            <input type="text" name="phone_number" placeholder="Please enter your phone number here" class="form-control" value="{{ $user->phone_number }}" />
        </div>
        <div class="form-grouph">
            <label for="address" >Address</label>
            <input type="text" name="address" placeholder="Please enter your address here" class="form-control" value="{{ $user->address }}" />
        </div>
        <div class="form-grouph"></div>
        <div class="col-md-12 no-margin"><strong>Change Password</strong>
            <span>(Leave blank if don't wish to change password.)</span>
        </div>
        <div class="form-grouph">
            <label for="password" >New Password</label>
                <input type="password" name="password" placeholder="Enter new password" class="form-control" value="" />
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="confirm_password" >Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control" value="" />
                @if ($errors->has('confirm_password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('confirm_password') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph"></div>
        <div class="input-sales-submit-btn">
         <input type="submit" value="Submit">
        </div>
    {!! Form::close() !!}
</div>
@endsection
