@extends('layouts.app')

@section('content')
<h2>Sales Dashboard</h2>
<div class="sales_input-details">
    <h2>New Client Entry</h2>
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
    {!! Form::open(['url' => '/sales/lead/assignnewlead', 'class' => 'sales-dashbard-form']) !!}
        {{ csrf_field() }}
        <div class="form-grouph">
            <label for="name" >Name</label>
                <input type="text" name="name" placeholder="Please enter your name" class="form-control" required value="" />
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
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
            <label for="phone_number" >Phone</label>
                <input type="text" name="phone_number" placeholder="Please enter your phone number" class="form-control" required value="" />
                @if ($errors->has('phone_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="alternate_phone" >Alternate Phone</label>
                <input type="text" name="alternate_phone" placeholder="Please enter your phone number" class="form-control" required value="" />
                @if ($errors->has('alternate_phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('alternate_phone') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="date_of_job" >Date of Job</label>
                <input type="date" name="date_of_job" class="form-control" required value="" />
                @if ($errors->has('date_of_job'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date_of_job') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="address" >Departure Address</label>
                 <input type="text" name="departure_address" placeholder="Departure Address">
        </div>
        <div class="form-grouph">
            <label for="address" >Delivery Address</label>
                <input type="text"  class="form-control"  name="delivery_address" placeholder="Please enter your address" required>
                @if ($errors->has('delivery_address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('delivery_address') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="service_needed" >Service Needed</label>
                 <select name="service_needed" class="form-control" required  multiple />
                    <option value="Residential">Residential</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Junk Removal">Junk Removal</option>
                    <option value="Furniture Delivery">Furniture Delivery</option>
                    <option value="Labor Services">Labor Services</option>
                    <option value="Labor Services">Pack & Load Service</option>
                    <option value="Labor Services">Packing Supplies</option>
                    <option value="Labor Services">Storage Services</option>
                </select>
                @if ($errors->has('service_needed'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_needed') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="location" >Select Location</label>
                <input type="text" name="location" placeholder="Please select location" class="form-control" required value="" />
                @if ($errors->has('location'))
                    <span class="help-block">
                        <strong>{{ $errors->first('location') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph">
            <label for="estimate" >Estimate Needed</label>
                <input type="text" name="estimate" placeholder="Please select estimate" class="form-control" required value="" />
                @if ($errors->has('estimate'))
                    <span class="help-block">
                        <strong>{{ $errors->first('estimate') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-grouph textarea">
            <label for="additional_details" >Additional Details</label>
                <textarea  class="form-control"  name="additional_details" placeholder="Please enter your additional details" required></textarea>
                @if ($errors->has('additional_details'))
                    <span class="help-block">
                        <strong>{{ $errors->first('additional_details') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-grouph select-submit">
            <select name="franchises" class="input-sales-select" required  />
                <option value="">SELECT FRANCHISEE TO SEND ENTRY</option>
                @foreach($franchises as $franchise)
                    <option value="{{ $franchise->id }}">{{ $franchise->first_name }} {{ $franchise->last_name }}</option>
                @endforeach
            </select>
             @if ($errors->has('franchises'))
                <span class="help-block">
                    <strong>{{ $errors->first('franchises') }}</strong>
                </span>
            @endif
            <div class="input-sales-submit-btn">
             <input type="submit" value="Submit">
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection