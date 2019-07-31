@extends('layouts.app')

@section('content')
<h2>Franchisee Dashboard</h2>
<div class="frenchise_order-details">
    <div id="accordion">
        @foreach($leads as $key => $lead)
           <div class="card">
              <div class="card-header">
                 <div class="collapsible-card-headEr" data-toggle="collapse" href="#collapse{{ $key }}">
                    <a class="card-link" >
                    Order #{{ $lead->lead_id }} - {{ $lead->quote_name }} 
                    </a>
                    <div class="right_card-cntn">
                       <a class="confirmed_order" href="{{ url('/franchises/lead/confirm/'. $lead->lead_id ) }}">CONFIRMED RECEIVED ORDER</a>
                       <span><i class="fas fa-chevron-down"></i></span>
                    </div>
                 </div>
                 <div id="collapse{{ $key }}" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                       <div class="body_wrapper-cntnt">
                          <div class="left-collapce-sec">
                             <h4>{{ $lead->quote_name }}</h4>
                             <span>Phone No: <a href="tel:{{ $lead->quote_phone_number }}">{{ $lead->quote_phone_number }}</a></span>
                             <span>Email: <a href="mailto: {{ $lead->quote_email }}"> {{ $lead->quote_email }}</a></span>
                             <span>Date of Move: <span>{{ $lead->created_at }}</span></span>
                             <span>Assigned Franchisee: <span>{{ $lead->franchises_first_name }} {{ $lead->franchises_last_name }} </span></span>
                             <span>Franchisee Email: <span>{{ $lead->franchises_email }}</span></span>
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