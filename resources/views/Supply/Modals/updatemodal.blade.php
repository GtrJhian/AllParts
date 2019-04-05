@extends('components/main')

@section('content')
<script>
	var msg = '{{Session::get('alert')}}';
	var exist = '{{Session::has('alert')}}';
	var evalmsg = msg.replace(/(&quot\;)/g,"\"");
	if(exist){
		alert(evalmsg);
	}
</script>
<body>
	@include('components.nav2')
	<div id="wrapper">
		@include('components.menu3')
						<form id="itemCreate" action="{{url('/supplier/status/update')}}" method="post">
						<input type='hidden' name='id' class='modal_hiddenid' value='1'>
						{{ csrf_field() }}
						<!-- <input type="hidden" value="" id="supid" name="uid"> -->

						<div class="form-horizontal">
							<div class="row">
								<label class="col-sm-6">Company Name: </label>
								<div class="col-sm-12">
									<input type="text" id="companyname" name="companyname" required class="form-control" value="{{$supply->Company_Name}}">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-6">Company Address: </label>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<textarea class="form-control" id="companyadd" name="companyadd" required>{{$supply->Company_Address}}</textarea>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-6">Company Number: </label>
								<div class="col-sm-12">
									<input type="text" id="companynumber" name="companynumber" required class="form-control" value="{{$supply->Company_Contact}}">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-6">Company E-mail: </label>
								<div class="col-sm-12">
									<input type="text" id="companyemail" name="companyemail" required class="form-control" value="{{$supply->Company_Email}}">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-12">
									<input class="btn btn-success btn-block" type="submit" name="uisubmit" value="Update Supplier">
								</div>
							</div>
						</div>
					</form>
			