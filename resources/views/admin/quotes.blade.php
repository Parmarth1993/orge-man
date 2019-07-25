@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                @if (session('status'))
                    <div class="panel-body">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
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
                            @foreach($quotes as $quote)
                              <tr>
                                <td>{{ $quote->name }}</td>
                                <td>{{ $quote->email }}</td>
                                <td>{{ $quote->phone_number }}</td>
                                <td>{{ $quote->delivery_address }}</td>
                                <td>{{ $quote->departure_address }}</td>
                                <td>{{ $quote->created_at }}</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-default btn-sm">
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
