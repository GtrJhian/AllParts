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
								<a class="nav-item nav-link active" id="bill" data-toggle="tab" href="#billing" role="tab"  aria-selected="true"> <i class="fa fa-credit-card"></i>   Billing</a>
								<a class="nav-item nav-link" id="accounting" data-toggle="tab" href="#accountingTab" role="tab"  aria-selected="false"> <i class="fa fa-calculator"></i>   Accounting</a>
								<a class="nav-item nav-link" id="excel" data-toggle="tab" href="#excelTab" role="tab"  aria-selected="false"> <i class="fa fa-newspaper"></i>   Reports</a>
								<a class="nav-item nav-link" id="archived" data-toggle="tab" href="#archivedTab" role="tab" aria-selected="false"> <i class="fa fa-window-close"></i>   Archived</a>
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
															<th width=10%>Inv No.</th>
															<th width=20%>Name</th>
															<th width=10%>Date</th>
															<th width=20%>Company</th>
															<th width=20%>Address</th>
															<th width=10%>Status</th>
															<th width=10%>Action</th>
														</thead>
														<form method="GET" action="Billing/viewBilling">
														<tbody id="billing-info">
															@if(count($indexPost) > 0)
																@foreach($indexPost as $post)
																	<tr>
																		<td>{{$post->sales_invoice_no}}</td>
																		<td>{{$post->F_Name.' '.$post->L_Name}}</td>
																		<td>{{$post->Sale_Date}}</td>
																		<td>{{$post->Company}}</td>
																		<td>{{$post->Address}}</td>
																		<td>
																				@if(($post->debit - $post->credit) > 0) {{ "PENDING" }}
																				@else	{{ "PAID" }}
																				@endif
																		</td>
																		<td>
																			<a class="btn btn-sm btn-success" style="font-size:12px" href="#" data-id="{{$post->Sale_ID}}" onclick="viewBilling({{ $post->Sale_ID }})"><i class="fa fa-eye"></i></a>
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
										<div class="row">
											<div class="col">
												<div class="row">
													<div class="col-3 offset-4" style="text-align: center">
														<h3>Select Report Type</h3>
													</div>
												</div>
												<br>
												<div class="row">

													<div class="offset-4 col-2">
														<label class="container9">
															<input type="radio" name="reportsAccounting" id="reportsBilling" value="1" onclick="enableArchive()" checked> Billing
															<span class="checkmark"></span>
														</label>
													</div>
													<div class="col-2">
														<label class="container9">
															<input type="radio" name="reportsAccounting" id="reportsAccounting" value="0" onclick="disableArchive()"> Accounting
															<span class="checkmark"></span>
														</label>
													</div>
												</div>
												<div class="row">
													<div class="offset-3 col-5">
														<select class="form-control" id="reportMonth">
															<option value="All">All</option>
															<option value="01">January</option>
															<option value="02">February</option>
															<option value="03">March</option>
															<option value="04">April</option>
															<option value="05">May</option>
															<option value="06">June</option>
															<option value="07">July</option>
															<option value="08">August</option>
															<option value="09">September</option>
															<option value="10">October</option>
															<option value="11">November</option>
															<option value="12">December</option>
														</select> 
													</div>
													<div class="col-2"></div>
												</div>
												<div class="row" style="padding-bottom: 20px"></div>
												<div class="row" style="padding-bottom: 20px">
														<div class="offset-4 col-2">
															<label class="container9">
																<input type="radio" name="reportsArchived" id="reportsArchived" value="1" checked> Unarchived
																<span class="checkmark"></span>
															</label>
														</div>
														<div class="col-2">
															<label class="container9">
																<input type="radio" name="reportsArchived" id="reportsUnarchived" value="0"> Archived
																<span class="checkmark"></span>
															</label>
														</div>
												</div>
												<div class="row">
													<div class="offset-4 col-4">
														<button class="btn btn-success" onclick="generateReports()" style="margin-left:15%">Generate Reports</button>
													</div>
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
															<th width=10%>Inv No.</th>
															<th width=20%>Name</th>
															<th width=20%>Company</th>
															<th width=20%>Address</th>
															<th width=10%>Status</th>
															<th width=10%>Action</th>
														</thead>
														<tbody id="archivedTBody">
												
														</tbody>
											</table>	
												</div>
											</div>
										</div>
									<!-- </div>
								</div>  -->
							</div> 
							<!-- end of content 3 -->
							<!-- tab4 -->
							<div class="tab-pane fade" id="accountingTab" role="tabpanel" aria-labelledby="nav-contact-tab">
								<div class="card mb-3">
									<div class="card-body"> 
										<div class="row">
											<div class="col">
												<div class="table-responsive">
													<table class="table table-striped" id="itemlist3" width="100%" cellspacing="0">
														<thead>
															<th width=10%>Inv No.</th>
															<th width=20%>Date</th>
															<th width=10%>Term Of Payment</th>
															<th width=10%>Action</th>
														</thead>
														<tbody id="accountingTBody">
												
														</tbody>
											</table>	
												</div>
											</div>
										</div>
								 	</div>
								</div> 
							</div> 
							<!-- end of content 4 -->		
						</div>
				<!-- end of contents -->
					</div>
				</div>	
			</div>
			@include('Billing.modal.modal')
			@include('Billing.modal.modalCheck')
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
		$('#itemlist3').DataTable();
	});

	//MODAL VIEWING
	function viewBilling(id){
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
				showError("SOMETHING WENT WRONG");
			}
		})
	}
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
				showError("SOMETHING WENT WRONG");
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
			if(maxPayment >= payment){
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
			}else{
				showError("Do not exceed the maximum balance");
			}
		}
	})

	//Modal Archive
	$('body').delegate('#billing-info #archiveBill', 'click', function(e){
		var id = $(this).data('id');
		$('#checkArchiveYes').data('id', id);
		$('#modal-archive').modal('show');
	})

	$('body').delegate('#checkArchiveYes', 'click', function(e){
		var id = $(this).data('id');
		$.ajax({
			url: "Billing/archive/" + id,
			type: "GET",
			data: { id:id, _token:_token },
			success: function(data){
				if(data=="Success"){
					location.reload();
				}else{
					showError(data);
				}
			},
			error: function(err){
				showError("Something Went Wrong");
			}
		})
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
		var totalAmount = 0;
	function loadDataSecondPart(objSaleDetails){
		$('#modalSaleDetailsTbody').html("");
		var totalItems = 0;
			totalAmount=0;
		for(var i=0; i<objSaleDetails.length; i++){
			totalItems++;
			$('#modalSaleDetailsTbody').append("<tr>");
			$('#modalSaleDetailsTbody').append("<td>" + totalItems + "</td>");
			$('#modalSaleDetailsTbody').append("<td>" + objSaleDetails[i].Item_Description + "</td>");
			$('#modalSaleDetailsTbody').append("<td>" + objSaleDetails[i].Unit + "</td>");
			$('#modalSaleDetailsTbody').append("<td>" + objSaleDetails[i].Quantity + "</td>");
			$('#modalSaleDetailsTbody').append("<td>" + objSaleDetails[i].Unit_Price + "</td>");
			$('#modalSaleDetailsTbody').append("<td>" + (objSaleDetails[i].Quantity * objSaleDetails[i].Unit_Price) + "</td>");
			$('#modalSaleDetailsTbody').append("</tr>");
			totalAmount += (objSaleDetails[i].Quantity * objSaleDetails[i].Unit_Price);
		}
		$('#totalDebit').html(totalAmount);
		$('#modalViewTotalBill').html("Total Bill: " + totalAmount);
		$('#modalTotalItems').html("Total Items: " + totalItems);
	}

	//Data Of Third Part
		var totalPayment = 0;
		var maxPayment = 0;
	function loadDataThirdPart(objAccDetails){
		$('#modalAccDetailsTbody').html("");
		totalPayment = 0;
		for(var i=0; i<objAccDetails.length; i++){
			$('#modalAccDetailsTbody').append("<tr>");
			$('#modalAccDetailsTbody').append("<td>" + (i+1) + "</td>");
			$('#modalAccDetailsTbody').append("<td>" + objAccDetails[i].Acc_Date + "</td>");
			$('#modalAccDetailsTbody').append("<td>" + objAccDetails[i].Acc_Payment + "</td>");
			$('#modalAccDetailsTbody').append("</tr>");
			totalPayment += parseInt(objAccDetails[i].Acc_Payment);
		}
		maxPayment = totalAmount-totalPayment;
		$('#totalBalance').html(maxPayment);
		$('#modalTotalPayment').html("Total Payment: " + totalPayment);
		if(totalPayment >= totalAmount) $('#formPayment').attr('disabled', true);

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
		$('#errorMsg').html(message);
		$('#modal-error').modal('show');
	}

	//This part is for Archived Tab
	$('body').delegate('#archived', 'click', function(e){
		$.ajax({
			url: "Billing/viewArchived/",
			type: "GET",
			dataType: "JSON",
			success: function(data){
				$('#archivedTBody').html("");
				for(var i=0; i<data.length; i++){
					var status = "";
					$('#archivedTBody').append("<tr>");
					$('#archivedTBody').append("<td>" + data[i].sales_invoice_no + "</td>");
					$('#archivedTBody').append("<td>" + data[i].F_Name + " " + data[i].L_Name + "</td>");
					$('#archivedTBody').append("<td>" + data[i].Company + "</td>");
					$('#archivedTBody').append("<td>" + data[i].Address + "</td>");
					if((data[i].debit - data[i].credit) > 0)  status = "PENDING";
					else	status = "PAID";
					$('#archivedTBody').append("<td>" + status + "</td>");
					$('#archivedTBody').append(
						"<td>"
						+	"<a class='btn btn-sm btn-primary' style='font-size:12px; margin-right:10px' href='#' data-id='" + data[i].Sale_ID +"' onclick='viewBilling(" + data[i].Sale_ID + ")'><i class='fa fa-eye'></i></a>"
						+	"<a class='btn btn-sm btn-success' style='font-size:12px' href='#' data-id='" + data[i].Sale_ID +"' id='UnarchiveBill'><i class='fa fa-redo'></i></a>"
						+ "</td>"
					);
					$('#archivedTBody').append("</tr>");
				}
			},
			error: function(){
				showError("SOMETHING WENT WRONG");
			}
		})
	})

	$('body').delegate('#UnarchiveBill', 'click', function(e){
		var id = $(this).data('id');
		$('#checkUnarchiveYes').data('id', id);
		$('#modal-unarchive').modal('show');
	})

	$('body').delegate('#checkUnarchiveYes', 'click', function(e){
		var id = $(this).data('id');
		$.ajax({
			url: "Billing/unarchive/" + id,
			type: "GET",
			data: { id:id, _token:_token },
			success: function(data){
				if(data=="Success"){
					location.reload();
				}else{
					showError(data);
				}
			},
			error: function(err){
				showError("Something Went Wrong");
			}
		})
	})

	function generateReports(){
		var reportMonth = $('#reportMonth').val();
		if($('#reportsArchived').is(":checked")) var archived = 0;
		else if($('#reportsUnarchived').is(":checked")) var archived = 1;
		if($('#reportsBilling').is(":checked")) var reportType = "Billing";
		else if($('#reportsAccounting').is(":checked")) var reportType = "Accounting";
		window.open('/Billing/Excel/' + reportMonth + "/" + archived + "/" + reportType);
	}

	function disableArchive(){
		$('#reportsUnarchived').attr('disabled', true);
		document.getElementById('reportsArchived').checked = true;
	}

	function enableArchive(){
		$('#reportsUnarchived').attr('disabled', false);
	}

	//This part is for Archived Tab
	$('body').delegate('#accounting', 'click', function(e){
		$.ajax({
			url: "Billing/Accounting/",
			type: "GET",
			dataType: "JSON",
			success: function(data){
				$('#accountingTBody').html("");
				for(var i=0; i<data.length; i++){
					$('#accountingTBody').append("<tr>");
					$('#accountingTBody').append("<td>" + data[i].sales_invoice_no + "</td>");
					$('#accountingTBody').append("<td>" + data[i].Acc_Date + "</td>");
					$('#accountingTBody').append("<td>" + data[i].term_of_payment + "</td>");
					$('#accountingTBody').append(
						"<td>"
						+	"<a class='btn btn-sm btn-primary' style='font-size:12px; margin-right:10px' href='#' data-id='" + data[i].Sale_ID +"' onclick='viewBilling(" + data[i].Sale_ID + ")'><i class='fa fa-eye'></i></a>"
						+ "</td>"
					);
					$('#accountingTBody').append("</tr>");
				}
				console.log(data);
			},
			error: function(){
				showError("SOMETHING WENT WRONG");
			}
		})
	})
</script>
@stop