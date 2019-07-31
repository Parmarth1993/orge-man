@extends('layouts.app')

@section('content')
<h2>Franchisee Dashboard</h2>
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
<div class="sales_input-details">
    <h2>Complete Order #{{ $lead->lead_id }} {{ $lead->quote_name }}</h2>
    	 {!! Form::open(['url' => 'franchises/lead/complete/'. $lead->lead_id, 'files'=>'true', 'class' => 'sales-dashbard-form']) !!}
    	 	{{ csrf_field() }}   
        <div class="form-grouph">
            <label for="employees_name" >Employees Name</label>
            <input type="text" name="employees_name" class="form-control" placeholder="Employees Name" required />
            @if ($errors->has('employees_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('employees_name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-grouph">
            <label for="hours_worked" >Hours Worked</label>
            <input type="text" name="hours_worked" class="form-control" placeholder="Hours Worked" required />
            @if ($errors->has('hours_worked'))
                <span class="help-block">
                    <strong>{{ $errors->first('hours_worked') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-grouph">
            <label for="hourly_wage" >Hourly Wage</label>
            <input type="text" name="hourly_wage" class="form-control" placeholder="Hourly Wage" required/>
            @if ($errors->has('hourly_wage'))
                <span class="help-block">
                    <strong>{{ $errors->first('hourly_wage') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-grouph">
            <label for="paid_amount" >Amount Customer Paid</label>
            <input type="text" name="paid_amount" class="form-control" placeholder="Amount Customer Paid" required />
            @if ($errors->has('paid_amount'))
                <span class="help-block">
                    <strong>{{ $errors->first('paid_amount') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-grouph">
            <label for="invoice_image" >Upload Image Of Invoice</label>
            <input type="file" name="invoice_image" class="form-control" placeholder="Upload Image Of Invoice" />
            @if ($errors->has('invoice_image'))
                <span class="help-block">
                    <strong>{{ $errors->first('invoice_image') }}</strong>
                </span>
            @endif
        </div> 
        <div class="form-grouph">
            <label for="job_images" >Upload Job Image</label>
            <input type="file" name="job_images" class="form-control" placeholder="Upload Job Image" multiple/>
            @if ($errors->has('job_images'))
                <span class="help-block">
                    <strong>{{ $errors->first('job_images') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-grouph">
            <label for="supplies_sold" >Supplies Sold</label>
            <select  name="supplies[sold][]" class="input-sales-select" required/>
              <option value="">Choose from the supplies below</option>
              <option value="supply">Test Supply</option>
            </select>
            @if ($errors->has('supplies_sold'))
                <span class="help-block">
                    <strong>{{ $errors->first('supplies_sold') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-grouph">
            <label for="quantity" class="control-label"><br></label>
            <!-- <br> -->
            <input type="text" name="supplies[quantity][]" class="form-control" placeholder="Quantity" required />
            @if ($errors->has('quantity'))
                <span class="help-block">
                    <strong>{{ $errors->first('quantity') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-grouph">
            <label for="price" class="control-label"><br></label>
            <!-- <br> -->
            <input type="text" name="supplies[price][]" class="form-control" placeholder="Price" required />
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <!-- <div class="form-grouph">
            <label for="price" class="control-label"><br></label>
            <br>
            <button class="btn btn-primary" />Add More Supplies</button>
        </div> -->
        <div class="form-grouph textarea">
          <label for="job_notes" >Additional Job Notes</label>
          <textarea name="job_notes" class="form-control" placeholder="Additional Job Notes" /></textarea>
          @if ($errors->has('job_notes'))
              <span class="help-block">
                  <strong>{{ $errors->first('job_notes') }}</strong>
              </span>
          @endif
        </div>
        <div class="input-sales-submit-btn">
          <input type="hidden" name="lead_id" required value="{{ $lead->lead_id }}" readonly />
          <input type="hidden" name="franchises" required value="{{ $user->id }}" readonly />
         <input type="submit" value="Submit">
         <button class="btn btn-primary" />Add More Supplies</button>
        </div>
      {!! Form::close() !!}
</div>
@endsection