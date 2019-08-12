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
                        </div><br />
                        <div class="form-group">
                            <label for="hours_worked" class="col-md-4 control-label"><b>Hours Worked:</b></label>
                             <div class="col-md-6">
                                <span>{{ $quote->hours_worked }}</span>
                             </div>
                        </div><br />
                        <div class="form-group">
                            <label for="hourly_wage" class="col-md-4 control-label"><b>Hourly Wages:</b></label>
                             <div class="col-md-6">
                                <span>{{ $quote->hourly_wage }}</span>
                             </div>
                        </div><br />
                        <div class="form-group">
                            <label for="paid_amount" class="col-md-4 control-label"><b>Customer Paid Amount:</b></label>
                             <div class="col-md-6">
                                <span>{{ $quote->paid_amount }}</span>
                             </div>
                        </div><br />
                        <div class="form-group">
                            <label for="invoice_image" class="col-md-4 control-label"><b>Invoice Image:</b></label>
                             <div class="col-md-6">
                                <img src="/uploads/franchise/{{ $quote->invoice_image }}" width="100" onerror="this.src = ''; this.src = 'https://via.placeholder.com/100.png?text=No%20Image'">
                             </div>
                        </div><br />
                        <div class="form-group">
                            <label for="job_images" class="col-md-4 control-label"><b>Job Image:</b></label>
                             <div class="col-md-6">
                                <img src="/uploads/franchise/{{ $quote->job_images }}" width="100" onerror="this.src = ''; this.src = 'https://via.placeholder.com/100.png?text=No%20Image'">
                             </div>
                        </div><br />
                        <div class="form-group">
                            <label for="job_notes" class="col-md-4 control-label"><b>Notes:</b></label>
                             <div class="col-md-6">
                                <span>{{ $quote->job_notes }}</span>
                             </div>
                        </div><br />
                        <div class="col-md-12 no-margin">
                          <label for="supplies_sold" >Supplies Sold</label>
                        </div>
                        <div class="col-md-12 supplies-sold" >
                            @foreach($supplies as $key => $supply)
                              <div class="form-group">  
                                    <label for="Name" class="col-md-4 control-label"><b>Name:</b></label>
                                    <div class="col-md-6">
                                        <span>{{ $supplies[$key]['name'] }}</span>
                                    </div> 
                              </div><br />
                              <div class="form-group">  
                                    <label for="Quantity" class="col-md-4 control-label"><b>Quantity:</b></label>
                                    <div class="col-md-6">
                                        <span>{{ $supplies[$key]['quantity'] }}</span>
                                    </div> 
                              </div><br />
                              <div class="form-group">  
                                    <label for="Price" class="col-md-4 control-label"><b>Price:</b></label>
                                    <div class="col-md-6">
                                        <span>{{ $supplies[$key]['price'] }}</span>
                                    </div> 
                              </div><br /><br />
                            @endforeach
                        </div>

                                                
                         <div class="form-group">
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