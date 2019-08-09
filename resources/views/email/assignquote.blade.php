@include('email.layouts.header')

<div>
    Hello : {{ $franchisee }} ,<br />
    New lead has been assigned to you. You can login and check.<br />

    Notes: {{$notes}}

</div>

@include('email.layouts.footer')