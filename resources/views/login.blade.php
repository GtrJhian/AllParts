@extends('components/main')

@section('content')
<body style="font-family: 'Nunito';">
	<div class="container" style="padding-top:5px;display: block;">
		<div class="row">
			<div class="col-12">
				
			</div>
			<div class="col-md-6 offset-3">
				<div class="card card-login mx-auto mt-5" style="border-radius: 1px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
					<div class="card-body">
						<div class="container-fluid">
							<div class="row">
								<img src="{{asset('vendor/img/allparts.png')}}" style="width: 300px;height: 200px;" class="centering">	
							</div>
							<form>
								<div class="form-group" style="padding-top: 10px">
									<div class="form-group">
										<label for="inputEmail">Username:</label>
										<input type="email" id="inputEmail" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
									</div>
								</div>
								<div class="form-group">
									<div class="form-group">
										<label for="inputPassword">Password:</label>
										<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
									</div>
								</div>
								<a class="btn btn-primary btn-block" href="">Login</a>
							</form>
							<div class="text-center">
								<a class="d-block small" href="forgot-password.html" style="padding-top: 5px">Forgot Password?</a>
								<span class="d-block small mt-3" href="">© AllParts Hydraulics Industrial Corporation 2018</span>
								<span class="d-block small" href="">All Rights Reserved.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
@stop