@include('email.layouts.header')

<div>
    Hi : {{ $firstName }} {{ $lastName }},<br />
    You have been added as {{ $role }} at {{ $server }} <br>
    Below are your login details: <br>
    Email:  {{ $email }} <br>
    Password: {{ $password }} <br>
    <a href="{{ $server }}/login"> Click here to login </a>
</div>

@include('email.layouts.footer')