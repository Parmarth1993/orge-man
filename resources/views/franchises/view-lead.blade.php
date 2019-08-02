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
    <h2>Completed Order #{{ $lead->lead_id }} {{ $lead->quote_name }}</h2>
       {!! Form::open(['url' => 'franchises/lead/complete/'. $lead->lead_id, 'files'=>'true', 'class' => 'sales-dashbard-form']) !!}
        <div class="form-grouph">
            <label for="employees_name" >Employees Name</label>
            <span>{{ $lead->employees_name }}</span>
        </div>
        <div class="form-grouph">
            <label for="hours_worked" >Hours Worked</label>
            <span>{{ $lead->hours_worked }}</span>
        </div>
        <div class="form-grouph">
            <label for="hourly_wage" >Hourly Wage</label>
            <span>{{ $lead->hourly_wage }}</span>
        </div>

        <div class="form-grouph">
            <label for="paid_amount" >Amount Customer Paid</label>
            <span>{{ $lead->paid_amount }}</span>
        </div>
        <div class="form-grouph">
            <label for="invoice_image" >Upload Image Of Invoice</label>
            <span>
              <img src="/uploads/franchise/{{ $lead->invoice_image }}" height="100" width="100" class="invoice_image" />
            </span>
        </div> 
        <div class="form-grouph">
            <label for="job_images" >Upload Job Image</label>
            <span>
              <img src="/uploads/franchise/{{ $lead->job_images }}" height="100" width="100" class="job_image" />
            </span>
        </div>
        <div class="form-grouph">
            <label for="supplies_sold" >Supplies Sold</label>
            <?php
              $leaddata = json_decode($lead->supplies, true);  
              for ($i = 0; $i < sizeof($leaddata['sold']); $i++) { ?>
                <span>Supply: <?php echo $leaddata['sold'][$i];?></span>
                <span>Quantity: <?php echo $leaddata['quantity'][$i];?></span>
                <span>Price: <?php echo $leaddata['price'][$i];?></span>
              <?php } ?> 
        </div>
        <div class="form-grouph textarea">
          <label for="job_notes" >Additional Job Notes</label>
          <span>{{ $lead->job_notes }}</span>
        </div>
        <div class="body_wrapper-btns">
          <a href="javascript:void(0);" onclick="return window.history.back();" role="button">Back</a>
       </div>
      {!! Form::close() !!}
</div>
@endsection