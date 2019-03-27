@extends('components/main')

@section('content')
<body>
@include('components.nav_sales')
<div class="container-fluid offset1">
    <ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
	    <li class="breadcrumb-item">
			<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-user-cog" style="font-size:23px"></i> My Settings</strong></h6>
		</li>
    </ol>
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row" style="padding-bottom:5px">
				<div class="col-3">
					<label for="Fname">First Name:<strong style="color:red">*</strong></label>
				</div>
				<div class="offset-1 col-8">
					<div class="form-group">
						<input name='F_Name' type="text" id="Fname" class="form-control form-control" placeholder="Ex: Juan" required="required" autofocus="autofocus">
					</div>
				</div>
			</div>
			<div class="row" style="padding-bottom:5px">
				<div class="col-3">
					<label for="Mname">Middle Name:</label>
				</div>
				<div class="offset-1 col-8">
					<div class="form-group">
						<input name='M_Name' type="text" id="Mname" class="form-control form-control" placeholder="Ex: Santos" required="required" autofocus="autofocus">
					</div>
				</div>
			</div>
			<div class="row" style="padding-bottom:5px">
				<div class="col-3">
					<label for="Lname">Last Name:<strong style="color:red">*</strong></label>
				</div>
				<div class="offset-1 col-8">
					<div class="form-group">
						<input name='L_Name' type="text" id="Lname" class="form-control form-control" placeholder="Ex: Dela Cruz" required="required" autofocus="autofocus">									
					</div>
				</div>
			</div>
			<div class="row" style="padding-bottom:5px">
				<div class="col-3">
					<label for="Contact">Contact Number:<strong style="color:red">*</strong></label>
				</div>
			    <div class="offset-1 col-8">
					<div class="form-group">
						<input name='Contact_No' type="number" id="Contact" class="form-control form-control" placeholder="Ex: 09123456789" required="required" autofocus="autofocus">
					</div>
				</div>
			</div>
            <div class="row" style="padding-bottom:5px">
				<div class="col-3">
					<label for="username">Username:<strong style="color:red">*</strong></label>
				</div>
				<div class="offset-1 col-8">
					<div class="form-group">
						<input name='username' type="number" id="username" class="form-control form-control" placeholder="Ex: jdelacruz" autofocus="autofocus">
					</div>
				</div>
			</div>
            <div class="row" style="padding-bottom:5px">
				<div class="col-3">
					<label for="password">Old Password:<strong style="color:red">*</strong></label>
				</div>
				<div class="offset-1 col-8">
					<div class="form-group">
			    		<input name='password' type="password" id="password" class="form-control form-control" placeholder="Ex: ******" autofocus="autofocus">
					</div>
				</div>
			</div>
			<div class="row" style="padding-bottom:5px">
				<div class="col-3">
					<label for="password">New Password:<strong style="color:red">*</strong></label>
				</div>
				<div class="offset-1 col-8">
					<div class="form-group">
			    		<input name='password' type="password" id="password" class="form-control form-control" placeholder="Ex: ******" autofocus="autofocus">
					</div>
				</div>
			</div>
            <div class="row" style="padding-bottom:5px">
				<div class="col-3">
					<label for="cpassword">Confirm Password:<strong style="color:red">*</strong></label>
				</div>
				<div class="offset-1 col-8">
					<div class="form-group">
						<input name='cpassword' type="password" id="cpassword" class="form-control form-control" placeholder="Ex: ******" autofocus="autofocus">
					</div>
				</div>
            </div>
            <div class="row">
				<div class="offset-5 col-2">
					<input type="submit" name="Save" class="btn btn-md btn-success">
				</div>
			</div>
        </div>
    </div>
</div>
<div class="zoom">
	<a class="zoom-fab zoom-btn-blue zoom-btn-large tooltip-iventory-blue" href="/">
		<i class="fa fa-arrow-left"></i>
		<span class="tooltip-iventorytext-blue">Back</span>
	</a>
</div>
@include('components.footer2')
</body>
@stop

@section('script')
@stop