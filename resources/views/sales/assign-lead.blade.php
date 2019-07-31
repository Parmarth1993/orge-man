@extends('layouts.app')

@section('content')
<h2>Sales Dashboard</h2>
<div class="sales_input-details">
    <h2>Assign Order #{{ $lead->id }} {{ $lead->name }}</h2>
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
{!! Form::open(['url' => '/sales/lead/assign/'. $lead->id, 'class' => 'sales-dashbard-form']) !!}
	{{ csrf_field() }}
    <div class="form-grouph">
        <label for="name" >Lead Name</label>
            <input type="text" name="name" placeholder="Lead name" class="form-control" required value="{{ $lead->name }}" readonly />
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>
    <div class="form-grouph">
        <label for="franchises" >Choose Franchises</label>
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
    
    <div class="form-grouph textarea">
        <label for="notes" >Additional Notes</label>
            <textarea name="notes" class="form-control" placeholder="Additional Notes" /></textarea>
            @if ($errors->has('notes'))
                <span class="help-block">
                    <strong>{{ $errors->first('notes') }}</strong>
                </span>
            @endif
    </div>
    <div class="input-sales-submit-btn">
        <input type="hidden" name="lead_id" required value="{{ $lead->id }}" readonly />
        <input type="submit" value="Submit">
    </div>
{!! Form::close() !!}
@endsection