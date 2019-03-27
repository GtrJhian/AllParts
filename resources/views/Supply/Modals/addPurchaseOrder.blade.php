<div class="modal fade" id="addItemSupply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">ADD PURCHASE</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				
				<!---- ADD FORM----->
				<div class="container-fluid">
					<div class="card mb-3">
						<div class="card-header">
							<span class="text5">Purchase Order No. <a style="color:#c73213">{{$data['purchaseid']->Order_No + 1}}</a></span>
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
								<!-- <div class="row">
									<div class="col" style="padding-right: 2px">
										<div class="form-group">
											<h6 style="margin-bottom:3px">Reference Invoce No:</h6>
											<input type='number' class="form-control-sm form-control" min=0 id="referecenum">	
										</div>
									</div>
								</div> -->
								<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
									<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										<form action="/purchase/store" method="POST">
											<div class="row justify-content-between" style="padding-top: 3px">
												<div class="col-8" style="padding-right: 5px">
													<h6 style="margin-bottom:3px">Order From:</h6>
													<div class="form-group">
														<select id="supplier" class="form-control form-control-sm" placeholder="Order From:" required="required" autofocus="autofocus">
															@if(count($data['supplier']) > 0)
															@foreach($data['supplier'] as $suppliers)
															<option>{{$suppliers->Company_Name}}</option>
															@endforeach
															@else
															<option>No supplier available</option>
															@endif
														</select>

													</div>
												</div>
												<div class="col-4" style="padding-left: 5px">
													<div class="form-label-group">
														<input type="date" id="orderdate" class="form-control form-control" value="<?php echo date('Y-m-d'); ?>" required="required" autofocus="autofocus">
														<label for="date">Date:</label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-4" style="padding-right: 2px">
													<div class="form-group">
														<h6 style="margin-bottom:3px">Reference Invoice No:</h6>
														<input type='number' class="form-control-sm form-control" min=0 id="referecenum">	
													</div>
												</div>
											</div>
											<br>
											<h6 style="margin-bottom:3px">Please deliver to us the following goods in accordance with the prices indicated herein:</h6>
											<hr>
											<div class="row">
												<div class="col">
													<table class="table table-bordered" id="items_added">
														<thead>
															<th>Quantity</th>
															<th>Unit</th>
															<th>Description of Goods</th>
															<th>Unit Price</th>
															<th>Amount</th>
															<th></th>
														</thead>
														<tbody id="baseitemform">
															<tr>
																<td><input type="number" class="form-control-sm form-control" onkeyup="updateAmount(0)" min=0 name="quantity[0]"></td>
																<td><input type="text" class="form-control-sm form-control" name="unit"></td>
																<td><input type="text" class="form-control-sm form-control" name="desc"></td>
																<td><input type="text" class="form-control-sm form-control" onkeyup="updateAmount(0)" min=0 name="uprice[0]"></td>
																<td><span id="amount0"></span></td>
																<td class="text-center">
																	<a><span><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></span></a>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>							
											<div class="row" style="padding-bottom: 10px">
												<div class="col">
													<button type="button" class="btn btn-md btn-primary d-block mx-auto" id="additem"><i class="fa fa-list"></i> Add Items</button>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<div class="form-group text5">
														<h6 style="margin-bottom:3px">Total:</h6>
														<input type='number' class="form-control-sm form-control" min=0 id="totalamount" readonly>	
													</div>
												</div>
											</div>
											<hr> 
											<div class="row">
												<div class="col">
													<input type="submit" name="Pay" class="btn btn-success d-block mx-auto">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="card-footer small text-muted">Checked and Approved By: <span style="font-weight: bold">Juan Dela Cruz</span></div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var totalAmount = 0;
		var pAmount = [];
		pAmount[0] = 0;
		var itemIndex = 1;
		$(document).ready(function() {
			$("#additem").click(function(){
				$("#baseitemform").append(
					'<tr><td><input type="number" class="form-control-sm form-control" onkeyup="updateAmount(' + itemIndex + ')" name="quantity[' + itemIndex + ']"></td><td><input type="text" class="form-control-sm form-control" name="unit[' + itemIndex + ']"></td><td><input type="text" class="form-control-sm form-control" name="desc[' + itemIndex + ']"></td><td><input type="text" class="form-control-sm form-control" onkeyup="updateAmount(' + itemIndex + ')" name="uprice[' + itemIndex + ']"></td><td><span id="amount' + itemIndex + '"></span></td><td class="text-center"><a><span><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></span></a></td></tr>'
					);
				pAmount[itemIndex] = 0;
				itemIndex++;
			});
		});


		function updateAmount(index){
			var q = $("input[name='quantity["+index+"]'").val();
			var p = $("input[name='uprice["+index+"]'").val();
			if(q && p){
				$("#amount"+index).html(q*p);
				pAmount[index] = q*p;

				totalAmount = 0;
				for(var i = 0; i<itemIndex; i++) {
					totalAmount  += pAmount[i];
				}
				$("#totalamount").val(totalAmount);
			}
		}
	</script>