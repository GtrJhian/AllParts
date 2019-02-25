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
												<a href="" style="border: 1px #127ffb solid;padding: 5px;border-radius: 20%;width: 10px;height: 10px;background-color: #127ffb;color: #fff"><i class="fa fa-eye"></i></button>
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
						<form method="POST" action='/Customer/Create'>
							@csrf
							<p class="text-secondary"><i>Note: <strong style="color:red">*</strong> are required</i></p>
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
									<label for="Address">Address:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='Address' type="text" id="Address" class="form-control form-control" placeholder="Ex: Brgy.South Triangle, Quezon City" required="required" autofocus="autofocus">
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
							<!-- <div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Company">Company:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='Company' type="text" id="Company" class="form-control form-control" placeholder="Ex: AGeekHub" autofocus="autofocus">
									</div>
								</div>
							</div> -->
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="TIN">TIN Number:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='TIN_no' type="number" id="TIN" class="form-control form-control" placeholder="Ex: XXX-XX-XXXX" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="OSCAPWD">OSCA/PWD ID Number:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='OSCA_PWD_ID' type="number" id="OSCAPWD" class="form-control form-control" placeholder="Ex: XXXXXX" autofocus="autofocus">
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
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="view_cus" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
		<div class="modal-dialog" style="min-width: 700px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">About the Customer</legend>
						<hr>
						<div class="row">
							<div class="offset-1 col-3">
								<label>Name:</label>
							</div>
							<div class="offset-2 col-6">
								<label>John Santos</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>Contact No.:</label>
							</div>
							<div class="offset-2 col-6">
								<label>09123456789</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>Address:</label>
							</div>
							<div class="offset-2 col-6">
								<label>Antipolo, Rizal</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>Company:</label>
							</div>
							<div class="offset-2 col-6">
								<label>AGeekHub</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>TIN No.:</label>
							</div>
							<div class="offset-2 col-6">
								<label>XXX-XX-XXXX</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>OSCA/PWD ID :</label>
							</div>
							<div class="offset-2 col-6">
								<label>XXXXXX</label>
							</div>
						</div>
						<hr>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="edit_cus" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog" style="min-width: 700px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">Update Customer Information</legend>
						<hr>
						<p class="text-secondary"><i>Note: <strong style="color:red">*</strong> are required</i></p>
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
								<label for="Address">Address:<strong style="color:red">*</strong></label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input name='Address' type="text" id="Address" class="form-control form-control" placeholder="Ex: Brgy.South Triangle, Quezon City" required="required" autofocus="autofocus">
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
								<label for="Company">Company:</label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input name='Company' type="text" id="Company" class="form-control form-control" placeholder="Ex: AGeekHub" autofocus="autofocus">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom:5px">
							<div class="col-3">
								<label for="TIN">TIN Number:</label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input name='TIN_no' type="number" id="TIN" class="form-control form-control" placeholder="Ex: XXX-XX-XXXX" autofocus="autofocus">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom:5px">
							<div class="col-3">
								<label for="OSCAPWD">OSCA/PWD ID Number:</label>
							</div>
							<div class="offset-1 col-8">
								<div class="form-group">
									<input name='OSCA_PWD_ID' type="number" id="OSCAPWD" class="form-control form-control" placeholder="Ex: XXXXXX" autofocus="autofocus">
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
		$('#customerlist').DataTable({
			ajax: '/Customer/All',
			aoColumnDefs:[
				{
					render : function(data, type, row) {
						return '<button class="btn btn-sm btn-primary hi-icon1" data-target="#view_cus" data-toggle="modal" ><i class="fa fa-eye"><span class="tooltiptext">View</span></i></button>\
								<button class="btn btn-sm btn-primary hi-icon1" data-target="#view_cus" data-toggle="modal"><i class="fa fa-user"><span class="tooltiptext">View</span></i></button>\
								<button class="btn btn-sm btn-primary hi-icon1" data-target="#edit_cus" data-toggle="modal"><i class="fa fa-edit"><span class="tooltiptext">Edit</span></i></button>';
					},
					targets: 2
				},
				{
					render : function(data, type, row){
						return 'CSN-'+(data/100<1?'0':'')+(data/10<1?'0':'')+data;
					},
					targets: 0
				}
			]
		});
	});
</script>
@stop