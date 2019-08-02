<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Orge Man') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Orge Man') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        @else
                            @if (Auth::user()->role == 'admin')
                            <li>
                                <a href="{{ url('/admin/franchises') }}">
                                Franchise
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/quotes') }}">
                                Quotes
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/sales') }}">
                                Sales
                                </a>
                            </li>
                            @endif

                            @if (Auth::user()->role == 'sales')
                                <!-- <li>
                                    <a href="{{ url('/sales/lead/assign-new-lead') }}">
                                    New Lead Entry
                                    </a>
                                </li> -->
                                <li>
                                    <a href="{{ url('/sales/leads/new') }}">
                                    New Entries
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/sales/leads/pending') }}">
                                    Pending Entries
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->role == 'franchises')
                                <li>
                                    <a href="{{ url('/franchises/leads/new') }}">
                                    New Orders
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/franchises/leads/upcoming') }}">
                                    Upcoming Orders
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/franchises/leads/completed') }}">
                                    Completed Order
                                    </a>
                                </li>
                            @endif

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Hi, {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('/profile') }}">
                                            My Profile
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>                                    
                                </ul>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){      
          var i=1;  

          $('#add').click(function(){  
               i++;  
               $('#dynamic_field').append('<br /><div id="row'+i+'"><input  type="text" name="employees[]" placeholder="Enter employee name" class="form-control employee_list" required /><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');  
          });


          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });  

        });  
    </script>

</body>
</html>