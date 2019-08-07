@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">  
    	 <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
                <div class="panel-heading">View Completed Order # {{ $quote->lead_id }}</div>
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
                            <label for="first_name" class="col-md-4 control-label"><b>Employee Name:</b></label>
                             <div class="col-md-6">
                                <span>{{ $quote->employees_name }}</span>
                             </div>
                        </div><br /><br /><br />
                        <div class="form-group">
                            <label for="hours_worked" class="col-md-4 control-label"><b>Hours Worked:</b></label>
                             <div class="col-md-6">
                                <span>{{ $quote->hours_worked }}</span>
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="hourly_wage" class="col-md-4 control-label"><b>Hourly Wages:</b></label>
                             <div class="col-md-6">
                                <span>{{ $quote->hourly_wage }}</span>
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="paid_amount" class="col-md-4 control-label"><b>Customer Paid Amount:</b></label>
                             <div class="col-md-6">
                                <span>{{ $quote->paid_amount }}</span>
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="invoice_image" class="col-md-4 control-label"><b>Invoice Image:</b></label>
                             <div class="col-md-6">
                                <img src="/uploads/franchise/{{ $quote->invoice_image }}" width="150">
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="job_images" class="col-md-4 control-label"><b>Job Image:</b></label>
                             <div class="col-md-6">
                                <img src="/uploads/franchise/{{ $quote->job_images }}" width="150">
                             </div>
                        </div><br /><br />

                        <div class="form-group">
                            <label for="paid_amount" class="col-md-4 control-label"><b>Supplies:</b></label>
                             <div class="col-md-6">
                                @for($i = 0; $i < sizeOf($supplies['sold']); $i++)
                                    Sold: {{ $supplies['sold'][$i]  }}<br>
                                    Quantity: {{ $supplies['quantity'][$i]  }}<br>
                                    Price: {{ $supplies['price'][$i]  }}<br>
                                @endfor
                             </div>
                        </div><br /><br />

                        <div class="form-group">
                            <label for="job_notes" class="col-md-4 control-label"><b>Notes:</b></label>
                             <div class="col-md-6">
                                <span>{{ $quote->job_notes }}</span>
                             </div>
                        </div><br /><br />
                        
                        
                         <div class="form-group">
                             <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                 <a type="submit" href="javascript:void(0);"  onclick="return window.history.back();" class="btn btn-primary"> Back </a>
                            </div>
                        </div>
                </div>
            </div>
         </div>       
     </div>
</div>
@endsection