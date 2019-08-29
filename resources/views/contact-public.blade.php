@extends('layouts.app-header-public-login')

@section('content')

<!-- banner -->
<section data-spy="scroll"  class="inner_banner bg-cover banner-overlay-black-bg" style="background:url('{{ asset('images/home/inner-page-banner.jpg')}}") center center no-repeat;">
    <div class="container">
        <div class="row align-content-center">
            <div class="col-md-12 col-lg-10 offset-lg-1 align-self-center">
                <div class="slider-info text-left pt-md-5 mt-md-5 pt-lg-5 mt-lg-5 pt-4">
                    <h2>Contact Us</h2>                  
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<!-- //banner -->  

<div class="request-quote-section py-md-5 py-4" id="contactForm" style="background: #f4f4f4;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 pr-md-5 offset-md-2 offset-lg-2">
                <div class="panel-body margin-left login-box">
					<h3 class="title-heading-default mb-4 pb-md-1">We will get back to you in 24 hours or less</h3>
						{!! Form::open(['url' => '/contact/send', 'class' => 'sales-dashbard-form']) !!}
							{{ csrf_field() }}
						<div class="row">
							<div class="col-md-6 pr-md-1">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="first_name" placeholder="Please enter your first name" class="form-control" required value="" />
								</div>
							</div>
							<div class="col-md-6 pr-md-1">
								<div class="form-group">
									<label for="name" >Last Name</label>
									<input type="text" name="last_name" placeholder="Please enter your first name" class="form-control" required value="" />
								</div>
							</div>
							<div class="col-md-6 pr-md-1">
								<div class="form-group">
									<label for="email" >Email</label>
									<input type="email" name="email" placeholder="Please enter your email" class="form-control" required value="" />
								</div>
							</div>
							<div class="col-md-6 pr-md-1">
								<div class="form-group">
									<label for="phone_number" >Phone</label>
									<input type="text" name="phone_number" placeholder="Please enter your phone number" class="form-control" required value="" />
								</div>
							</div>
							
							<div class="col-md-12 pr-md-1">
								<div class="form-group">
									  <label for="additional_details" >Address</label>
									  <textarea class="form-control"  name="additional_details" placeholder="Please enter your address" required></textarea>
								</div>
							</div>

						</div>
							<div class="form-group mb-0 text-center">
								 <button type="Submit" id="quotesubmitform" class="btn btn-default ">Submit</button>
							</div>
						{!! Form::close() !!}
				</div>
            </div>
        </div>
    </div>
</div>

@endsection
