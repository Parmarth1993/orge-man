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
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="wrapper">
            <div class="sales-Dashboard-wraper">
                <div class="sales-Dashboard">
                    <div class="side-dashboard-frenchiese">
                        <div class="side-frenchsee-img">
                             <a href="/"><img src="{{ asset('images/dashboard.png') }}" alt=""></a>
                        </div>
                        @guest
                        <div class="ordered-products">
                           <a href="{{ url('/get-quote') }}">Get Quote</a>
                           <a href="{{ route('login') }}">Login</a>
                           <a href="{{ route('register') }}">Register</a>
                           <a href="{{ url('/contact') }}">Contact Us</a>
                        </div>
                        @else
                        <div class="ordered-products">
                            @if (Auth::user()->role == 'sales')
                                <a href="{{ url('/sales/leads/new') }}">New Enteries</a>
                                <a href="{{ url('/sales/leads/pending') }}">Pending Enteries</a>
                                <a href="{{ url('/sales/leads/completed') }}">completed enteries</a>
                            @elseif (Auth::user()->role == 'franchises')
                                <a href="{{ url('/franchises/leads/new') }}">New Orders</a>
                                <a href="{{ url('/franchises/leads/upcoming') }}">Upcoming Orders</a>
                                <a href="{{ url('/franchises/leads/completed') }}">
                                            Completed Order</a>
                            @elseif (Auth::user()->role == 'admin')
                                <a href="{{ url('/admin/franchises') }}">
                                        Franchises</a>
                                <a href="{{ url('/admin/quotes') }}">
                                        Quotes</a>
                                <a href="{{ url('/admin/sales') }}">
                                        Sales</a>
                            @elseif (Auth::user()->role == 'customer')            
                                <a href="{{ url('/get-quote') }}">Get Quote</a>
                            @endif
                                <a href="{{ url('/profile') }}">{{ Auth::user()->first_name }} Profile</a>
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </div>
                        @endguest
                    </div>
                    <div class="main-frenchise-cntnt">
                        <div class="inner-wraper-dash-contnt">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <!-- <script src="{{ asset('js/script.js') }}"></script> -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){      
          var i=1;  

          $('#addSupply').click(function(){  
               i++;  
               $('#supplies').append('<div class="form-grouph"><label for="supplies_sold" >Supplies Sold</label><select  name="supplies[sold][]" class="input-sales-select" required><option value="">Choose from the supplies below</option><option value="supply">Test Supply</option></select></div><div class="form-grouph"><label for="quantity" class="control-label"><br></label><input type="text" name="supplies[quantity][]" class="form-control" placeholder="Quantity" required /></div><div class="form-grouph"><label for="price" class="control-label"><br></label><input type="text" name="supplies[price][]" class="form-control" placeholder="Price" required /></div>');  
          });


          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });  


          $('#search-name').keyup(function(){
 
              // Search by quote name
              var text = $(this).val();
             
              // Filter quote by name
               $.ajax({
                  url: "",
                  type: "get",
                  data: {name:text} ,
                  success: function (response) {

                   $('.card').remove();
                   $('#accordion').append($('#accordion .card', response)); 

                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
              });
             
          }); 

          $('#search-date').change(function(){

              // Search by quote date
              var text = $(this).val();
             
              $.ajax({
                  url: "",
                  type: "get",
                  data: {date:text} ,
                  success: function (response) {
                    
                   $('.card').remove();
                   $('#accordion').append($('#accordion .card', response)); 

                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
              });
             
          }); 

          $('#clear-filter').click(function(){
                $('#search-date').val('');
                $('#search-name').val('');

                 $.ajax({
                  url: "",
                  type: "get",
                  data: {name:'',date:''} ,
                  success: function (response) {
                    
                   $('.card').remove();
                   $('#accordion').append($('#accordion .card', response)); 

                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
              });

                //$('.card').show();
          });

        });  
    </script>
</body>
</html>
