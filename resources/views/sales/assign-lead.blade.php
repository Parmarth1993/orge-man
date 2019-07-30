@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">  
    	 <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
                <div class="panel-heading">Update Lead</div>
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
                	 {!! Form::open(['url' => '/sales/lead/assign/'. $lead->id]) !!}
                	 	{{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"><b>Lead Name:</b></label>
                             <div class="col-md-6">
                                <input type="text" name="name" placeholder="Lead name" class="form-control" required value="{{ $lead->name }}" readonly />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br /><br />
                        <div class="form-group">
                            <label for="franchises" class="col-md-4 control-label"><b>Choose Franchises:</b></label>
                             <div class="col-md-6">
                                <select name="franchises" class="form-control" required  />
                                    <option value="">Choose Franchises</option>
                                    @foreach($franchises as $franchise)
                                        <option value="{{ $franchise->id }}">{{ $franchise->first_name }} {{ $franchise->last_name }}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('franchises'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('franchises') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br />
                        
                        <div class="form-group">
                            <label for="notes" class="col-md-4 control-label"><b>Additional Notes:</b></label>
                             <div class="col-md-6">
                                <textarea name="notes" class="form-control" placeholder="Additional Notes" /></textarea>
                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div><br /><br /><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <input type="hidden" name="lead_id" required value="{{ $lead->id }}" readonly />
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