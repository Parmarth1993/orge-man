@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
    	 <div class="col-md-9 col-md-offset-2">
           <div class="panel panel-default">
                <div class="panel-heading">New Lead Entry</div>
                 @if(session()->get('success'))
				    <div class="alert alert-success">
				      {{ session()->get('success') }}  
				    </div><br />
				  @endif
                <div class="panel-body">
                	 {!! Form::open(['url' => '/sales/lead/assignnewlead']) !!}
                	 	{{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"><b>Name:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="name" placeholder="Please enter your name" class="form-control" required value="" />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label"><b>Email:</b></label>
                             <div class="col-md-6">
                                <input type="email" name="email" placeholder="Please enter your email" class="form-control" required value="" />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="phone_number" class="col-md-4 control-label"><b>Phone:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="phone_number" placeholder="Please enter your phone number" class="form-control" required value="" />
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="date_of_job" class="col-md-4 control-label"><b>Date of Job:</b></label>
                             <div class="col-md-6">
                                <input type="date" name="date_of_job" class="form-control" required value="" />
                                @if ($errors->has('date_of_job'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_job') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label"><b>Delivery Address:</b></label>
                             <div class="col-md-6">
                                <textarea  class="form-control"  name="delivery_address" placeholder="Please enter your address" required></textarea>
                                @if ($errors->has('delivery_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('delivery_address') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br /><br />

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label"><b>Departure Address:</b></label>
                             <div class="col-md-6">
                             	 <input type="radio" name="departure_address" value="Residential" checked> Residential &nbsp;&nbsp; 
								 <input type="radio" name="departure_address" value="Commercial"> Commercial &nbsp;&nbsp;
								 <input type="radio" name="departure_address" value="Junk Removal"> Junk Removal 
								 <input type="radio" name="departure_address" value="Furniture Delivery"> Furniture Delivery &nbsp;&nbsp;
								 <input type="radio" name="departure_address" value="Labor Services"> Labor Services &nbsp;&nbsp;
								 <input type="radio" name="departure_address" value="Pack & Load Service"> Pack & Load Service &nbsp;&nbsp;
                             </div>
                        </div><br /><br /><br />
                        <div class="form-group">
                            <label for="service_needed" class="col-md-4 control-label"><b>Service Needed:</b></label>
                             <div class="col-md-6">
                                 <select name="service_needed" class="form-control" required  />
                                    <option value="choose_all_that_apply">CHOOSE ALL THAT APPLY</option>
                                </select>
                                @if ($errors->has('service_needed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('service_needed') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label"><b>Select Location:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="location" placeholder="Please select location" class="form-control" required value="" />
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="estimate" class="col-md-4 control-label"><b>Estimate Needed:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="estimate" placeholder="Please select estimate" class="form-control" required value="" />
                                @if ($errors->has('estimate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('estimate') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="additional_details" class="col-md-4 control-label"><b>Additional Details:</b></label>
                             <div class="col-md-6">
                                <textarea  class="form-control"  name="additional_details" placeholder="Please enter your additional details" required></textarea>
                                @if ($errors->has('additional_details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('additional_details') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br /><br />

                         <div class="form-group">
                         	<div class="col-md-8">
                         		<label for="franchises" class="col-md-4 control-label"><b>Choose Franchises:</b></label>
                         		<div class="col-md-6">
	                                <select name="franchises" class="form-control" required  />
	                                    <option value="">Choose Franchises</option>
	                                    @foreach($franchises as $franchise)
	                                        <option value="{{ $franchise->id }}">{{ $franchise->first_name }} {{ $franchise->last_name }}</option>
	                                    @endforeach
	                                </select>
                            	</div>	
                                 @if ($errors->has('franchises'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('franchises') }}</strong>
                                    </span>
                                @endif
                             </div>
                            <div class="col-md-4">
                                 <button type="submit" class="btn btn-primary pull-left"> Submit </button>
                            </div>
                        </div>
                      {!! Form::close() !!}
                </div>
            </div>
         </div>       
     </div>
</div>
@endsection