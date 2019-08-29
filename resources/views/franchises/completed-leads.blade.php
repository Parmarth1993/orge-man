@extends('layouts.app')

@section('content')
<h2>Franchisee Dashboard</h2>
<div class="frenchise_order-details">
    <div id="accordion">
        @foreach($leads as $key => $lead)
           <div class="card">
              <div class="card-header">
                 <div class="collapsible-card-headEr completed" data-toggle="collapse" href="#collapse{{ $key }}">
                    <a class="card-link" >
                    Order #{{ $lead->lead_id }} - {{ $lead->quote_name }} 
                    </a>
                    <div class="right_card-cntn">
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
                             <span>Date of Move: <span>{{ $lead->dateofjob }}</span></span>
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
							 <span>
								<img style="width:215px;float:right" alt="" src="{{ asset('images/completed.jpg') }}" />
							 </span>
                          </div>
                       </div>
                       <div class="body_wrapper-btns">
                          <a href="{{ url('/franchises/lead/view/'. $lead->lead_id ) }}" role="button">View order</a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        @endforeach
    </div>
</div>
@endsection               