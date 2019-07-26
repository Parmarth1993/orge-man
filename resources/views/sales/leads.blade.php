@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sales {{ $type }} Leads</div>
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
                    @if($type == 'assigned')
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Quote Name</th>
                                <th>Quote Email</th>
                                <th>Quote Phone</th>
                                <th>Franchises Name</th>
                                <th>Franchises Email</th>
                                <th>Franchises Phone</th>
                                <th>Assigned On</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                                  <tr>
                                    <td>{{ $lead->quote_name }}</td>
                                    <td>{{ $lead->quote_email }}</td>
                                    <td>{{ $lead->quote_phone_number }}</td>
                                    <td>{{ $lead->franchises_first_name }}</td>
                                    <td>{{ $lead->franchises_last_name }}</td>
                                    <td>{{ $lead->franchises_email }}</td>
                                    <td>{{ $lead->created_at }}</td>
                                    <td>
                                        <a href="{{ url('/sales/lead/view/'. $lead->id ) }}" class="btn btn-default btn-sm">
                                            View
                                        </a>
                                    </td>
                                  </tr> 
                                @endforeach                                                  
                            </tbody>
                        </table>
                    @else
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Quote Name</th>
                                <th>Quote Email</th>
                                <th>Quote Phone</th>
                                <th>Address</th>
                                <th>Departure Type</th>
                                <th>Created On</th>
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
                                            Assign
                                        </a>
                                    </td>
                                  </tr> 
                                @endforeach                                                  
                            </tbody>
                        </table>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection               