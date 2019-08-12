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
    <style>
        .navbar-fixed-left {
          width: 200px;
          position: fixed;
          border-radius: 0;
          height: 100%;
        }

        .navbar-fixed-left .navbar-nav > li {
          float: none;  /* Cancel default li float: left */
          width: 150px;
        }
        .navbar-fixed-left .navbar-nav > li a{
            color: #fff;
            font-weight: 600;
        }
        .navbar-fixed-left .navbar-nav > li.dropdown.open .dropdown-menu li a{
            color: #000;
            font-weight: 600;
        }
        .navbar-fixed-left .navbar-nav > li.dropdown.open .dropdown-menu {
            z-index: 1000;
        }
        .navbar-fixed-left + .container {
          padding-left: 90px;
        }

        /* On using dropdown menu (To right shift popuped) */
        .navbar-fixed-left .navbar-nav > li > .dropdown-menu {
          margin-top: -50px;
          margin-left: 140px;
        }
        ul.nav.navbar-nav {
            padding-top: 80px;
            padding-left: 20px;
        }
        .panel{
            margin-top:20px;
        }
        </style>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-left">
        
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/dashboard.png') }}" width="75">
        </a>
      <ul class="nav navbar-nav">
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
                <a href="{{ url('/admin/sales') }}">
                Sales
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/quotes') }}">
                Quotes
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/quotes/upcoming') }}">
                Upcoming Leads
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/quotes/completed') }}">
                Completed Leads
                </a>
            </li>
           <!--  <li>
                <a href="{{ url('/admin/reports') }}">
                Reports
                </a>
            </li> -->
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
                        <!-- <a href="{{ url('/change-password') }}">
                            Change Password
                        </a> -->
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
    <div class="container top-div">
       @yield('content')
    </div>
    <!-- <div id="app" > -->
        <!-- <div id="mySidenav" class="sidenav">
          <a href="#">About</a>
          <a href="#">Services</a>
          <a href="#">Clients</a>
          <a href="#">Contact</a>
        </div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> -->
        
    <!-- </div> -->

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