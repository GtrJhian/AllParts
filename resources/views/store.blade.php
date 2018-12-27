@extends('components/main')

@section('content')
<body id="page-top">

	@include('components.nav2')

	<div id="wrapper">

		<!-- Sidebar -->
		@include('components.menu2')

		<div id="content-wrapper">

			<div class="container-fluid">

				<!-- Breadcrumbs-->
				<ol class="breadcrumb" style="border-radius: 0px">
					<li class="breadcrumb-item">
						<a href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">Store</a>
					</li>
				</ol>

				<div class="card mb-3">
					<div class="card-header">
						<span class="text5">Sales Invoice No. <a style="color:#c73213">6610</a></span>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
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
												<div class="form-label-group">
													<input type="text" id="customer" class="form-control form-control-sm" placeholder="Sold To:" required="required" autofocus="autofocus">
													<label for="customer">Sold To:</label>
												</div>
											</div>
											<div class="col-4" style="padding-left: 5px">
												<div class="form-label-group">
													<input type="date" id="date" class="form-control form-control-sm" placeholder="Date:" required="required" autofocus="autofocus">
													<label for="date">Date:</label>
												</div>
											</div>
										</div>
										<div class="row justify-content-between" style="padding-top: 3px">
											<div class="col-8" style="padding-right: 5px">
												<div class="form-label-group">
													<input type="text" id="address" class="form-control form-control-sm" placeholder="Address:" required="required" autofocus="autofocus">
													<label for="address">Address:</label>
												</div>
											</div>
											<div class="col-4" style="padding-left: 5px">
												<div class="form-label-group">
													<input type="text" id="ponum" class="form-control form-control-sm" placeholder="P.O. No.:" required="required" autofocus="autofocus">
													<label for="ponum">P.O.  No.:</label>
												</div>
											</div>
										</div>
										<div class="row" style="padding-top: 3px">
											<div class="col-4" style="padding-right: 5px">
												<div class="form-label-group">
													<input type="text" id="TIN" class="form-control form-control-sm" placeholder="TIN No.:" required="required" autofocus="autofocus">
													<label for="TIN">TIN No.:</label>
												</div>
											</div>
											<div class="col-4" style="padding: 0px 5px">
												<div class="form-label-group">
													<input type="text" id="BusStyle" class="form-control form-control-sm" placeholder="Bus Style:" required="required" autofocus="autofocus">
													<label for="BusStyle">Bus Style:</label>
												</div>
											</div>
											<div class="col-4" style="padding-left: 5px">
												<div class="form-label-group">
													<input type="text" id="otherID" class="form-control form-control-sm" placeholder="OSCA/PWD ID No.:" required="required" autofocus="autofocus">
													<label for="otherID">OSCA/PWD ID No.:</label>
												</div>
											</div>
										</div>
										<div class="row" style="padding-top: 3px">
											<div class="col-4" style="padding-right: 5px">
												<div class="form-label-group">
													<input type="text" id="tofp" class="form-control form-control-sm" placeholder="Term of Payment:" required="required" autofocus="autofocus">
													<label for="tofp">Term of Payment:</label>
												</div>
											</div>
											<div class="col-4" style="padding: 0px 5px">
												<div class="form-label-group">
													<input type="text" id="drnum" class="form-control form-control-sm" placeholder="D.R. No.:" required="required" autofocus="autofocus">
													<label for="drnum">D.R. No.:</label>
												</div>
											</div>
											<div class="col-4" style="padding-left: 5px">
												<div class="form-label-group">
													<input type="text" id="otherSig" class="form-control form-control-sm" placeholder="OSCA/PWD Signature:" required="required" autofocus="autofocus">
													<label for="otherSig">OSCA/PWD Signature:</label>
												</div>
											</div>
										</div>

									</div>
									<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
										<div class="row" style="padding-bottom: 15px">
											<div class="col-2">
												<button class="btn btn-md btn-warning" data-target="#store_items" data-toggle="modal"><i class="fa fa-list"></i> Items</button>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col">
												<table class="table table-bordered">
													<thead>
														<th>Item</th>
														<th>Quantity</th>
														<th>UOM</th>
														<th>Unit Price</th>
														<th>Amount</th>
														<th></th>
													</thead>
													<tbody>
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
													</tbody>
												</table>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="offset-7 col-3">
												<h6 style="font-weight: normal;">Total Amount Rendered:</h6>
												<h6 style="font-weight: normal;">Amount Received:</h6>
												<h6 style="font-weight: normal;">Change:</h6>
											</div>
											<div class="col-2 text-right">
												<h6 style="font-weight: normal;">1000</h6>
												<h6 style="font-weight: normal;">800</h6>
												<h6 style="font-weight: normal;">200</h6>
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
	<div class="modal fade" id="store_items" tabindex="-1" role="dialog" aria-labelledby="items" aria-hidden="true">
		<div class="modal-dialog" style="min-width: 1000px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">ITEMS</legend>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<th>Item</th>
									<th>Unit Price</th>
									<th>UOM</th>
									<th>Remaining Stock</th>
									<th></th>
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
		$('.table').DataTable();
	});
</script>
@stop