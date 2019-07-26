@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sales Dashboard</div>
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
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Departure Address</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                              <tr>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->phone_number }}</td>
                                <td>{{ $lead->delivery_address }}</td>
                                <td>{{ $lead->departure_address }}</td>
                                <td>{{ $lead->created_at }}</td>
                                <td>
                                    <a href="{{ url('/sales/lead/assign/'. $lead->id ) }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure?')" href="{{ url('/lead/delete/'. $lead->id ) }}"  class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                </td>
                              </tr> 
                            @endforeach                         
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection               