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
										<table class="table table-bordered">
											<thead>
												<th>Quantity</th>
												<th>Unit</th>
												<th>Item</th>
												<th>Unit Price</th>
												<th>Amount</th>
											</thead>
											<tbody>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tbody>
										</table>
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
	<!-- /#wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

</body>
@stop
