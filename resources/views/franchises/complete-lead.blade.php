@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
    	 <div class="col-md-12 ">
           <div class="panel panel-default">
                <div class="panel-heading">Complete Order for #{{ $lead->lead_id }} {{ $lead->quote_name }}</div>
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
                	 {!! Form::open(['url' => 'franchises/lead/complete/'. $lead->lead_id, 'files'=>'true']) !!}
                	 	{{ csrf_field() }}   
                    <div class="col-md-12 "> 
                      <div class="col-md-4 ">                     
                        <div class="form-group">
                            <label for="employees_name" class="control-label"><b>Employees Name:</b></label>
                            <input type="text" name="employees_name" class="form-control" placeholder="Employees Name" required />
                            @if ($errors->has('employees_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('employees_name') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-md-4 ">
                        <div class="form-group">
                            <label for="hours_worked" class="control-label"><b>Hours Worked:</b></label>
                            <input type="text" name="hours_worked" class="form-control" placeholder="Hours Worked" required />
                            @if ($errors->has('hours_worked'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hours_worked') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-md-4 ">
                        <div class="form-group">
                            <label for="hourly_wage" class="control-label"><b>Hourly Wage:</b></label>
                            <input type="text" name="hourly_wage" class="form-control" placeholder="Hourly Wage" required/>
                            @if ($errors->has('hourly_wage'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hourly_wage') }}</strong>
                                </span>
                            @endif
                        </div> 
                      </div>
                    </div>

                    <div class="col-md-12 ">
                      <div class="col-md-4 "> 
                        <div class="form-group">
                            <label for="paid_amount" class="control-label"><b>Amount Customer Paid:</b></label>
                            <input type="text" name="paid_amount" class="form-control" placeholder="Amount Customer Paid" required />
                            @if ($errors->has('paid_amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('paid_amount') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-md-4 "> 
                        <div class="form-group">
                            <label for="invoice_image" class="control-label"><b>Upload Image Of Invoice:</b></label>
                            <input type="file" name="invoice_image" class="form-control" placeholder="Upload Image Of Invoice" />
                            @if ($errors->has('invoice_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('invoice_image') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-md-4 "> 
                        <div class="form-group">
                            <label for="job_images" class="control-label"><b>Upload Job Image:</b></label>
                            <input type="file" name="job_images" class="form-control" placeholder="Upload Job Image" multiple/>
                            @if ($errors->has('job_images'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('job_images') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 "> 
                        <div class="form-group col-md-12">
                            <label for="job_notes" class="control-label"><b>Additional Job Notes:</b></label>
                            <textarea name="job_notes" class="form-control" placeholder="Additional Job Notes" /></textarea>
                            @if ($errors->has('job_notes'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('job_notes') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 "> 
                      <div class="col-md-4 "> 
                        <div class="form-group">
                            <label for="supplies_sold" class="control-label"><b>Supplies Sold:</b></label>
                            <select  name="supplies[sold][]" class="form-control" required/>
                              <option value="">Choose from the supplies below</option>
                              <option value="supply">Test Supply</option>
                            </select>
                            @if ($errors->has('supplies_sold'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('supplies_sold') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-md-3 "> 
                        <div class="form-group">
                            <label for="quantity" class="control-label"><br></label>
                            <br>
                            <input type="text" name="supplies[quantity][]" class="form-control" placeholder="Quantity" required />
                            @if ($errors->has('quantity'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-md-3 "> 
                        <div class="form-group">
                            <label for="price" class="control-label"><br></label>
                            <br>
                            <input type="text" name="supplies[price][]" class="form-control" placeholder="Price" required />
                            @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="col-md-2 "> 
                        <div class="form-group">
                            <label for="price" class="control-label"><br></label>
                            <br>
                            <button class="btn btn-primary" />Add More Supplies</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="col-md-4 ">
                        <div class="form-group ">
                          <input type="hidden" name="lead_id" required value="{{ $lead->lead_id }}" readonly />
                          <input type="hidden" name="franchises" required value="{{ $user->id }}" readonly />
                          <button type="submit" class="btn btn-primary"> Submit </button>
                        </div>
                      </div>
                    </div>
                      {!! Form::close() !!}
                </div>
            </div>
         </div>       
     </div>
</div>
@endsection