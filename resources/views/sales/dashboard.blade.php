@extends('layouts.app')

@section('content')
<h2>Sales Dashboard</h2>
    <div class="search_value-frenchisee">
        <input type="text" placeholder="search by name">
        <input type="text" placeholder="search by date">
        <!-- <input type="submit" value="Search"> -->
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
    <a href="{{ url('/sales/lead/create') }}"> <button class="btn btn-default">New Lead Entry</button> </a>
    <div class="frenchise_order-details">
        <div id="accordion">
            @foreach($leads as $key => $lead)
               <div class="card">
                  <div class="card-header">
                     <div class="collapsible-card-headEr" data-toggle="collapse" href="#collapse{{ $key }}">
                        <a class="card-link" >
                        Order #{{ $lead->id }} - {{ $lead->name }} 
                        </a>
                        <div class="right_card-cntn">
                           <span><i class="fas fa-chevron-down"></i></span>
                        </div>
                     </div>
                     <div id="collapse{{ $key }}" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                           <div class="body_wrapper-cntnt">
                              <div class="left-collapce-sec">
                                 <h4>{{ $lead->name }}</h4>
                                 <span>Phone No: <a href="tel:{{ $lead->phone_number }}">{{ $lead->phone_number }}</a></span>
                                 <span>Email: <a href="mailto: {{ $lead->email }}"> {{ $lead->email }}</a></span>
                                 <span>Date of Move: <span>{{ $lead->created_at }}</span></span>
                                 <span>Depart From: <span>{{ $lead->delivery_address }} </span></span>
                                 <span>Deliver To: <span>{{ $lead->departure_address }}</span></span>
                              </div>
                              <div class="right-collapce-sec">
                                 <span><span>Services Needed:</span>
                                 {{ $lead->service_needed }}
                                 </span>
                                 <span>
                                 <span>Help Needed: </span>
                                 {{ $lead->estimate }}
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
        </div>
    </div>
@endsection               