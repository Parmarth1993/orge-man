@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
    	 <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
                <div class="panel-heading">Get Quote</div>
                 @if(session()->get('success'))
				    <div class="alert alert-success">
				      {{ session()->get('success') }}  
				    </div><br />
				  @endif
                <div class="panel-body">
                	 {!! Form::open(['url' => '/get-quote/add']) !!}
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
                             <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                 <button type="submit" class="btn btn-primary"> Submit </button>
                            </div>
                        </div>
                      {!! Form::close() !!}
                </div>
            </div>
         </div>       
     </div>
</div>
@endsection