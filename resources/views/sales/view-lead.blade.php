@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
    	 <div class="col-md-8 col-md-offset-2">
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
                  <div class="form-group">
                      <label for="name" class="col-md-4 control-label"><b>Lead Name:</b></label>
                       <div class="col-md-6">
                          {{ $lead->quote_name }}
                       </div>
                  </div><br /><br />
                  
                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Assigned Franchises:</b></label>
                       <div class="col-md-6">
                          {{ $lead->franchises_first_name }} 
                       </div>
                  </div><br /><br />

                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Lead Email:</b></label>
                       <div class="col-md-6">
                          {{ $lead->quote_email }} 
                       </div>
                  </div><br /><br />

                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Lead Phone:</b></label>
                       <div class="col-md-6">
                          {{ $lead->quote_phone_number }} 
                       </div>
                  </div><br /><br />

                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Lead Address:</b></label>
                       <div class="col-md-6">
                          {{ $lead->quote_delivery_address }} 
                       </div>
                  </div><br /><br />

                  <div class="form-group">
                      <label for="franchises" class="col-md-4 control-label"><b>Departure Type:</b></label>
                       <div class="col-md-6">
                          {{ $lead->quote_departure_address }} 
                       </div>
                  </div><br /><br />
                  
                  <div class="form-group">
                      <label for="notes" class="col-md-4 control-label"><b>Additional Notes:</b></label>
                       <div class="col-md-6">
                          {{ $lead->notes }}
                       </div>
                  </div><br /><br />
                  <div class="form-group">
                      <div class="col-md-6">
                          <a href="{{ url('/sales/leads/assigned' ) }}" class="btn btn-default btn-sm">Back</a>
                      </div>
                  </div>
                </div>
            </div>
         </div>       
     </div>
</div>
@endsection