@extends('layouts.app')

@section('content')
<div class="sales_input-details">
    <h2>Contact Us</h2>
      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div><br />
      @endif
    {!! Form::open(['url' => '/contact/send', 'class' => 'sales-dashbard-form']) !!}
        {{ csrf_field() }}
        <div class="form-grouph">
            <label for="name" >First Name</label>
                <input type="text" name="first_name" placeholder="Please enter your first name" class="form-control" required value="" />
                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="name" >Last Name</label>
                <input type="text" name="last_name" placeholder="Please enter your first name" class="form-control" required value="" />
                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="phone_number" >Phone</label>
                <input type="text" name="phone_number" placeholder="Please enter your phone number" class="form-control" required value="" />
                @if ($errors->has('phone_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="email" >Email</label>
                <input type="email" name="email" placeholder="Please enter your email" class="form-control" required value="" />
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="address" >Address</label>
                 <input type="text" name="address" placeholder="Enter Address">
        </div>
        <div class="form-grouph select-submit">
            <div class="input-sales-submit-btn">
             <input type="submit" value="Submit">
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection
