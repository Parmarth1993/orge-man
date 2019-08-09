@include('email.layouts.header')

<div>
    First Name : {{ $firstname }}<br />
    Last Name : {{ $lastname }}<br />
    Phone Number : {{ $phonenumber }}<br />
    Email : {{ $email }}<br />
    Address : {{ $address }}<br />
</div>

@include('email.layouts.footer')