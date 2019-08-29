@extends('layouts.app-services')

@section('content')

<section class="service_banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
		<div class="carousel-item active">
			<div class="service-banner-overlay">
				<img class="d-block w-100" src="{{ asset('images/home/service-banner-01.jpg') }}" alt="First slide">
			</div>
			<div class="slider-data">
				<h2>Our Services</h2>
				<p>Whether you're moving across the street or across the world, we've got you covered.</p>
			</div>
		</div>
		<div class="carousel-item">
			<div class="service-banner-overlay">
				<img class="d-block w-100" src="{{ asset('images/home/service-banner-02.jpg') }}" alt="Second slide">
			</div>
			<div class="slider-data">
				<h2>Our Services</h2>
				<p>Whether you're moving across the street or across the world, we've got you covered.</p>
			</div>
		</div>
		<div class="carousel-item">
			<div class="service-banner-overlay">
				<img class="d-block w-100" src="{{ asset('images/home/service-banner-03.jpg') }}" alt="Third slide">
			</div>
			<div class="slider-data">
				<h2>Our Services</h2>
				<p>Whether you're moving across the street or across the world, we've got you covered.</p>
			</div>
		</div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
</section>
<!-- //banner -->

<section class="py-4">
	<div class="container">
		<div class="row service-data">
			<div class="col-md-3 services-icon">
				<img class="" src="{{ asset('images/home/residential-icon-160.png') }}" alt="">
			</div>
			<div class="col-md-9 pt-md-3 pl-md-5">
				<h3>Residential</h3>
				<p>Sit back and relax while we take care of all your moving needs from packing and transportation to unpacking, assembly and interior design. No move is too big or too small.<p>
				<span class="icon_more_grid"><a href="#">Learn More ></a></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row service-data">
			<div class="col-md-3 services-icon">
				<img class="" src="{{ asset('images/home/commercial-icon-160.png') }}" alt="">
			</div>
			<div class="col-md-9 pt-md-3 pl-md-5">
				<h3>Commercial</h3>
				<p>Need a single office boxed up and moved? We’ve got it covered. Need to relocate an entire company? We can do that too. Have sensitive or expensive equipment to transport? That’s our specialty.<p>
				<span class="icon_more_grid"><a href="#">Learn More ></a></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row service-data">
			<div class="col-md-3 services-icon">
				<img class="" src="{{ asset('images/home/junk-removal-icon-160.png') }}" alt="">
			</div>
			<div class="col-md-9 pt-md-3 pl-md-5">
				<h3>Junk Removal</h3>
				<p>Let us handle the messy stuff. You can count on our team to quickly and  thoroughly remove unwanted debris, appliances and bulk items. You can leave the heavy lifting to us.<p>
				<span class="icon_more_grid"><a href="#">Learn More ></a></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row service-data">
			<div class="col-md-3 services-icon">
				<img class="" src="{{ asset('images/home/Furniture-Delivery-icon-160.png') }}" alt="">
			</div>
			<div class="col-md-9 pt-md-3 pl-md-5">
				<h3>Furniture Delivery</h3>
				<p>Never worry about the best way to move a couch up a flight of stairs again. Our highly-skilled and experienced movers will handle all your furniture delivery and relocation needs.<p>
				<span class="icon_more_grid"><a href="#">Learn More ></a></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row service-data">
			<div class="col-md-3 services-icon">
				<img class="" src="{{ asset('images/home/White-Glove-Service-icon-160.png') }}" alt="">
			</div>
			<div class="col-md-9 pt-md-3 pl-md-5">
				<h3>White Glove Service</h3>
				<p>Grand piano? Art pieces? Grandma’s family heirloom? We will ensure the safe and meticulous packing, delivery and unpacking of your most precious and fragile items.<p>
				<span class="icon_more_grid"><a href="#">Learn More ></a></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row service-data">
			<div class="col-md-3 services-icon">
				<img class="" src="{{ asset('images/home/Real-Estate-Staging-icon-160.png') }}" alt="">
			</div>
			<div class="col-md-9 pt-md-3 pl-md-5">
				<h3>Labor Services </h3>
				<p>Have the packing and transportation under control but need extra hands? Leave the heavy lifting to us. We offer a la carte labor services at a competitive price.<p>
				<span class="icon_more_grid"><a href="#">Learn More ></a></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row service-data">
			<div class="col-md-3 services-icon">
				<img class="" src="{{ asset('images/home/pack-load-icon-160.png') }}" alt="">
			</div>
			<div class="col-md-9 pt-md-3 pl-md-5">
				<h3>Pack and Load Services</h3>
				<p>We’re here for all your bubble wrap needs—and anything else you might require to safely and securely package even your most bulky or fragile items.<p>
				<span class="icon_more_grid"><a href="#">Learn More ></a></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row service-data">
			<div class="col-md-3 services-icon">
				<img class="" src="{{ asset('images/home/packing-supply-icon-160.png') }}" alt="">
			</div>
			<div class="col-md-9 pt-md-3 pl-md-5">
				<h3>Packaging Supplies</h3>
				<p>Save time and money by allowing our experts to meticulously prepare, pack, load and unpack your items from individual pieces to entire storage units.<p>
				<span class="icon_more_grid"><a href="#">Learn More ></a></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row service-data">
			<div class="col-md-3 services-icon">
				<img class="" src="{{ asset('images/home/Real-Estate-Staging-icon-160.png') }}" alt="">
			</div>
			<div class="col-md-9 pt-md-3 pl-md-5">
				<h3>Storage Services</h3>
				<p>Whether you’re downsizing, in transition or just need a little extra space, we’ll make sure your belongings are securely and conveniently stored until you’re ready for them.<p>
				<span class="icon_more_grid"><a href="#">Learn More ></a></span>
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

@endsection