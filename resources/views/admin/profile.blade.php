@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
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
                    <form method="POST" action="/profile/update">
                        <div class="form-group hidden">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">
                        </div>
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class=""><b>First Name:</b></label>
                            <input type="text" name="first_name" placeholder="Please enter your first name here" class="form-control" value="{{ $user->first_name }}" />
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class=""><b>Last Name:</b></label>
                            <input type="text" name="last_name" placeholder="Please enter your last name here" class="form-control" value="{{ $user->last_name }}" />
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class=""><b>Email:</b></label>
                            <input type="text" name="email" placeholder="Please enter your email here" class="form-control" value="{{ $user->email }}" disabled/>
                        </div>
                        <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class=""><b>Phone Number:</b></label>
                            <input type="text" name="phone_number" placeholder="Please enter your phone number here" class="form-control" value="{{ $user->phone_number }}" />
                        </div>
                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class=""><b>Address:</b></label>
                            <input type="text" name="address" placeholder="Please enter your address here" class="form-control" value="{{ $user->address }}" />
                        </div>
                        <div class="col-md-12 no-margin"><strong>Change Password</strong>
                            <span>(Leave blank if don't wish to change password.)</span>
                        </div>
                        <div class="clearfix "></div>
                        <div class="form-group">
                            <label for="password" >New Password</label>
                            <input type="password" name="password" placeholder="Enter new password" class="form-control" value="" />
                        <div class="form-group">
                            <label for="confirm_password" >Confirm Password</label>
                                <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control" value="" />
                                @if ($errors->has('confirm_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                                 <button type="submit" class="btn btn-primary"> Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
