@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
    	 <div class="col-md-12 col-md-offset-0">
           <div class="panel panel-default">
                <div class="panel-heading">Lead: {{ $lead->quote_name }}</div>
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
                <div class="panel-body">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label"><b>Lead Name:</b></label>
                         <div class="col-md-6">
                            {{ $lead->quote_name }}
                         </div>
                    </div><br /><br />
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="franchises" class="col-md-4 control-label"><b>Assigned Franchises:</b></label>
                         <div class="col-md-6">
                            {{ $lead->franchises_first_name }} 
                         </div>
                    </div><br /><br />
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Employee Name:</b></label>
                       <div class="col-md-6">
                          {{ $lead->employees_name }} 
                       </div>
                  </div><br /><br />
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Hours Worked:</b></label>
                       <div class="col-md-6">
                          {{ $lead->hours_worked }} hr
                       </div>
                  </div><br /><br />
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Hourly Wage:</b></label>
                       <div class="col-md-6">
                          {{ $lead->hourly_wage }} 
                       </div>
                  </div><br /><br />
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Invoice Image:</b></label>
                       <div class="col-md-6">
                         <img src="/uploads/franchise/{{ $lead->invoice_image }}" height="100" width="100" class="invoice_image" />
                       </div>
                  </div><br /><br />
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Job Image:</b></label>
                       <div class="col-md-6">
                          <img src="/uploads/franchise/{{ $lead->job_images }}" height="100" width="100" class="job_image" />
                       </div>
                  </div><br /><br />
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Paid Amount:</b></label>
                       <div class="col-md-6">
                          ${{ $lead->paid_amount }} 
                       </div>
                  </div><br /><br />
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="supplies" class="col-md-4 control-label"><b>Supplies:</b></label>
                       <div class="col-md-6">
                         <?php
                        $leaddata = json_decode($lead->supplies, true);  
                        $counter = 0;
                         foreach ($leaddata as $key => $value) {
                          ?>
                          <span><?php echo $key.": ".$value[$counter];?></span>
                          <?php
                           # code...
                         // $counter++;
                         }
                         ?> 
                       </div>
                  </div><br /><br />
                </div>
                <div class="col-md-6">  
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Lead Email:</b></label>
                       <div class="col-md-6">
                          {{ $lead->quote_email }} 
                       </div>
                  </div><br /><br />
                </div>
                <div class="col-md-6">  
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Lead Phone:</b></label>
                       <div class="col-md-6">
                          {{ $lead->quote_phone_number }} 
                       </div>
                  </div><br /><br />
                 </div>
                 <div class="col-md-6"> 
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Lead Address:</b></label>
                       <div class="col-md-6">
                          {{ $lead->quote_delivery_address }} 
                       </div>
                  </div><br /><br />
                 </div>
                 <div class="col-md-6"> 
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Departure Type:</b></label>
                       <div class="col-md-6">
                          {{ $lead->quote_departure_address }} 
                       </div>
                  </div><br /><br />
                 </div> 
                 <div class="col-md-6"> 
                  <div class="form-group">
                      <label for="job_notes" class="col-md-4 control-label"><b>Job Notes:</b></label>
                       <div class="col-md-6">
                          {{ $lead->job_notes }}
                       </div>
                  </div><br /><br />
                </div>
                <div class="col-md-6"> 
                  <div class="form-group">
                      <div class="col-md-6">
                          <a href="{{ url('/franchises/leads/completed' ) }}" class="btn btn-default btn-sm">Back</a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
         </div>       
     </div>
</div>
@endsection