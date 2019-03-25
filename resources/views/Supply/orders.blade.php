@extends('components/main')

@section('content')
<body id="page-top">

	@include('components.nav2')

	<div id="wrapper">

		<!-- Sidebar -->
		@include('components.menu3')

		<div id="content-wrapper">

			<div class="container-fluid">
			<ol class="breadcrumb" style="border-radius: 0px">
					<li class="breadcrumb-item">
						<a href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">PURCHASE ORDERS</a>
					</li>
				</ol> 
				<div class="card mb-3">
					<div class="card-header">
						<span class="text5">Purchase Order No. <a style="color:#c73213">5550</a></span>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<!-- <nav>
									<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
										<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Supplier Information</a>
										<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Orders</a>
									</div>
								</nav> -->
								<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
									<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										<div class="row justify-content-between" style="padding-top: 3px">
											<div class="col-8" style="padding-right: 5px">
												<h6 style="margin-bottom:3px">Order From:</h6>
												<div class="form-group">
													<select id="supplier" class="form-control form-control-sm" placeholder="Order From:" required="required" autofocus="autofocus">
													</select>
													
												</div>
											</div>
											<div class="col-4" style="padding-left: 5px">
												<div class="form-label-group">
													<input type="date" id="orderdate" class="form-control form-control" placeholder="Date:" required="required" autofocus="autofocus">
													<label for="date">Date:</label>
												</div>
											</div>
										</div>
							
									
									<h6 style="margin-bottom:3px">Please deliver to us the following goods in accordance with the prices indicated herein:</h6>
										<div class="row" style="padding-bottom: 10px">
											<div class="col-2">
												<button class="btn btn-md btn-primary" data-target="#store_items" data-toggle="modal"><i class="fa fa-list"></i> Items</button>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col">
												<table class="table table-bordered" id="items_added">
													<thead>
														<th>Quantity</th>
														<th>Unit</th>
														<th>Description of Goods</th>
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
										<div class="col-2" style="padding-right: 2px">
												
												<div class="form-group">
												<h6 style="margin-bottom:3px">Reference Invoce No:</h6>
												<input type='number' class="form-control-sm form-control" min=0 id="referecenum">	
												</div>
											</div>
										<!-- <div class="row">
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
												<input type='number' class="form-control-sm form-control text-right" min=0 step=0.01 id="amountReceived">
												<h6 style="font-weight: normal;padding-top:5px" id=change>0</h6>
												<h6 style="font-weight: normal;">0</h6>
											</div>
										</div>-->
										<hr> 
										<div class="row">
											<div class="col-2 offset-5" style="float:right">
												<input type="submit" name="Pay" class="btn btn-success">
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="card-footer small text-muted">Checked and Approved By: <span style="font-weight: bold">Juan Dela Cruz</span></div>
				</div>
			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			@include('components.footer2')

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

</body>
@stop
