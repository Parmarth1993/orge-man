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

<div class="request-quote-section py-md-5 py-4" id="contactForm">
    <div class="full-width-container">
        <div class="row">
            <div class="col-md-8 col-lg-8 pr-md-5">
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
                        <div class="form-group mb-0">
                             <button type="Submit" id="quotesubmitform" class="btn btn-default btn-block">Submit</button>
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
