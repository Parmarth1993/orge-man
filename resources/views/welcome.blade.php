@extends('layouts.app-header-public')

@section('content')
    
<!-- banner -->
<section id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="home_banner banner-overlay-black-bg" style="background:url('{{ asset('images/home/home-banner-01.jpg')}}") center center no-repeat;">
    <div class="container">
        <div class="row align-content-center">
            <div class="col-md-12 col-lg-10 offset-lg-1 align-self-center">
                <div class="slider-info text-left">
                    <h2>Luxury living, <br/>a luxury move with us </h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    
                    <div class="text-left mt-md-5 mt-3">
                        <span class="btn-outline-grid"><a class="btn btn-outline" href="#">Get a quote in less than 24 hours</a></span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<!-- //banner -->  

<!-- services -->
<div id="services" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 service-info-img pr-md-5">
                <div class="single-image-element">
                    <img class="img-fluid" src="{{ asset('images/home/our-services-01.jpg') }}" alt=""/>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 pl-md-5">
                <div class="text-element-grid">
                    <h5 class="sub-title-heading">Our Services</h5>
                    <h2 class="title-heading-default mt-md-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <span class="btn-block-grid pt-3 pt-md-4"><a href="#" class="btn btn-default">Learn More</a></span>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </div>

    </div>
</div>
<!-- //services -->
    
<div id="services" class="services-list-section" style="background:url('{{ asset('images/home/org-mm-01.png')}}")">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/residential-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Residential</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/commercial-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Commercial</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/junk-removal-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Junk Removal</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/furniturr-delivery-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Furniture Delivery</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/labor-services-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Labor Services</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/pack-load-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Pack & Load Services</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>

    </div>
</div>


<div class="request-quote-section py-md-5 py-4" id="quoteForm">
    <div class="full-width-container">
        <div class="row">
            <div class="col-md-8 col-lg-8 pr-md-5">
                <h3 class="title-heading-default mb-4 pb-md-1">Receive a quote in 24 hours or less</h3>
                {!! Form::open(['url' => '/get-quote/add','id' => 'quote_form_home', 'class' => 'request-form-grid']) !!}
                 <input type="hidden"  class="form-control"  name="formtype" value="home">
                 <div class="alert alert-success" id="sentquote" style="display:none;">
                    
                 </div>
                <!-- <form action="#" method="post" class="request-form-grid"> -->
                   <div class="row">
                        <div class="col-md-4 pr-md-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="" name="name" required="">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" placeholder="" name="email" required="">
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="tel" placeholder="" name="phone_number" required="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                          <div class="form-group">
                            <label for="date_of_job" >Date of Job</label>
                                <input type="date" name="date_of_job" class="form-control" required value="" />
                          </div>
                         </div> 
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                               <label for="address" >Departure Address</label>
                               <input type="text" class="form-control" name="departure_address" placeholder="Departure Address">
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="address" >Delivery Address</label>
                                <input type="text"  class="form-control"  name="delivery_address" placeholder="Please enter your address" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                          <div class="form-group">
                            <label for="date_of_job" >Service Needed</label>
                                <select name="service_needed" class="form-control" required  />
                                    <option value="choose_all_that_apply">CHOOSE ALL THAT APPLY</option>
                                </select>
                          </div>
                         </div> 
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                               <label for="location" >Select Location</label>
                               <input type="text" name="location" placeholder="Please select location" class="form-control" required value="" />
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                 <label for="estimate" >Estimate Needed</label>
                                 <input type="text" name="estimate" placeholder="Please select estimate" class="form-control" required value="" />
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 pr-md-1">
                            <div class="form-group">
                                  <label for="additional_details" >Additional Details</label>
                                  <textarea class="form-control"  name="additional_details" placeholder="Please enter your additional details" required></textarea>
                            </div>
                        </div>

                    </div>
                    
                    <div class="form-group mb-0">
                        <button type="button" id="quotesubmitform" class="btn btn-default btn-block">Request a Quote</button>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4 col-lg-4 request-quote-box pl-md-5 pt-md-5">
                <div class="request-quote-inner">
                    <img src="{{ asset('images/home/mobile-icon.png') }}" class="img-fluid mb-3" />
                    <h6>Request a Moving Quote</h6>
                    <h5>Call: <a href="tel:888-788-9999">888-788-9999</a></h5>
                    <p>M-F 8:00 am - 5:00 pm</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>



<div class="more-about-section py-md-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="text-element-grid">
                    <h2 class="title-heading-default mt-md-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    
                </div>
                
                <div class="row mt-3 mt-md-4">
                    <div class="col-md-6 icon-with-text grid-0">
                        <div class="icon-with-text-inner">
                            <img src="{{ asset('images/home/apoint-01.png') }}" class="img-fluid" />
                            <h4 class="icon-box-title">Lorem Ipsum Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="col-md-6 icon-with-text grid-0">
                        <div class="icon-with-text-inner">
                            <img src="{{ asset('images/home/apoint-02.png') }}" class="img-fluid" />
                            <h4 class="icon-box-title">Lorem Ipsum Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <span class="btn-block-grid"><a href="#" class="btn btn-default">Learn More</a></span>
                </div>
                
            </div>
            
            <div class="col-md-6 col-lg-6 location-img-column">
                <div class="single-image-element text-center">
                    <img src="{{ asset('images/home/loc-600.jpg') }}" class="img-fluid" />
                </div>
                <span class="request-loc-icon">
                    <img src="{{ asset('images/home/loc-icon-164.png') }}" class="img-fluid" />
                </span>
                <div class="location-form-main-box">
                    <form name="" action="" method="">
                        <p>No matter the location we can get you there.</p>
                        <a href="#" class="btn btn-outline">Request a Quote</a>
                    </form>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </div>

    </div>
</div>

<div class="py-md-5 py-5 testimonial-main-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 py-md-5">
                <div class="carousel-controls testimonial-carousel-controls">
                  <div class="control d-flex align-items-center justify-content-center prev mt-3"><i class="fa fa-chevron-left"></i></div>
                  <div class="control d-flex align-items-center justify-content-center next mt-3"><i class="fa fa-chevron-right"></i></div>

                  <div class="testimonial-carousel">
                    <div class="testimonial-box pl-5">                              
                        <p class="testimonial-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>                                    
                        </p>
                        <p class="testimonial-text">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <p class="testimonial-authour-data text-right">                                 
                            <span class="authour-function">Scottsdale, AZ</span>
                        </p>
                    </div>
                    <div class="testimonial-box pl-5">                              
                        <p class="testimonial-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>                                    
                        </p>
                        <p class="testimonial-text">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <p class="testimonial-authour-data text-right">                                 
                            <span class="authour-function">Scottsdale, AZ</span>
                        </p>
                    </div>
                    <div class="testimonial-box pl-5">                              
                        <p class="testimonial-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>                                    
                        </p>
                        <p class="testimonial-text">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <p class="testimonial-authour-data text-right">                                 
                            <span class="authour-function">Scottsdale, AZ</span>
                        </p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>      
    </div>
</div>

<div class="py-md-5 py-5 client-logo-section">
    <div class="container ">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center">
                <h3>Proud Member Of</h3>
            </div>          
        </div>
        <div class="row">           
            <div class="col-md-4 text-center">
                <img alt="" src="{{ asset('images/home/client-memb-01.png') }}" />
            </div>
            <div class="col-md-4 text-center">
                <img alt="" src="{{ asset('images/home/client-memb-02.png') }}" />
            </div>
            <div class="col-md-4 text-center">
                <img alt="" src="{{ asset('images/home/client-memb-03.png') }}" />
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="request-quote-footer-section py-md-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-center">
                <img alt="" src="{{ asset('images/home/orge-man-movers-logo.png') }}" />
            </div>
            <div class="col-lg-9">
                <h3 class="title-heading-default mb-4 pb-md-1">Receive a quote in 24 hours or less</h3>
                {!! Form::open(['url' => '/get-quote/add', 'id' => 'quote_form_home_footer','class' => 'request-form-grid']) !!}
                    {{ csrf_field() }}
                    <input type="hidden"  class="form-control"  name="formtype" value="home">
                    <div class="alert alert-success" id="sentquote_footer" style="display:none;"></div>
                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="" name="name" required="">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" placeholder="" name="email" required="">
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="tel" placeholder="" name="phone_number" required="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                          <div class="form-group">
                            <label for="date_of_job" >Date of Job</label>
                                <input type="date" name="date_of_job" class="form-control" required value="" />
                          </div>
                         </div> 
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                               <label for="address" >Departure Address</label>
                               <input type="text" class="form-control" name="departure_address" placeholder="Departure Address">
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="address" >Delivery Address</label>
                                <input type="text"  class="form-control"  name="delivery_address" placeholder="Please enter your address" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                          <div class="form-group">
                            <label for="date_of_job" >Service Needed</label>
                                <select name="service_needed" class="form-control" required  />
                                    <option value="choose_all_that_apply">CHOOSE ALL THAT APPLY</option>
                                </select>
                          </div>
                         </div> 
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                               <label for="location" >Select Location</label>
                               <input type="text" name="location" placeholder="Please select location" class="form-control" required value="" />
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                 <label for="estimate" >Estimate Needed</label>
                                 <input type="text" name="estimate" placeholder="Please select estimate" class="form-control" required value="" />
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 pr-md-1">
                            <div class="form-group">
                                  <label for="additional_details" >Additional Details</label>
                                  <textarea class="form-control"  name="additional_details" placeholder="Please enter your additional details" required></textarea>
                            </div>
                        </div>

                    </div>

                    
                    <div class="form-group mb-0">
                        <button type="button" id="quotesubmitform_footer" class="btn btn-default btn-block">Request a Quote</button>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

    
<!-- login  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Signin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" class="p-sm-3">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username</label>
                        <input type="text" class="form-control" placeholder="" name=" name" id="recipient-name"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="" name="Password" id="password"
                            required="">
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" value="Login">
                    </div>
                    <div class="row sub-w3l my-3">
                        <div class="col-sm-6 sub-w3_pvt">
                            <input type="checkbox" id="brand1" value="">
                            <label for="brand1">
                                <span></span>Remember me?</label>
                        </div>
                        <div class="col-sm-6 forgot-w3l text-sm-right">
                            <a href="#" class="text-secondary">Forgot Password?</a>
                        </div>
                    </div>
                    <p class="text-center dont-do modal-footer1">Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#exampleModal1" class="font-weight-bold"
                            data-blast="color">
                            Register Now</a>

                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
    
<!-- register -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" class="p-sm-3">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username</label>
                        <input type="text" class="form-control" placeholder="" name=" name" id="recipient-rname"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder="" name="Email" id="recipient-email"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="password1" class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="" name="Password" id="password1"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="password2" class="col-form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="" name="Confirm Password" id="password2"
                            required="">
                    </div>
                    <div class="sub-w3l">
                        <div class="sub-w3_pvt">
                            <input type="checkbox" id="brand2" value="">
                            <label for="brand2" class="mb-3">
                                <span></span>I Accept to the Terms & Conditions</label>
                        </div>
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- // register -->
@endsection