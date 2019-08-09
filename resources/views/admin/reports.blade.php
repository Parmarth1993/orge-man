@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Reports</div>

                @if (session('status'))
                    <div class="panel-body">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif
                <form method="get" action="">
                    <div class="col-md-3">
                         <label>From:</label>
                         <input type="date" name="start_from" value="<?php echo $filterFrom; ?>" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <label>To:</label>
                        <input type="date" name="start_end" value="<?php echo $filterEnd; ?>" class="form-control" />
                    </div>
                     <div class="col-md-3">
                        <br />
                        <input type="submit" class="btn btn-default" name="submit" />
                        <a href="/admin/reports" class="btn btn-default">Clear</a>
                    </div>
                </form>
                <div class="col-md-12">
                    <table class="table table-hover" id="reports">
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
                                    <a href="/admin/quotes/completed/view/{{ $lead->id }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                              </tr> 
                            @endforeach                         
                        </tbody>
                      </table>
                      <div class="body_wrapper-btns">
                         <!--  <a onCLick="printContent('reports')" href="#" class="btn btn-primary" role="button">Print order</a> -->
                          <form method="get" action="">
                            <input type="hidden" name="exportdata" value="csv">
                            <input type="hidden" name="start_from" value="<?php echo $filterFrom; ?>" />
                            <input type="hidden" name="start_end" value="<?php echo $filterEnd; ?>" />
                           <input type="submit" class="btn btn-default" name="export" value="Export" />
                         </form>
                       </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


<!-- <script type="text/javascript">
  
  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}


</script>      -->