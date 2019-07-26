@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                    <form method="POST" action="/profile/update">
                        <div class="form-group hidden">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">
                        </div>
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label"><b>First Name:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="first_name" placeholder="Please enter your first name here" class="form-control" value="{{ $user->first_name }}" />
                             </div>
                            <?php if ($errors->has('first_name')) :?>
                                <span class="help-block">
                                    <strong>{{$errors->first('first_name')}}</strong>
                                </span>
                                <?php endif;?>

                        </div><br /><br />
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label"><b>Last Name:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="last_name" placeholder="Please enter your last name here" class="form-control" value="{{ $user->last_name }}" />
                             </div>
                            <?php if ($errors->has('last_name')) :?>
                                <span class="help-block">
                                    <strong>{{$errors->first('last_name')}}</strong>
                                </span>
                                <?php endif;?>

                        </div><br /><br />
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"><b>Email:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="email" placeholder="Please enter your email here" class="form-control" value="{{ $user->email }}" disabled/>
                            </div>
                            <?php if ($errors->has('email')) :?>
                                <span class="help-block">
                                    <strong>{{$errors->first('email')}}</strong>
                                </span>
                                <?php endif;?>

                        </div><br /><br />
                        <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class="col-md-4 control-label"><b>Phone Number:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="phone_number" placeholder="Please enter your phone number here" class="form-control" value="{{ $user->phone_number }}" />
                            </div>
                            <?php if ($errors->has('phone_number')) :?>
                                <span class="help-block">
                                    <strong>{{$errors->first('phone_number')}}</strong>
                                </span>
                                <?php endif;?>

                        </div><br /><br />
                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label"><b>Address:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="address" placeholder="Please enter your address here" class="form-control" value="{{ $user->address }}" />
                            </div>
                            <?php if ($errors->has('address')) :?>
                                <span class="help-block">
                                    <strong>{{$errors->first('address')}}</strong>
                                </span>
                                <?php endif;?>

                        </div><br /><br />
                        <div class="form-group">
                             <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                 <button type="submit" class="btn btn-primary"> Submit </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
