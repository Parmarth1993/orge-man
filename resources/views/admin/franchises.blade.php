@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard
                    <a href="{{ url('/admin/franchises/add') }}" class="btn btn-default pull-right">Add</a>
                </div>
                @if(session()->get('success'))
                    <div class="alert alert-success">
                      {{ session()->get('success') }}  
                    </div><br />
                @endif
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($franchises as $franchise)
                              <tr>
                                <td>{{ $franchise->first_name }}</td>
                                <td>{{ $franchise->last_name }}</td>
                                <td>{{ $franchise->email }}</td>
                                <td>{{ $franchise->phone_number }}</td>
                                <td>{{ $franchise->address }}</td>
                                <td>{{ $franchise->created_at }}</td>
                                <td>
                                    <a href="{{ url('/admin/franchises/edit/'. $franchise->id ) }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure?')" href="{{ url('/admin/franchises/delete/'. $franchise->id ) }}" class="btn btn-default btn-sm">
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
