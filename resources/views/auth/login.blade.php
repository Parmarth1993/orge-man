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

<div class="request-quote-section py-md-5 py-4" >
    <div class="full-width-container">
        <div class="panel-body margin-left">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
