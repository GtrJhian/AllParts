@extends('components/main')

@section('content')
<body id="page-top">

	@include('components.nav_sales')

	<div id="wrapper" class="offset1">

		<!-- Sidebar -->
		@include('components.menu3')

		<div id="content-wrapper">

			<div class="container-fluid">
				
				<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
					<li class="breadcrumb-item">
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-tasks" style="font-size:23px"></i> PURCHASE ORDERS</strong>
						</h6>
					</li>
				</ol>
				<div class="card mb-3">
					
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="table-responsive">
									<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
										<thead>
											<th>No.</th>
											<th>Ordered From</th>
											<th>Date</th>
											<th>Amount</th>
											<!-- <th style="width: 15%;">Action</th> -->
										</thead>
										<tbody>
											@foreach($data['purchasing'] as $purchase)
											<tr>

												<td><p style="color:red"><b>{{$purchase->Order_No}}</b></p></td>
												<td>{{$purchase->supplier->Company_Name}}</td>
												<td>{{$purchase->Order_Date}}</td>
												<td>{{$purchase->Amount}}</td>
												<!-- <td>
													<a class="update_item_btn btn btn-primary btn-action-invt" data-toggle="modal" data-target="#updatesupplier">
														<i class="fa fa-edit"></i>
													</a>

													<a href="" class="archive_btn btn btn-danger btn-action-invt" >  
														
														<i class="fa fa-times"></i>
													</a>
												</td> -->

											</tr>
											@endforeach
											
										</tbody>
									</table>
								</div>
							</div>	
						</div>
					</div>

				</div>
			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			@include('components.footer2')

		</div>
		<!-- /.content-wrapper -->

	</div>
	<div class="zoom">
		<a class="zoom-fab zoom-btn-green zoom-btn-large tooltip-iventory-green" data-toggle="modal" data-target="#addItemSupply">
			<i class="fa fa-plus"></i>
			<span class="tooltip-iventorytext-green">ADD</span>
		</a>
	</div>
	<!---ADD ITEM FORM ----->
	@include('Supply.Modals.addPurchaseOrder')


	<!-- /#wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

</body>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#itemlist').DataTable();
	});
</script>


@stop