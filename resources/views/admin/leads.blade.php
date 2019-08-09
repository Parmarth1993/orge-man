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
                <div class="col-md-3">
                  <label>Choose Franchises</label>
                  <select class="form-control" name="filterFranchises" onchange="return window.location.href = '/admin/quotes/{{ $type }}?filterFranchises=' + this.value + '&date_of_job={{ $dateOfMove }}'">
                    <option value="">Select Franchises</option>
                    @foreach($franchises as $franchisee)
                      <option value="{{ $franchisee->id }}" <?php if($filterFranchises == $franchisee->id) { echo 'selected="selected"'; } ?>>{{ $franchisee->first_name }} {{ $franchisee->last_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label>Date Of Move</label>
                  <input type="date" name="date_of_job" placeholder="Date of Move" class="form-control" onchange="return window.location.href = '/admin/quotes/{{ $type }}?date_of_job=' + this.value + '&filterFranchises={{ $filterFranchises }}' " value="{{ $dateOfMove }}">
                </div>
                @if ($type == 'completed')
                  <div class="col-md-3">
                    <label>Completion Date </label>
                    <input type="date" name="completion_date" placeholder="Date of Move" class="form-control" onchange="return window.location.href = '/admin/quotes/{{ $type }}?completion_date=' + this.value + '&filterFranchises={{ $filterFranchises }}&date_of_job={{ $dateOfMove }}' " value="{{ $completionDate }}">
                  </div>
                @endif
                <div class="col-md-3">
                  <br>
                  <a href="/admin/quotes/{{ $type }}" class="btn btn-default">Clear</a>
                </div>
                  @if ($type == 'completed')
                  <div class="col-md-12">
                      <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Franchises</th>
                              <th>Address</th>
                              <th>Departure Address</th>
                              <th>Date Of Move</th>
                              <th>Completion Date</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($leads as $lead)
                                <tr>
                                  <td>{{ $lead->quote_name }}</td>
                                  <td>{{ $lead->quote_email }}</td>
                                  <td>{{ $lead->quote_phone_number }}</td>
                                  <td><a href="/admin/franchises/edit/{{ $lead->franchises_id }}">{{ $lead->franchises_first_name }}</a></td>
                                  <td>{{ $lead->quote_delivery_address }}</td>
                                  <td>{{ $lead->quote_departure_address }}</td>
                                  <td>{{ $lead->dateofjob }}</td>
                                  <td>{{ $lead->completion_date }}</td>
                                  <td>
                                      <a href="/admin/quotes/completed/view/{{ $lead->id }}" class="btn btn-default btn-sm">
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
                        @if ($type == 'completed')
                          <div class="body_wrapper-btns">
                          <form method="get" action="">
                            <input type="hidden" name="exportdata" value="csv">
                            <input type="hidden" name="date_of_job" value="{{ $dateOfMove }}" />
                            <input type="hidden" name="completion_date" value="{{ $completionDate }}" />
                            <input type="hidden" name="filterFranchises" value="{{ $filterFranchises }}" />
                           <input type="submit" class="btn btn-default" name="export" value="Export" />
                         </form>
                          </div>
                        @endif
                  </div>
                  @elseif ($type == 'upcoming')
                 <div class="col-md-12">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Franchises</th>
                              <th>Address</th>
                              <th>Departure Address</th>
                              <th>Date Of Move</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($leads as $lead)
                                <tr>
                                  <td>{{ $lead->quote_name }}</td>
                                  <td>{{ $lead->quote_email }}</td>
                                  <td>{{ $lead->quote_phone_number }}</td>
                                  <td><a href="/admin/franchises/edit/{{ $lead->franchises_id }}">{{ $lead->franchises_first_name }}</a></td>
                                  <td>{{ $lead->quote_delivery_address }}</td>
                                  <td>{{ $lead->quote_departure_address }}</td>
                                  <td>{{ $lead->dateofjob }}</td>
                                  <td>
                                      <a href="/admin/quotes/completed/view/{{ $lead->id }}" class="btn btn-default btn-sm">
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
                  @else
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
