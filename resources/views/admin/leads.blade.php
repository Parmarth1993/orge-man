@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $type }} Leads</div>
                 @if(session()->get('success'))
                    <div class="alert alert-success">
                      {{ session()->get('success') }}  
                    </div><br />
                @endif
                @if (session('status'))
                    <div class="panel-body">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif
                @if ($type == 'completed')
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
                                <td>{{ $lead->quote_name }}</td>
                                <td>{{ $lead->quote_email }}</td>
                                <td>{{ $lead->quote_phone_number }}</td>
                                <td>{{ $lead->quote_delivery_address }}</td>
                                <td>{{ $lead->quote_departure_address }}</td>
                                <td>{{ $lead->created_at }}</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                   <!--  <a onclick="return confirm('Are you sure?')" href="{{ url('/admin/quotes/delete/'. $lead->id ) }}"  class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a> -->
                                </td>
                              </tr> 
                            @endforeach                         
                        </tbody>
                      </table>
                </div>
             @elseif ($type == 'upcoming')
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
                                      <a href="javascript:void(0);" class="btn btn-default btn-sm">
                                          <i class="glyphicon glyphicon-pencil"></i>
                                      </a>
                                      <!-- <a onclick="return confirm('Are you sure?')" href="{{ url('/admin/quotes/delete/'. $lead->id ) }}"  class="btn btn-default btn-sm">
                                          <i class="glyphicon glyphicon-trash"></i>
                                      </a> -->
                                  </td>
                                </tr> 
                              @endforeach                         
                          </tbody>
                        </table>
                  </div>
            @else
            @endif

            </div>
        </div>
    </div>
</div>
@endsection
