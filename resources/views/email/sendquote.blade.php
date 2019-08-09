@include('email.layouts.header')

<div>
    Name : {{ $name }}<br />
    Email : {{ $email }}<br />
    Phone Number : {{ $phone_number }}<br />
    Date of Job : {{ $date_of_job }}<br />
    Delivery Address : {{ $delivery_address }}<br />
    Departure Address: {{ $departure_address }}<br />
    Service Needed: {{ $service_needed }}<br />
    Location: {{ $location }}<br />
    Estimate: {{ $estimate }}<br />
    Additional Details: : {{ $additional_details }}<br />
</div>

@include('email.layouts.footer')