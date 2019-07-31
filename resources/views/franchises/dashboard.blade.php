@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Franchises Dashboard</div>
            </div>
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
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Quote Name</th>
                    <th>Quote Email</th>
                    <th>Quote Phone</th>
                    <th>Franchises Name</th>
                    <th>Franchises Last Name</th>
                    <th>Franchises Email</th>
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
                            <a href="{{ url('/franchises/lead/confirm/'. $lead->lead_id ) }}" class="btn btn-default btn-sm">
                                Confirm
                            </a>
                        </td>
                      </tr> 
                    @endforeach                                                  
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection               