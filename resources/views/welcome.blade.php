@extends('layouts.app-header-public')

@section('content')
    
<!-- banner -->
<section class="home_banner banner-overlay-black-bg" style="background-image:url('{{asset('images/home/home-banner-01.jpg')}}')" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 offset-lg-1">
                <div class="slider-info text-left">
                    <h2>Our service is legendary</h2>
                    <p>At Ogre Man we strive to be bigger, better, stronger movers. But we also know how to pay meticulous attention to detail to ensure your move is safe, seamless and stress-free. No move is too big or too small.</p>
                    
                    <div class="text-left mt-3 pt-md-3">
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
<section id="services" class="section-padding">
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
                    <h2 class="title-heading-default mt-md-3">Ogre Man is a full-service moving company that offers a luxury moving experience without the luxury prices.</h2>
                    <p>We hire only expert movers with at least five years experience. In fact, we’re so confident in the value we offer that we will beat any competitor’s written quote by 10 percent.</p>
                    <span class="btn-block-grid pt-3 pt-md-4"><a href="#" class="btn btn-default">Get A Quote</a></span>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </div>

    </div>
</section>
<!-- //services -->
    
<section id="services" class="services-list-section" style="background-image:url('{{ asset('images/home/org-mm-01.png')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/residential-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Residential</h4>
                    <p>Sit back and relax while we take care of all your moving needs from packing and transportation to unpacking, assembly and interior design. No move is too big or too small.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/commercial-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Commercial</h4>
                    <p>Need a single office boxed up and moved? We’ve got it covered. Need to relocate an entire company? We can do that too. Have sensitive or expensive equipment to transport? That’s our specialty.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/junk-removal-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Junk Removal</h4>
                    <p>Let us handle the messy stuff. You can count on our team to quickly and  thoroughly remove unwanted debris, appliances and bulk items. You can leave the heavy lifting to us.</p>
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
                    <p>Never worry about the best way to move a couch up a flight of stairs again. Our highly-skilled and experienced movers will handle all your furniture delivery and relocation needs.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/labor-services-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Labor Services</h4>
                    <p>Have the packing and transportation under control but need extra hands? Leave the heavy lifting to us. We offer a la carte labor services at a competitive price.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/pack-load-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Pack & Load Services</h4>
                    <p>Save time and money by allowing our experts to meticulously prepare, pack, load and unpack your items from individual pieces to entire storage units.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
		
		<div class="row">
            <div class="col-md-4 col-lg-4 offset-lg-2 offset-md-2 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/packaging-supply-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Packaging Supplies</h4>
                    <p>We’re here for all your bubble wrap needs—and anything else you might require to safely and securely package even your most bulky or fragile items.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 icon-with-text">
                <div class="icon-with-text-inner">
                    <img src="{{ asset('images/home/storage-service-icon.png') }}" class="img-fluid" />
                    <h4 class="icon-box-title">Storage Services</h4>
                    <p>Have the packing and transportation under control but need extra hands? Leave the heavy lifting to us. We offer a la carte labor services at a competitive price.</p>
                    <span class="icon_more_grid"><a href="#">Learn More ></a></span>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</section>


<section class="request-quote-section py-md-5 py-4" id="quoteForm">
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
                        <!--<div class="col-md-4 pr-md-1">
                          <div class="form-group">
                            <label for="date_of_job" >Date of Job</label>
                                <input type="date" name="date_of_job" class="form-control" required value="" />
                          </div>
                         </div> -->
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                               <label for="address" >Departure Address</label>
                               <input type="text" class="form-control" name="departure_address" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <div class="form-group">
                                <label for="address" >Delivery Address</label>
                                <input type="text"  class="form-control"  name="delivery_address" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio1" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio1">Residential</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio2" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio2">Furniture Delivery</label>
                            </div>
							<div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio3" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio3">Packing Supplies</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio4" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio4">Commercial</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio5" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio5">Labor Services</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio6" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio6">Storage Services</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio7" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio7">Junk Removal</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio8" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio8">Pack & Load Service</label>
                            </div>
                        </div>
                    </div>
					
                    <!--<div class="row">
                        <div class="col-md-4 pr-md-1">
                            <div class="form-group">
                               <label for="location" >Select Location</label>
                               <input type="text" name="location" placeholder="Please select location" class="form-control" required value="" />
                            </div>
                        </div>
                        <div class="col-md-4 px-md-1">
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
                    </div> -->
                    
                    <div class="form-group mb-0">
                        <button type="button" id="quotesubmitform" class="btn btn-default btn-block">Request a Quote</button>
                    </div>
                {!! Form::close() !!}
				
            </div>
            <div class="col-md-4 col-lg-4 request-quote-box pl-md-5 pt-md-5">
                <div class="request-quote-inner">
					<div class="request-quote-grid mb-3">
						<div class="request-quote-img">
							<img src="{{ asset('images/home/mobile-icon.png') }}" class="img-fluid" />
						</div>
						<div class="request-quote-title">
							<h6>Request a Moving Quote</h6>
							<p><a href="tel:866-OGREMAN" style="font-size:24px; color:#3361d1;">866-OGREMAN</a></p>
						</div>
					</div>
                    
                    <h5>Call: <a href="tel:888-647-3626">888-647-3626</a></h5>
                    <p>M-F 8:00 am - 5:00 pm</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>


<section class="more-about-section pt-md-5 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="text-element-grid">
                    <h2 class="title-heading-default mt-md-1">Safety. Integrity. Experience.</h2>
                    <p>Ogre Man has been in the industry for more than 15 years and knows the importance of hiring highly-skilled movers. Our movers have an average of 10 years’ experience and we only hire those with at least five years’ experience.</p>
                    <p>We believe our commitment to honesty, dependability, integrity and a high level of experience sets us apart from competitors.</p>
					<p>Whether you are moving a single piece of furniture or an entire building, we are committed to providing a luxury moving experience. It’s a responsibility we take seriously.</p>
                </div>
				
                <div class="text-element-grid mt-3">
					<p class="large-text-grid">Our specialities include: </p>
				</div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="spec-list">
							<li>Local moves</li>
							<li>Long distance moves</li>
							<li>Retirement centers</li>
							<li>Schools and colleges</li>
						</ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="spec-list">
							<li>Piano transportation</li>
							<li>Art delivery</li>
							<li>White Glove Service</li>
							<li>Junk removal</li>
						</ul>
                    </div>
                </div>
                
                <div class="text-left my-md-4 my-3">
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
</section>

<section class="py-md-5 py-4 testimonial-main-box">
    <div class="container">
        <div class="row my-md-4">
            <div class="col-md-12 col-lg-12 pt-md-5">
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        </p>
                        <p class="testimonial-authour-data text-md-right pr-md-4">                                 
                            <span class="authour-function">- John Moore</span>
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        </p>
                        <p class="testimonial-authour-data text-md-right pr-md-4">                                 
                            <span class="authour-function">- John Doe</span>
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        </p>
                        <p class="testimonial-authour-data text-md-right pr-md-4">                                 
                            <span class="authour-function">- John Doe</span>
                        </p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>      
    </div>
</section>

<section class="py-md-5 py-5 client-logo-section">
    <div class="container ">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center">
                <h3>Proud Member Of</h3>
            </div>          
        </div>
        <div class="row proud-member-grid">           
            <div class="col-sm-4 col-md-4 text-center">
                <img alt="" src="{{ asset('images/home/client-memb-01.png') }}" />
            </div>
            <div class="col-sm-4 col-md-4 text-center">
                <img alt="" src="{{ asset('images/home/client-memb-02.png') }}" />
            </div>
            <div class="col-sm-4 col-md-4 text-center">
                <img alt="" src="{{ asset('images/home/client-memb-03.png') }}" />
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>


<section class="request-quote-footer-section py-md-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3 text-center">
                <img alt="" src="{{ asset('images/home/orge-man-movers-logo.png') }}" />
            </div>
            <div class="col-md-9 col-lg-9">
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
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                               <label for="address" >Departure Address</label>
                               <input type="text" class="form-control" name="departure_address" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <div class="form-group">
                                <label for="address" >Delivery Address</label>
                                <input type="text"  class="form-control"  name="delivery_address" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio11" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio11">Residential</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio12" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio12">Furniture Delivery</label>
                            </div>
							<div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio13" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio13">Packing Supplies</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio14" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio14">Commercial</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio15" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio15">Labor Services</label>
                            </div>
							 <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio16" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio16">Storage Services</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio17" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio17">Junk Removal</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="customRadio18" name="service_needed" value="Residential">
                                <label class="custom-control-label" for="customRadio18">Pack & Load Service</label>
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
</section>

    
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