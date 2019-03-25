@extends('components/main')

@section('content')
<body>
	@include('components.nav_sales')
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/custom/billing/modalIndex.css')}}">
	<div id="wrapper" class="offset1">
		@include('components.menu_b')
		<div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
					<li class="breadcrumb-item">
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-hand-holding-usd" style="font-size:23px"></i> Billings</strong></h6>
					</li>
				</ol>
				<!-- <div class="container"> -->
				<div class="card mb-3">
					<div class="card-body">
						<div class="row" style="margin-bottom:20px">
							<div class="col-md-12">
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="bill" data-toggle="tab" href="#billing" role="tab"  aria-selected="true"> <i class="fa fa-calculator "></i>   Billing</a>
								<a class="nav-item nav-link" id="excel" data-toggle="tab" href="#excelTab" role="tab"  aria-selected="false"> <i class="fa fa-newspaper"></i>   Reports</a>
								<a class="nav-item nav-link" id="archived" data-toggle="tab" href="#archivedTab" role="tab"  aria-selected="false"> <i class="fa fa-window-close"></i>   Archived</a>
								</div>
							</div>
						</div>
				<!-- </div> -->

				<!-- tab contents -->
						<div class="tab-content" id="nav-tabContent" style="padding: 0px 10px">
							<!-- tab 1 -->
							<div class="tab-pane fade show active" id="billing" role="tabpanel" aria-labelledby="nav-home-tab">
								<!-- <div class="card mb-3">
									<div class="card-body"> -->
										<div class="row">
											<div class="col">
												<div class="table-responsive">
													<table class="table table-striped" id="billingList" width="100%" cellspacing="0">
														<thead>
															<th width=10%>TR No.</th>
															<th width=20%>NAME</th>
															<th width=20%>COMPANY</th>
															<th width=20%>ADDRESS</th>
															<th width=10%>Status</th>
															<th width=10%>Action</th>
														</thead>
														<form method="GET" action="Billing/viewBilling">
														<tbody id="billing-info">
															@if(count($indexPost) > 0)
																@foreach($indexPost as $post)
																	<tr>
																		<td>{{$post->Sale_ID}}</td>
																		<td>{{$post->F_Name.' '.$post->L_Name}}</td>
																		<td>{{$post->Company}}</td>
																		<td>{{$post->Address}}</td>
																		<td>
																				@if(($post->debit - $post->credit) > 0) {{ "PENDING" }}
																				@else	{{ "PAID" }}
																				@endif
																		</td>
																		<td>
																			<a class="btn btn-sm btn-primary" style="font-size:12px" href="#" data-id="{{$post->Sale_ID}}" id="viewBill"><i class="fa fa-eye"></i></a>
																			<a class="btn btn-sm btn-primary" style="font-size:12px" href="#" data-id="{{$post->Sale_ID}}" id="updateBill"><i class="fa fa-edit"></i></a>
																			<a class="btn btn-sm btn-danger" style="font-size:12px" href="#" data-id="{{$post->Sale_ID}}" id="archiveBill"><i class="fa fa-trash"></i></a>
																		</td>
																	</tr>
																@endforeach
															@endif
														</tbody>
														</form>
													</table>
												</div>
											</div>
										</div>
									<!-- </div>
								</div>  -->
							</div> 
							<!-- end of content 1 -->
							<!-- tab 2 -->
							<div class="tab-pane fade" id="excelTab" role="tabpanel" aria-labelledby="nav-profile-tab">
								<!-- <div class="card mb-3">
									<div class="card-body"> -->
										<div class="row" style="padding-bottom: 10px;padding-left:10px">
											<button class="btn btn-success" onclick="window.open('/Billing/Excel')">Generate Reports</button>
										</div>
										<div class="row">
											<div class="col">
												<div class="table-responsive">
													<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
														<thead>
															<th width=20%>Billing_ID</th>
															<th width=30%>Name</th>
															<th width=35%>Address</th>
															<th width=15%>Bill</th>
														</thead>
														<tbody>
																							
																									
														</tbody>
													</table>	
												</div>
											</div>
										</div>
									<!-- </div>
								</div>  -->
							</div>
							<!-- end of content 2 -->
							<!-- tab3 -->
							<div class="tab-pane fade" id="archivedTab" role="tabpanel" aria-labelledby="nav-contact-tab">
								<!-- <div class="card mb-3">
									<div class="card-body"> -->
										<div class="row">
											<div class="col">
												<div class="table-responsive">
													<table class="table table-striped" id="itemlist2" width="100%" cellspacing="0">
														<thead>
															<th width=20%>Billing_ID</th>
															<th width=30%>Name</th>
															<th width=35%>Address</th>
															<th width=15%>Bill</th>
														</thead>
														<tbody>
												
												
												</tbody>
											</table>	
												</div>
											</div>
										</div>
									<!-- </div>
								</div>  -->
							</div> 
							<!-- end of content 3 -->		
						</div>
				<!-- end of contents -->
					</div>
				</div>	
			</div>
			@include('Billing.modal.modal')
			@include('components.footer2')
		</div>
	</div>
