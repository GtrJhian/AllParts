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
		<div id="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-1">
						<a href="/selectInventory" class="btn btn-secondary d-block mx-auto back-btn">
							<i class="fa fa-arrow-left back-btn-icon"></i>
						</a>
					</div>
					<div class="col-sm-9">
						<ol class="breadcrumb" style="border-radius: 0px">
							<li class="breadcrumb-item">
								<a href="/inventoryMain" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">SUPPLIER</a>
							</li>
						</ol>
					</div>
					<div class="col-sm-2">
						<a href="/archiveInventory" class="btn btn-primary">Archive Supplier</a>
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="table-responsive">
									<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
										<thead>
											<th>Company Name</th>
											<th>Address</th>
											<th>Telephone Number</th>
											<th>Company E-mail</th>
											<th>Company Agent</th>
											<th>Agent Contact Number</th>
											<th style="width: 15%;">Action</th>
										</thead>
										<tbody>
											
											<tr id="">
												
												<td><p style="color:red"><b>Sample Company</b></p></td>
												
												<td>Sample Address</td>
												<td>
													Sample Telephone
												</td>
												<td>
													Sample email@e.com
												</td>
												<td>
													Sample Agent
												</td>
											<td>Sample Contact Number</td>
											<td>
												<button class="view_btn btn btn-primary btn-action-invt">
													<i class="fa fa-eye"></i>
												</button>
												
												<button class="update_item_btn btn btn-primary btn-action-invt">
													<i class="fa fa-edit"></i>
												</button>
												
												<button class="archive_btn btn btn-danger btn-action-invt">
													<i class="fa fa-times"></i>
												</button>
											</td></tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="row">
					<div class="d-block mx-auto">
						<a href="/archiveInventory" class="btn btn-primary">Archive Inventory</a>
					</div>
				</div> -->
			</div>
			@include('components.footer2')
		</div>
	</div>

	{{-- Buttom Icon --}}
	<div class="zoom">
		<a class="zoom-fab zoom-btn-green zoom-btn-large tooltip-iventory-green" data-toggle="modal" data-target="#supplyAdd">
			<i class="fa fa-plus"></i>
			<span class="tooltip-iventorytext-green">ADD</span>
		</a>
	</div>

	

	<!---REMOVE ITEM FORM ----->
	@include('Supply.Modals.removemodal')
	<!---UPDATE ITEM FORM ----->
	@include('Supply.Modals.updatemodal')
	<!-- CREATE INVENTORY MODAL -->
	@include('Supply.Modals.addmodal')


	

	</body>
	<!-- @stop

	@section('script') -->
	

@stop