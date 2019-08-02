@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">  
    	 <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
                <div class="panel-heading">Update {{ $franchises->first_name }}</div>
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
                	 {!! Form::open(['url' => '/admin/franchises/edit/'. $franchises->id,'files'=>'true']) !!}
                	 	{{ csrf_field() }}
                        <div class="form-group">
                            <label for="first_name" class="col-md-4 control-label"><b>First Name:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="first_name" placeholder="First name" class="form-control" required value="{{ $franchises->first_name }}" />
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br /><br />
                        <div class="form-group">
                            <label for="last_name" class="col-md-4 control-label"><b>Last Name:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="last_name" placeholder="Last name" class="form-control" required value="{{ $franchises->last_name }}" />
                                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label"><b>Email:</b></label>
                             <div class="col-md-6">
                                <input type="email" name="email" placeholder="Email" class="form-control" required value="{{ $franchises->email }}" readonly />
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label"><b>User Name:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="user_name" placeholder="User Name" class="form-control" required value="{{ $franchises->user_name }}" readonly />
                                @if ($errors->has('user_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="phone_number" class="col-md-4 control-label"><b>Phone:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="phone_number" placeholder="Phone number" class="form-control" required value="{{ $franchises->phone_number }}" />
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label"><b>Location:</b></label>
                             <div class="col-md-6">
                                <textarea  class="form-control"  name="address" placeholder="Address"  required>{{ $franchises->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br /><br />

                        <div class="form-group">
                            <label for="logo" class="col-md-4 control-label"><b>Logo:</b></label>
                             <div class="col-md-6">
                                 <img src="/uploads/franchise/{{ $franchises->logo }}" height="50" width="50" class="profile_image" />
                                 <input type="file" name="logo" >
                                 <input type="hidden" name="oldimage" value="{{  $franchises->logo }}">
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