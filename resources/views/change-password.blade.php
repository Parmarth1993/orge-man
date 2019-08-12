@extends('layouts.app')

@section('content')
<div class="sales_input-details">
    <h2>Change Password</h2>
     @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div><br />
    @endif
    @if(session()->get('error'))
        <div class="alert alert-danger">
          {{ session()->get('error') }}  
        </div><br />
    @endif
    {!! Form::open(['url' => '/change-password', 'class' => 'sales-dashbard-form']) !!}
        {{ csrf_field() }}
        <div class="form-grouph col-md-6">
            <label for="password" >New Password</label>
                <input type="password" name="password" placeholder="Enter new password" class="form-control" required value="" />
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph col-md-6">
            <label for="confirm_password" >Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control" required value="" />
                @if ($errors->has('confirm_password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('confirm_password') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph select-submit col-md-12">
            <div class="input-sales-submit-btn">
             <input type="submit" value="Submit">
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection