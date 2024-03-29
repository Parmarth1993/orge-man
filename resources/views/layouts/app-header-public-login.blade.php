<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Orge Men Movers | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Orge Men Movers" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="{{ asset('css/home/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/home/lightslider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/slick.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/style.css') }}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="{{ asset('css/home/font-awesome.min.css') }}" rel="stylesheet">
    <!-- online-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=latin-ext" rel="stylesheet">


</head>

<body id="inner-page">

<!-- header -->
<header class="header-standard">

    <nav class="navbar navbar-expand-lg fixed-top navbar-expand-lg navbar-light navbar-fixed-top top-nav-collapse">

        <span class="logo-grid">
        <a class="navbar-brand" href="">
            <img src="{{ asset('images/home/orge-man-movers-logo.png') }}" class="img-fluid" />
        </a></span>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar"
            aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="mainnavbar">
            <ul class="navbar-nav mx-lg-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>               
				<li class="nav-item child-menu">
                    <a class="nav-link" href="/services">Services</a>
					<ul class="menu-level1">
						<li><a href="#">Residential</a></li>
						<li><a href="#">Commercial</a></li>
						<li><a href="#">Junk Removal</a></li>
						<li><a href="#">Furniture Delivery</a></li>
						<li><a href="#">Labor Services</a></li>
						<li><a href="#">Pack & Load Services</a></li>
					</ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Employment</a>
                </li>
                
                <li class="nav-item">
                    @guest
                        <a class="nav-link" href="/contact-us">Contact</a>
                    @else
                        <a class="nav-link" href="/contact">Contact</a>
                    @endguest
                </li>
                <li class="nav-item">
                    @guest
                        <a class="nav-link" href="/login">login</a>
                    @else
                        <a class="nav-link" href="/profile">Dashboard</a>
                    @endguest
                </li>
            </ul>
            
            <span class="header-right-btn ml-2"><a class="btn btn-outline"  href="/#quoteForm">Request a Quote</a></span>
    
            <div class="top-header-grid text-md-right">
                <span class="phone-grid"><i class="fa fa-phone mr-2"></i>888-788-9999</span>
            </div>

        </div>
        
        
    </nav>
    
</header>
<!-- //header -->
 
@yield('content')

<!-- footer -->
<footer class="footer-section">
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-3">
                <h5>Helpful Links</h5>
                <ul class="footer-link">
                    <li><a href="#">Commercial Moving</a></li>
                    <li><a href="#">Residential Moving</a></li>
                    <li><a href="#">Junk Removal</a></li>
                    <li><a href="#">Furniture Delivery</a></li>
                    <li><a href="#">Labor Services</a></li>
                    <li><a href="#">Pack & Load Services</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5>Areas Served</h5>
                <ul class="footer-link footer-area-link">
                    <li><a href="#">Texas</a></li>
                    <li><a href="#">Oklahoma</a></li>
                    <li><a href="#">New York</a></li>
                    <li><a href="#">Florida</a></li>
                    <li><a href="#">Connecticut</a></li>
                    <li><a href="#">Boston</a></li>
                    <li><a href="#">Atlanta</a></li>
                    <li><a href="#">North Carolina</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5>Contact Us</h5>
                <ul class="footer-contact-details">
                    5671 Main Street<br/>
                    Austin, Texas 73546<br/><br/>

                    Phone: <b>888-788-9999</b><br/>
                    Email Us: <a href="mailto:info@orgemanmoving.com">info@orgemanmoving.com</a>
                </ul>
                <h5 style="width:135px">&nbsp;</h5>
                <ul class="footer-contact-details">
                    Sales Department<br/>
                    <b>888-785-9898</b>
                </ul>
            </div>
            <div class="col-lg-3">
                <div class="widget-social">
                    <h5>Follow Us</h5>
                    <ul>
                        <li class="facebook">
                            <a href="#">
                                <span class="fa fa-facebook-f icon_facebook"></span>
                            </a>
                        </li>
                        <li class="linkedin">
                            <a href="#">
                                <span class="fa fa-linkedin icon_linkedin"></span>
                            </a>
                        </li>
                        <li class="instagram">
                            <a href="#">
                                <span class="fa fa-instagram icon_instagram"></span>
                            </a>
                        </li>                       
                    </ul>
                    <h5 class="mt-4">Follow Us</h5>
                    <div class="card-img">
                        <img alt="" src="{{ asset('images/home/credit-cards.png') }}" />                        
                    </div>
                    <div class="card-img help-img text-lg-right text-md-right text-center pt-4 pr-4">                       
                        <img alt="" src="{{ asset('images/home/lets-chat-img.png') }}" />
                    </div>
                </div>
            </div>          
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center mt-lg-0 mt-4 cpy-right">
                <p>Copyright © 2019 Ogre Man Movers. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- //footer -->
<!-- js -->
<script src="{{ asset('js/home/jquery-2.2.3.min.js') }}"></script>
<!-- //js -->

<!-- Banner  Responsiveslides -->
<script src="{{ asset('js/home/responsiveslides.min.js') }}"></script>
<script>
    // You can also use"$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- //Banner  Responsiveslides -->
<!-- Scrolling Nav JavaScript -->
<script src="{{ asset('js/home/scrolling-nav.js') }}"></script>
<!-- <script src="js/counter.js"></script> -->
<!-- portfolio -->
<script src="{{ asset('js/home/jquery.picEyes.js') }}"></script>
<script>
    $(function () {
        //picturesEyes($('.demo li'));
        $('.demo li').picEyes();
    });
</script>
<!-- //portfolio -->
<!-- start-smooth-scrolling -->
<script src="{{ asset('js/home/move-top.js') }}"></script>
<script src="{{ asset('js/home/easing.js') }}"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear' 
        };
        */

       $('#quotesubmitform').click(function(){
             $('#quotesubmitform').val('Please Wait...');
             $.ajax({
              url: "/get-quote/add",
              type: "post",
              data: $('#quote_form_home').serialize() ,
              success: function (response) {
                var response = JSON.parse(response);
                $('#sentquote').html(response.message);
                $('#sentquote').show();
                $('#quotesubmitform').val('Request a Quote');
                $('#quote_form_home')[0].reset();
                setTimeout(function(){
                    $('#sentquote').hide();
                }, 5000);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }
          });

            //$('.card').show();
      });

        $('#quotesubmitform_footer').click(function(){
             $('#quotesubmitform_footer').val('Please Wait...');
             $.ajax({
              url: "/get-quote/add",
              type: "post",
              data: $('#quote_form_home_footer').serialize() ,
              success: function (response) {
                var response = JSON.parse(response);
                $('#sentquote_footer').html(response.message);
                $('#sentquote_footer').show();
                $('#quotesubmitform_footer').val('Request a Quote');
                $('#quote_form_home_footer')[0].reset();
                setTimeout(function(){
                    $('#sentquote_footer').hide();
                }, 5000);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }
          });

            //$('.card').show();
      });



        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<script src="{{ asset('js/home/SmoothScroll.min.js') }}"></script>
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/home/bootstrap.js') }}"></script>
<script src="{{ asset('js/home/slick.min.js') }}"></script>
<script src="{{ asset('js/home/test-slider-fullwidth.js') }}"></script>
</body>

</html>