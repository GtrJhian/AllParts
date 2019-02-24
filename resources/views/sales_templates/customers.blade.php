@extends('components/main')

@section('content')
<body>
	@include('components.nav_sales')
	<div id="wrapper">
		@include('components.menu_sales')
		<div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb" style="border-radius: 0px">
					<li class="breadcrumb-item">
						<a href="" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">CUSTOMERS</a>
					</li>
				</ol>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-2" style="padding-bottom:10px">
								<button class="btn btn-md btn-primary" data-target="#add_customer" data-toggle="modal"><i class="fa fa-plus"></i> Add Customer</button>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="table-responsive">
									<table class="table table-striped" id="customerlist" width="100%" cellspacing="0">
										<thead>
											<th>Customer No.</th>
											<th>Customer Name</th>
											<th>Action</th>
										</thead>
										<tbody>
											<td>CSN-001</td>
											<td>John Santos</td>
											<td>
												<a href="" style="border: 1px #127ffb solid;padding: 5px;border-radius: 20%;width: 10px;height: 10px;background-color: #127ffb;color: #fff"><i class="fa fa-eye"></i></a>
												<a href="" style="border: 1px #127ffb solid;padding: 5px;border-radius: 20%;width: 10px;height: 10px;background-color: #127ffb;color: #fff"><i class="fa fa-user"></i></a>
												<a href="" style="border: 1px #127ffb solid;padding: 5px;border-radius: 20%;width: 10px;height: 10px;background-color: #127ffb;color: #fff"><i class="fa fa-edit"></i></a>
											</td>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('components.footer2')
		</div>
	</div>
	<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="customer" aria-hidden="true">
		<div class="modal-dialog" style="min-width: 700px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">Add Customer</legend>
						<hr>
						<p class="text-secondary"><i>Note: <strong style="color:red">*</strong> are required</i></p>
						<div class="row" style="padding-bottom:5px">
							<div class="col-3">
								<label for="Fname">First Name:<strong style="color:red">*</strong></label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input type="text" id="Fname" class="form-control form-control" placeholder="Ex: Juan" required="required" autofocus="autofocus">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom:5px">
							<div class="col-3">
								<label for="Mname">Middle Name:</label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input type="text" id="Mname" class="form-control form-control" placeholder="Ex: Santos" required="required" autofocus="autofocus">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom:5px">
							<div class="col-3">
							<label for="Lname">Last Name:<strong style="color:red">*</strong></label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input type="text" id="Lname" class="form-control form-control" placeholder="Ex: Dela Cruz" required="required" autofocus="autofocus">									
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom:5px">
							<div class="col-3">
								<label for="Address">Address:<strong style="color:red">*</strong></label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input type="text" id="Address" class="form-control form-control" placeholder="Ex: Brgy.South Triangle, Quezon City" required="required" autofocus="autofocus">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom:5px">
							<div class="col-3">
								<label for="Contact">Contact Number:<strong style="color:red">*</strong></label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input type="number" id="Contact" class="form-control form-control" placeholder="Ex: 09123456789" required="required" autofocus="autofocus">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom:5px">
							<div class="col-3">
								<label for="TIN">TIN Number:</label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input type="number" id="TIN" class="form-control form-control" placeholder="Ex: XXX-XX-XXXX" autofocus="autofocus">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom:5px">
							<div class="col-3">
								<label for="OSCAPWD">OSCA/PWD ID Number:</label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input type="number" id="OSCAPWD" class="form-control form-control" placeholder="Ex: XXXXXX" autofocus="autofocus">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="offset-4 col-1">
								<input type="submit" class="btn btn-md btn-success">
							</div>
							<div class="offset-1 scol-1">
								<input type="reset" class="btn btn-md btn-danger">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#customerlist').DataTable();
	});
</script>
@stop