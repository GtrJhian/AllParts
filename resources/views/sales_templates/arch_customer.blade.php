@extends('components/main')

@section('content')
<body>
	@include('components.nav_sales')
	<div id="wrapper" class="offset1">
		@include('components.menu_sales')
		<div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
					<li class="breadcrumb-item">
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-user" style="font-size:23px"></i> Archive Customers</strong></h6>
					</li>
				</ol>
				<div class="card mb-3">
					<div class="card-body">
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
				<a class="zoom-fab zoom-btn-blue zoom-btn-large tooltip-iventory-blue" href="/customers">
					<i class="fa fa-arrow-left"></i>
					<span class="tooltip-iventorytext-blue">Back</span>
				</a>
			</div>
			@include('components.footer2')
		</div>
	</div>
	<div class="modal fade" id="view_arch_cus" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
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
    <div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="check" aria-hidden="true">
		<div class="modal-dialog" style="min-width: 700px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">Are you sure to restore this item?</legend>
						<hr>
						<div class="row">
							<div class="offset-4 col-1">
								<input type="button" name="Yes" value="Yes" class="btn btn-md btn-success">
							</div>
							<div class="offset-1 scol-1">
								<input type="button" name="No" value="No" class="btn btn-md btn-danger">
							</div>
						</div>
					</div>
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
						<hr>
						<div class="row">
							<div class="offset-4 col-1">
								<input type="button" name="Yes" value="Yes" class="btn btn-md btn-success">
							</div>
							<div class="offset-1 scol-1">
								<input type="button" name="No" value="No" class="btn btn-md btn-danger">
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
						return '<button class="btn btn-sm btn-primary hi-icon1" data-target="#view_arch_cus" data-toggle="modal" ><i class="fa fa-eye"><span class="tooltiptext">View</span></i></button>\
								<button class="btn btn-sm btn-success hi-icon1" data-target="#restore" data-toggle="modal"><i class="fa fa-redo"><span class="tooltiptext">Restore</span></i></button>\
								<button class="btn btn-sm btn-danger hi-icon1" data-target="#double_check" data-toggle="modal"><i class="fa fa-times"><span class="tooltiptext">Remove</span></i></button>';
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