@extends('components/main')

@section('content')
<body id="page-top">

	@include('components.nav_sales')

	<div id="wrapper" class="offset1">

		<!-- Sidebar -->
		@include('components.menu_sales')

		<div id="content-wrapper">

			<div class="container">

				<!-- Breadcrumbs-->
				<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
					<li class="breadcrumb-item">
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-store" style="font-size:23px"></i> Store</strong></h6>
					</li>
				</ol>

				<div class="card mb-3">
					<div class="card-header">
						<span class="text5">Sales Invoice No. <a style="color:#c73213">6610</a></span>
					</div>
					<div class="card-body">
						
							
								<nav>
									<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
										<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Customer Information</a>
										<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Items</a>
									</div>
								</nav>
								<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
									<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										<div class="row justify-content-between">
											<div class="col-8" style="padding-right: 5px">
												<label style="margin-bottom:0px;font-size:12px">Sold To:</label>
												<div class="form-group">
													<!--
													<input type="select" id="customer" class="form-control form-control-sm" placeholder="Sold To:" required="required" autofocus="autofocus">
													<label for="customer">Sold To:</label>
													-->
													<select id="customer" class="input_change" placeholder="Sold To:" required="required" autofocus="autofocus">
													</select>
													
												</div>
											</div>
											<div class="col-4" style="padding-left: 5px">
												<div class="form-label-group">
													<input type="date" id="date" class="input_change" placeholder="Date:" required="required" autofocus="autofocus">
													<label for="date">Date:</label>
												</div>
											</div>
										</div>
										<div class="row justify-content-between" style="padding-top: 3px">
											<div class="col-8" style="padding-right: 5px">
												<div class="form-label-group">
													<input type="text" id="address" class="input_change" placeholder="Address:" required="required" autofocus="autofocus">
													<label for="address">Address:</label>
												</div>
											</div>
											<div class="col-4" style="padding-left: 5px">
												<div class="form-label-group">
													<input type="text" id="ponum" class="input_change" placeholder="P.O. No.:" required="required" autofocus="autofocus">
													<label for="ponum">P.O.  No.:</label>
												</div>
											</div>
										</div>
										<div class="row" style="padding-top: 3px">
											<div class="col-4" style="padding-right: 5px">
												<div class="form-label-group">
													<input type="text" id="TIN" class="input_change" placeholder="TIN No.:" required="required" autofocus="autofocus">
													<label for="TIN">TIN No.:</label>
												</div>
											</div>
											<div class="col-4" style="padding: 0px 5px">
												<div class="form-label-group">
													<input type="text" id="BusStyle" class="input_change" placeholder="Bus Style:" required="required" autofocus="autofocus">
													<label for="BusStyle">Bus Style:</label>
												</div>
											</div>
											<div class="col-4" style="padding-left: 5px">
												<div class="form-label-group">
													<input type="text" id="otherID" class="input_change" placeholder="OSCA/PWD ID No.:" required="required" autofocus="autofocus">
													<label for="otherID">OSCA/PWD ID No.:</label>
												</div>
											</div>
										</div>
										<div class="row" style="padding-top: 3px">
											<div class="col-4" style="padding-right: 5px">
												<label style="margin-bottom:0px;font-size:12px;padding:0px">Term of Payment:</label>
												<div class="form-group">
													<select id="tofp" class="input_change" required="required" autofocus="autofocus" style="padding:0px">
														<option>Cash</option>
														<option>Check</option>
														<option>15 Days</option>
														<option>30 Days</option>
														<option>45 Days</option>
														<option>60 Days</option>
														<option>90 Days</option>
														<option>120 Days</option>
													</select>
													<!-- <label for="tofp">Term of Payment:</label> -->
												</div>
											</div>
											<div class="col-4" style="padding: 0px 5px">
												<div class="form-label-group">
													<input type="text" id="drnum" class="input_change" placeholder="D.R. No.:" required="required" autofocus="autofocus">
													<label for="drnum">D.R. No.:</label>
												</div>
											</div>
											<div class="col-4" style="padding-left: 5px">
												<div class="form-label-group">
													<input type="text" id="otherSig" class="input_change" placeholder="OSCA/PWD Signature:" required="required" autofocus="autofocus">
													<label for="otherSig">OSCA/PWD Signature:</label>
												</div>
											</div>
										</div>

									</div>
									<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
										<div class="row" style="padding-bottom: 10px">
											<div class="col-1">
												<button class="btn btn-md btn-primary" data-target="#store_items" data-toggle="modal"><i class="fa fa-list"></i> Items</button>
											</div>
											<!-- <div class="col-2">
												<button class="btn btn-md btn-primary" data-target="#store_packages" data-toggle="modal"><i class="fa fa-list"></i> Packages</button>
											</div> -->
										</div>
										<hr>
										<div class="row">
											<div class="col">
												<table class="table table-bordered" id="items_added">
													<thead>
														<th>Item</th>
														<th>Quantity</th>
														<th>UOM</th>
														<th>Unit Price</th>
														<!-- <th>Discount</th> -->
														<th>Amount</th>
														<th></th>
													</thead>
													<tbody>
														<!--
														<tr>
															<td>Gauge Hose</td>
															<td>3</td>
															<td>per Meter</td>
															<td>50</td>
															<td>150</td>
															<td class="text-center">
																<a><span><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></span></a>
															</td>
														</tr>
														-->
													</tbody>
												</table>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="offset-7 col-3">
												<h6 style="font-weight: normal;">VATable Sales:</h6>
												<h6 style="font-weight: normal;">VATable Amount:</h6>
												<h6 style="font-weight: normal;">Total Amount Rendered: </h6>
												<h6 style="font-weight: normal;">Amount Received:</h6>
												<h6 style="font-weight: normal;padding-top:5px">Change:</h6>
												<h6 style="font-weight: normal;">Balance:</h6>
											</div>
											<div class="col-2 text-right">
												<h6 style="font-weight: normal;">900</h6>
												<h6 style="font-weight: normal;">100</h6>
												<h6 style="font-weight: normal; " id="amountRendered">1000</h6>
												<input type='number' class="input_change text-right" min=0 step=0.01 id="amountReceived">
												<h6 style="font-weight: normal;padding-top:5px" id=change>0</h6>
												<h6 style="font-weight: normal;">0</h6>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-2 offset-5" style="float:right">
												<input type="submit" name="Pay" class="btn btn-success">
											</div>
										</div>
									</div>
								</div>
								
						
					</div>
					<div class="card-footer small text-muted">Issued By: <span style="font-weight: bold">Juan Dela Cruz</span></div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			@include('components.footer2')

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- <div class="modal fade" id="store_packages" tab-index="-1" role="dialog" aria-labelledby="packages" aria-hidden="true">
		<div class="modal-dialog" style="min-width:1000px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">Packages</legend>
						<div class="table-responsive">
							<table class="table table-striped" id="packagelist" style="width:100%;">
								<thead>
									<th>Code</th>
									<th>Description</th>
									<th>Package Content/s</th>
									<th>Brand</th>
									<th>Category</th>
									<th>Price</th>
									<th>Remaining Stock</th>
									<th>Action</th>
								</thead>
								<tbody>
									<tr>

									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="modal fade" id="store_items" tabindex="-1" role="dialog" aria-labelledby="items" aria-hidden="true">
		<div class="modal-dialog" style="min-width: 1000px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">Items</legend>
						<div class="table-responsive">
							<table class="table table-striped" id="itemlist" style='width:100%;' >
								<thead>
									<th>Item</th>
									<th>Unit Price</th>
									<th>UOM</th>
									<th>Remaining Stock</th>
									<th>Action</th>
								</thead>
								<tbody>
									<tr>
										<td>Gauge Hose</td>
										<td>50</td>
										<td>per Meter</td>
										<td>50</td>
										<td class="text-center">
											<a><span><button class="btn btn-primary"><i class="fa fa-plus"></i></button></span></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /#wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