</body>
@stop


@section('script')
<script type="text/javascript">
	var indexRowID;

	$(document).ready(function() {
		$('#billingList').DataTable();
		$('#itemlist').DataTable();
		$('#itemlist2').DataTable();
	});

	//MODAL VIEWING
	$('body').delegate('#billing-info #viewBill', 'click', function(e){
		var id = $(this).data('id');
		$('#modalReceiptBtn').attr('data-id', id);

		$.ajax({
			url: "Billing/viewBill/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				var objSale = data.dataSale[0];
				var objSaleDetails = data.dataSaleDetails;
				var objAccDetails = data.dataAccDetails;
				loadDataFirstPart(objSale);
				loadDataSecondPart(objSaleDetails);
				loadDataThirdPart(objAccDetails);

				//Show Modal
				$('#modalHeaderTitle').html('Customer Billing Infomation');
				viewSetup();
				$('#modal-billing').modal('show');
			},
			error: function(){
				alert("SOMETHING WENT WRONG");
			}
		})
	})
	//End of Modal Viewing

	//Modal Edit
	$('body').delegate('#billing-info #updateBill', 'click', function(e){
		var id = $(this).data('id');
		$('#formPayment').val('');
		$('#formSave').data('id', id);
		// $('#formID').val(id);
		
		$.ajax({
			url: "Billing/" + id + "/edit",
			type: "GET",
			dataType: "JSON",
			success: function(data){
				var objSaleDetails = data.dataSaleDetails;
				var objAccDetails = data.dataAccDetails;

				loadDataSecondPart(objSaleDetails);
				loadDataThirdPart(objAccDetails);
				//Show Modal
				$('#modalHeaderTitle').html('Update Customer Billing');
				updateSetup();
				$('#modal-billing').modal('show');
			},
			error: function(){
				alert("SOMETHING WENT WRONG");
			}
		})
	})

	var _token = $('input[name="_token"]').val();
	//Modal Update
	$('body').delegate('#formSave', 'click', function(e){
		var id = $('#formSave').data('id');
		var payment = $('#formPayment').val();
		var errMsg = "";
		
		if(!parseInt(payment)){
			showError("Check Your Input");
		}else {
			//Save to DB
			$.ajax({
				url: "/Billing/addPayment",
				type: "POST",
				data: {id:id, payment:payment, _token:_token},
				success: function(data){
					loadDataThirdPart(data);
					showSucMsg("Saved Successfully");
					$('#formPayment').val('');
				},
				error: function(error){
					showError("Something Went Wrong");
				}
			})
		}
	})

	//Modal Archive
	$('body').delegate('#billing-info #archiveBill', 'click', function(e){
		var id = $(this).data('id');
		if(confirm('Are you sure you want to archive this record?')){
			$.ajax({
				url: "Billing/archive/" + id,
				type: "GET",
				data: { id:id, _token:_token },
				success: function(data){
					if(data=="Success"){
						location.reload();
					}else{
						alert()
					}
				},
				error: function(err){
					alert("Something Went Wrong");
				}
			})
		}
	})

	function receipt(){
		var id = $('#modalReceiptBtn').data('id');
		var url = "/Billing/Receipt/" + id;
		window.open(url);
	}

	//Data Of First Part
	function loadDataFirstPart(objSale){
		$('#modalViewName').html("Name: " + objSale.F_Name + " " + objSale.L_Name);
		$('#modalViewAddress').html("Address: " + objSale.Address);
		$('#modalViewTINNumber').html("TIN No:" + objSale.TIN_no);
		$('#modalViewOSCANumber').html("OSCA/PWD ID No:" + objSale.OSCA_PWD_ID);
		$('#modalViewTerms').html("Terms of Payment: " + objSale.term_of_payment);
		$('#modalViewTotalBill').html("Total Bill: " + objSale.debit);
	}

	//Data Of Second Part
	function loadDataSecondPart(objSaleDetails){
		$('#modalSaleDetailsTbody').html("");
		var totalItems = 0;
		for(var i=0; i<objSaleDetails.length; i++){
			totalItems++;
			$('#modalSaleDetailsTbody').append("<tr>");
			$('#modalSaleDetailsTbody').append("<td>" + totalItems + "</td>");
			$('#modalSaleDetailsTbody').append("<td>" + objSaleDetails[i].Quantity + "</td>");
			$('#modalSaleDetailsTbody').append("<td>" + objSaleDetails[i].Unit + "</td>");
			$('#modalSaleDetailsTbody').append("<td>" + objSaleDetails[i].Unit_Price + "</td>");
			$('#modalSaleDetailsTbody').append("<td>" + (objSaleDetails[i].Quantity * objSaleDetails[i].Unit_Price) + "</td>");
			$('#modalSaleDetailsTbody').append("</tr>");
		}
		$('#modalTotalItems').html("Total Items: " + totalItems);
	}

	//Data Of Third Part
	function loadDataThirdPart(objAccDetails){
		$('#modalAccDetailsTbody').html("");
		var totalPayment = 0;
		for(var i=0; i<objAccDetails.length; i++){
			$('#modalAccDetailsTbody').append("<tr>");
			$('#modalAccDetailsTbody').append("<td>" + (i+1) + "</td>");
			$('#modalAccDetailsTbody').append("<td>" + objAccDetails[i].Acc_Date + "</td>");
			$('#modalAccDetailsTbody').append("<td>" + objAccDetails[i].Acc_Payment + "</td>");
			$('#modalAccDetailsTbody').append("</tr>");
			totalPayment += parseInt(objAccDetails[i].Acc_Payment);
		}
		$('#modalTotalPayment').html("Total Payment: " + totalPayment);
	}

	//Modal Setup
	function viewSetup(){
		$('#modalFirstPart').css('display', 'block');
		$('#modalSecondPart').css('display', 'block');
		$('#modalThirdPart').css('display', 'block');
		$('#modalAccountingPart').css('display', 'none');
		$('#modalReceiptBtn').css('display', 'block');
	}

	function updateSetup(){
		$('#modalFirstPart').css('display', 'none');
		$('#modalSecondPart').css('display', 'block');
		$('#modalThirdPart').css('display', 'block');
		$('#modalAccountingPart').css('display', 'block');
		$('#modalReceiptBtn').css('display', 'none');
	}

	function showSucMsg(message){
		$('#modalNotif').html(message);
		$("#modalNotif").removeClass("msg").addClass("msg-visible");
		$('#modalNotif').css('display', 'block');
		setTimeout(function(){
			$('#modalNotif').css('display', 'none');
		}, 2000);
	}

	function showError(message){
		$('#modalNotif').html(message);
		$("#modalNotif").removeClass("msg-visible").addClass("msg");
		$('#modalNotif').css('display', 'block');
		setTimeout(function(){
			$('#modalNotif').css('display', 'none');
		}, 2000);
	}

</script>
@stop