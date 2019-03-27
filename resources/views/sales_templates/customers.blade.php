


@extends('components/main')

@section('content')

<meta name = 'csrf_token' content = '{{csrf_token()}}'/>

<body>
	@include('components.nav_sales')
	<div id="wrapper" class="offset1">
		@include('components.menu_sales')
		<div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
					<li class="breadcrumb-item">
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-user" style="font-size:23px"></i> Customers</strong></h6>
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
			<div class="zoom">
				<a class="zoom-fab zoom-btn-blue zoom-btn-large tooltip-iventory-blue" href="/arch_customer">
					<i class="fa fa-book"></i>
					<span class="tooltip-iventorytext-blue">Archive</span>
				</a>
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
								<label >Name:</label>
							</div>
							<div class="offset-2 col-6">
								<label id = 'view_Name'>John Santos</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>Contact No.:</label>
							</div>
							<div class="offset-2 col-6">
								<label id = 'view_Contact'>09123456789</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>Address:</label>
							</div>
							<div class="offset-2 col-6">
								<label id = 'view_Address'>Antipolo, Rizal</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>Company:</label>
							</div>
							<div class="offset-2 col-6">
								<label id = 'view_Company'>AGeekHub</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>TIN No.:</label>
							</div>
							<div class="offset-2 col-6">
								<label id = 'view_TIN'>XXX-XX-XXXX</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-3">
								<label>OSCA/PWD ID :</label>
							</div>
							<div class="offset-2 col-6">
								<label id = 'view_PWD'>XXXXXX</label>
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
					<form method="POST" action = 'Customer/update'>
						@csrf
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
										<input name='F_Name' type="text" id="update_Fname" class="form-control form-control" placeholder="Ex: Juan" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Mname">Middle Name:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='M_Name' type="text" id="update_Mname" class="form-control form-control" placeholder="Ex: Santos" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Lname">Last Name:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='L_Name' type="text" id="update_Lname" class="form-control form-control" placeholder="Ex: Dela Cruz" required="required" autofocus="autofocus">									
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Address">Address:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='Address' type="text" id="update_Address" class="form-control form-control" placeholder="Ex: Brgy.South Triangle, Quezon City" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Contact">Contact Number:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='Contact_No' type="number" id="update_Contact" class="form-control form-control" placeholder="Ex: 09123456789" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Company">Company:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='Company' type="text" id="update_Company" class="form-control form-control" placeholder="Ex: AGeekHub" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="TIN">TIN Number:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='TIN_no' type="number" id="update_TIN" class="form-control form-control" placeholder="Ex: XXX-XX-XXXX" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="OSCAPWD">OSCA/PWD ID Number:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='OSCA_PWD_ID' type="number" id="update_OSCAPWD" class="form-control form-control" placeholder="Ex: XXXXXX" autofocus="autofocus">
									</div>
								</div>
							</div>
							<input name='id' id = 'update_id' hidden>
							<div class="row">
								<div class="offset-4 col-1">
									<input type="submit" class="btn btn-md btn-success">
								</div>
								<div class="offset-1 scol-1">
									<input type="reset" class="btn btn-md btn-danger">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
	<div class="modal fade" id="double_check" tabindex="-1" role="dialog" aria-labelledby="check" aria-hidden="true">
		<div class="modal-dialog" style="min-width: 700px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">Are you sure to delete this customer?</legend>
						<input id = 'delete_id' hidden> 
						<hr>
						<div class="row">
							<div class="offset-4 col-1">
								<input type="button" name="Yes" value="Yes" class="btn btn-md btn-success" onclick = "confirmedDelete()">
							</div>
							<div class="offset-1 scol-1">
								<input type="button" name="No" value="No" class="btn btn-md btn-danger" data-target="#double_check" data-toggle='modal'>
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
						return '<button class="btn btn-sm btn-primary hi-icon1" data-target="#view_cus"  onclick = "viewCustomer('+row[0]+')"><i class="fa fa-eye"><span class="tooltiptext">View</span></i></button>\
								<button class="btn btn-sm btn-primary hi-icon1" data-target="#edit_cus" onclick = "updateCustomer('+row[0]+')"><i class="fa fa-edit"><span class="tooltiptext">Edit</span></i></button>\
								<button id = "btnDelete'+row[0]+'" class="btn btn-sm btn-danger hi-icon1" data-target="#double_check" onclick = "deleteCustomer('+row[0]+')"><i class="fa fa-times"><span class="tooltiptext">Remove</span></i></button>';
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

	function viewCustomer(id){
		$.ajax('Customer/id/'+id).done(function(response){
			customer = JSON.parse(response);
			$('#view_Name').text( customer.F_Name + ' ' + customer.M_Name + ' ' + customer.L_Name);
			$('#view_Contact').text(customer.Contact_No);
			$('#view_Address').text(customer.Address);
			$('#view_Company').text(customer.Company);
			$('#view_TIN').text(customer.TIN_no);
			$('#view_PWD').text(customer.OSCA_PWD_ID);
			$('#view_cus').modal('show');
		});
	}

	function updateCustomer(id){
		$.ajax('Customer/id/'+id).done(function(response){
			customer = JSON.parse(response);
			$('#update_Fname').val(customer.F_Name);
			$('#update_Mname').val(customer.M_Name);
			$('#update_Lname').val(customer.L_Name);
			$('#update_Contact').val(customer.Contact_No);
			$('#update_Address').val(customer.Address);
			$('#update_Company').val(customer.Company);
			$('#update_TIN').val(customer.TIN_no);
			$('#update_OSCAPWD').val(customer.OSCA_PWD_ID);
			$('#update_id').val(customer.Cus_ID);
			$('#edit_cus').modal('toggle');

		});
	}

	function deleteCustomer(id){
		$('#delete_id').val(id);
		$('#double_check').modal('toggle');
	}

	function confirmedDelete(){
		csrf_token = $('meta[name="csrf_token"]').attr('content');
		console.log(csrf_token);
		$.post({
			url: 'Customer/delete',
			data: {
				_token : csrf_token,
				id : $('#delete_id').val()
			}
		}).done(function(id){
			$('#customerlist').DataTable().row($('#btnDelete'+id).parents('tr')).remove().draw();
			$('#double_check').modal('toggle');
		});
	}

</script>
@stop