</body>
@stop
@section('script')

<script type="text/javascript">
	
	$(document).ready(function(){
		
		$('#itemlist').DataTable({
			ajax: "Store/json/itemlistdt",
			aoColumnDefs : [
				{
					render : function( data , type , row){
						return '<a><span><button class="btn btn-primary" id = item'+data+' onclick = "addToCart('+data+')"><i class="fa fa-plus"></i></button></span></a>';
					},
					targets : 4
				}
			]
		});
		$('#items_added').DataTable({
			aoColumnDefs : [
				{
					render : function(data, type , row){
						return '<input name = "Quantity" class = "form form-control" type="number" step=1 min=1 value = 1 onchange = "quantityChange('+data+')"> ';
					},
					targets : 1
				},
				{
					render : function(data, type , row){
						return '<a><span><button class="btn btn-sm btn-danger" id = item'+data+' onclick="removeItem('+data+')"><i class="fa fa-times"></i></button></span></a>';
					},
					targets : 5
				}
			],
			"bFilter": false,
			"bInfo": false
        });
		
		$('#amountReceived').change(computeTotal);

		$('#customer').select2({
			// placeholder: "Sold to:",
			ajax: {
				url : '/Customer/All'
			}
			
		});

		$('#customer').change(function(){
			$.ajax('/Customer/id/'+$(this).val()).done(function(data){
				customer = JSON.parse(data);
				$('#address').val(customer.Address);
				$('#ponum').val(customer.TIN_no);
				$('#TIN').val(customer.TIN_no);
				$('#BusStyle').val(customer.TIN_no);
				$('#otherID').val(customer.OSCA_PWD_ID);
			});
		});
	});
	function addToCart(id){
		//console.log(id);
		row = $('#itemlist').DataTable().row($('#item'+id).parents('tr'));
		data = row.data();
		row.remove().draw();
		row = [data[0], data[4] ,data[2], data[1], data[1], data[4]];
		$('#items_added').DataTable().row.add(row).draw();
		computeTotal();
	}
	function removeItem(id){
		$('#items_added').DataTable().row($('#item'+id).parents('tr')).remove().draw();
		$.ajax('/Store/json/item/'+id).done(function(data){
			data = JSON.parse(data);
			row = [
				data.Item_Code,
				data.Item_Price,
				data.Item_Unit,
				data.Item_Quantity,
				data.Item_ID
			];
			$('#itemlist').DataTable().row.add(row).draw();
			computeTotal();
		});
	}
	function quantityChange(id){
		//console.log($('#item'+id));
		table = $('#items_added').DataTable();
		tr = $('#item'+id).parents('tr');
		quantity = tr.find('input[name=Quantity]').val();
		row = table.row(tr).data();
		table.cell(tr,4).data((quantity * row[3]).toFixed(2));
		computeTotal();
		//row[]
	}
	function computeTotal(){
		table = $('#items_added').DataTable();
		total=0;
		cols=table.columns(4).data();
		for(x=0; x<cols[0].length ; x++){
			total+=parseFloat(cols[0][x]);
		}
		$('#amountRendered')[0].innerText = total.toFixed(2);
		$('#change')[0].innerText = ($('#amountReceived').val()-total).toFixed(2);
	}
	
</script>
@stop