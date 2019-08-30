@extends('layouts.app-header-public-login')

@section('content')

<!-- banner -->
<section data-spy="scroll"  class="inner_banner bg-cover banner-overlay-black-bg" style="background:url('{{ asset('images/home/inner-page-banner.jpg')}}") center center no-repeat;">
    <div class="container">
        <div class="row align-content-center">
            <div class="col-md-12 col-lg-10 offset-lg-1 align-self-center">
                <div class="slider-info text-left pt-md-5 mt-md-5 pt-lg-5 mt-lg-5 pt-4">
                    <h2>Login</h2>                  
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<!-- //banner -->  

<div class="request-quote-section py-md-5 py-4" style="background: #f4f4f4;">
    <div class="container">
		<div class="row">
            <div class="col-md-6 col-lg-6 pr-md-5 offset-md-3 offset-lg-3">
				<div class="panel-body margin-left login-box">
					<form class="form-horizontal" method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-12 control-label">E-Mail Address</label>

							<div class="col-md-12">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-12 control-label">Password</label>

							<div class="col-md-12">
								<input id="password" type="password" class="form-control" name="password" required>

								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
									<label class="custom-control-label" for="customCheck">Remember Me</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
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
	</div>
</div>
@endsection
