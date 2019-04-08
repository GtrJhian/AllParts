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
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-tasks" style="font-size:23px"></i> PURCHASING</strong>
						</h6>
					</li>
				</ol>
				<div class="card mb-3">
					
					<div class="card-body">
						<!-- Tabs  -->
						<div class="row" style="margin-bottom:20px">
							<div class="col-md-12">
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
									@if($data['archive'] != true)
									<a class="nav-item nav-link active" id="pend" data-toggle="tab" href="#pending" role="tab"  aria-selected="true"> <i class="fa fa-file"></i>   Purchase Requisition</a>
									<a class="nav-item nav-link" id="appr" data-toggle="tab" href="#approved" role="tab"  aria-selected="false"> <i class="	fa fa-newspaper"></i>   Purchase Order</a>
									<a class="nav-item nav-link" id="deli" data-toggle="tab" href="#delivered" role="tab"  aria-selected="false"> <i class="fa fa-truck"></i>   Delivered</a>
									@else
									<a class="nav-item nav-link active" id="arch" data-toggle="tab" href="#archived" role="tab"  aria-selected="false"> <i class="fa fa-trash"></i>   Archived</a>
									@endif
								</div>
							</div>
						</div>
						<!-- ---- -->
						<div class="tab-content" id="nav-tabContent" style="padding: 0px 10px">
							@if($data['archive'] != true)
							<div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="nav-pending-tab">
								<div class="row">
									<div class="col">
										<div class="table-responsive">
											<table class="table table-striped" id="itemlist_pending" width="100%" cellspacing="0">
												@include('Supply.ordersdatatable',[$tableData = $data['purchasing_requistion'], $archive = $data['archive'], $status = 0])
											</table>
										</div>
									</div>	
								</div>
							</div>

							<div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="nav-approved-tab">
								<div class="row">
									<div class="col">
										<div class="table-responsive">
											<table class="table table-striped" id="itemlist_approved" width="100%" cellspacing="0">
												@include('Supply.ordersdatatable',[$tableData = $data['purchasing_approved'], $archive = $data['archive'], $status = 1])
											</table>
										</div>
									</div>	
								</div>
							</div>

							<div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="nav-delivered-tab">
								<div class="row">
									<div class="col">
										<div class="table-responsive">
											<table class="table table-striped" id="itemlist_approved" width="100%" cellspacing="0">
												@include('Supply.ordersdatatable',[$tableData = $data['purchasing_delivered'], $archive = $data['archive'], $status = 2])
											</table>
										</div>
									</div>	
								</div>
							</div>
							@else
							<div class="tab-pane fade show active" id="archived" role="tabpanel" aria-labelledby="nav-archived-tab">
								<div class="row">
									<div class="col">
										<div class="table-responsive">
											<table class="table table-striped" id="itemlist_approved" width="100%" cellspacing="0">
												@include('Supply.ordersdatatable',[$tableData = $data['purchasing'], $archive = $data['archive'], $status = -1])
											</table>
										</div>
									</div>	
								</div>
							</div>
							@endif
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
	@if($data['archive'])
	<div class="zoom">
		<a class="zoom-fab zoom-btn-blue zoom-btn-large tooltip-iventory-blue" href="{{route('purchasing.index')}}">
			<i class="fa fa-arrow-left"></i>
			<span class="tooltip-iventorytext-blue">BACK</span>
		</a>
	</div>
	@else
	<div class="zoom">
		<a class="zoom-fab zoom-btn-green zoom-btn-large tooltip-iventory-green" onclick="addPurchasing()">
			<i class="fa fa-plus"></i>
			<span class="tooltip-iventorytext-green">ADD</span>
		</a>
	</div>
	<div class="zoom-top">
		<a href="{{route('purchasing.trashed')}}" class="zoom-fab zoom-btn-black zoom-btn-sm tooltip-iventory">
			<i class="fa fa-trash"></i>
			<span class="tooltip-iventorytext">ARCHIVE</span>
		</a> 
	</div>
	@endif
	<!---ADD ITEM FORM ----->
	@include('Supply.Modals.alert_message_modal', [$msg = Session::get('message'), $head = Session::get('head')])
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
	var disableStatus = (false || @if($data['archive']) true @else false @endif );
	$(document).ready(function() {
		$('#itemlist_pending').DataTable({
			"order": [[ 0, "desc" ]]
		});

		$('#itemlist_approved').DataTable({
			"order": [[ 0, "desc" ]]
		});

		$(".editpur_btn").click(function() {
			editPurchasing($(this).attr('id'), disableStatus);
		});

		$(".archive_btn").click(function() {
			$("#purchasingConfirm").modal("show");
			$('#delete_id').val(($(this).attr('id')));
		});

		$(".archive_deli_btn").click(function() {
			$("#purchasingConfirmDeliver").modal("show");
			$('#delete_deli_id').val(($(this).attr('id')));
		});

		$(".delete_archive_btn").click(function() {
			$("#purchasingConfirmArchive").modal("show");
			$('#delete_arch_id').val(($(this).attr('id')));
		});
		

		$('#nav-tab a').on('click', function (e) {
			e.preventDefault();
			var id = $(this).attr('id');
			if(id == "pend") {
				disableStatus = false;
			} else {
				disableStatus = true;
			}
		});

		var msg = '{{Session::get('message')}}';
		var exist = '{{Session::has('message')}}';
		var evalmsg = msg.replace(/(&quot\;)/g,"\"");
		if(exist){
			$('#purchasingAlert').modal('show');
		}
	});
</script>


@stop