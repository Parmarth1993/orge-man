@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">  
         <div class="col-md-6 col-md-offset-1">
           <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                 @if(session()->get('success'))
                    <div class="alert alert-success">
                      {{ session()->get('success') }}  
                    </div>
                  @endif
                  @if(session()->get('error'))
                    <div class="alert alert-danger">
                      {{ session()->get('error') }}  
                    </div>
                  @endif
                <div class="panel-body">
                    {!! Form::open(['url' => '/change-password', 'class' => 'sales-dashbard-form']) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="password" >New Password</label>
                                <input type="password" name="password" placeholder="Enter new password" class="form-control" required value="" />
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" >Confirm Password</label>
                                <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control" required value="" />
                                @if ($errors->has('confirm_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </div>
         </div>       
     </div>
</div>
@endsection