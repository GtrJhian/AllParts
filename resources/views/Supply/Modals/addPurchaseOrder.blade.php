<div class="modal fade" id="addItemSupply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="formTitle"></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				
				<!---- ADD FORM----->
				<div class="container-fluid">
					<div class="card">
						<div class="card-header">
							<span>Purchase Order Form</span>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">

									<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
										<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
											<form action="/purchasing/store" method="post" id="purchasingForm">
												{{ csrf_field() }}
												<div class="row">
													<div class="col-4" style="padding-right: 2px">
														<div class="form-group">
															<h6 style="margin-bottom:3px">Purchase Order No:</h6>
															<input type='number' name="pur_no" class="form-control-sm form-control" min=0 id="purchasenum" required>	
														</div>
													</div>
													<div class="col-4" style="padding-right: 2px">
														<div class="form-group">
															<h6 style="margin-bottom:3px">Reference Invoice No:</h6>
															<input type='number' name="ref_inv" class="form-control-sm form-control" min=0 id="referecenum" required>	
														</div>
													</div>
													<div class="col-4" style="padding-left: 5px">
														<div class="form-label-group">
															<input type="date" id="orderdate" class="form-control form-control" autofocus="autofocus" name="order_date" required>
															<label for="date">Date:</label>
														</div>
													</div>
												</div>
												<div class="row justify-content-between" style="padding-top: 3px">
													<div class="col-12" style="padding-right: 5px">
														<h6 style="margin-bottom:3px">Order From:</h6>
														<div class="form-group">
															<select id="supplier" class="form-control form-control-sm" placeholder="Order From:" required="required" autofocus="autofocus" name="supplier_id">
																<option value="" selected disabled hidden></option>
																@if(count($data['supplier']) > 0)
																@foreach($data['supplier'] as $suppliers)
																<option value="{{$suppliers->Supplier_ID}}">{{$suppliers->Company_Name}}</option>
																@endforeach
																@else
																<option>No supplier available</option>
																@endif
															</select>

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
																<th>Item Code</th>
																<th>Quantity</th>
																<th>Unit</th>
																<th>Description of Goods</th>
																<th>Unit Price</th>
																<th>Amount</th>
																<th></th>
															</thead>
															<tbody id="baseitemform">
															</tbody>
														</table>
													</div>
												</div>	
												@if(!$data['archive'])						
												<div class="row show-only" style="padding-bottom: 10px">
													<div class="col">
														<button type="button" class="btn btn-md btn-primary d-block mx-auto" id="additem"><i class="fa fa-list"></i> Add Items</button>
													</div>
												</div>
												@endif
												<div class="row">
													<div class="col">
														<div class="form-group text5">
															<h6 style="margin-bottom:3px">Total:</h6>
															<p>PHP <span id="totalamountspan"></span></p>
															<input type='hidden' name="pur_amount" class="form-control-sm form-control" min=0 id="totalamount" readonly>	
															<input type='hidden' name="state" id="state" readonly>	
														</div>
													</div>
												</div>
												@if(!$data['archive'])
												<div class="row show-only">
													<hr> 
													<div class="col">
														<input type="submit" name="submit" class="btn btn-success d-block mx-auto">
													</div>
												</div>
												@endif
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
			var inventory = <?php echo $data['inventory'] ?>;
			var purchasing = <?php echo $data['purchasing'] ?>;
			var totalAmount = 0;
			var pAmount = [];
			var disableForm = (false || @if($data['archive']) true @else false @endif );
			pAmount[0] = 0;
			var itemIndex = 0;
			$(document).ready(function() {
				$("#additem").click(function(){
					if(($("#item_code" + (itemIndex-1)).val() != "") && 
						($("#quantity" + (itemIndex-1)).val() != "") &&
						($("#unit" + (itemIndex-1)).val() != "") &&
						($("#desc" + (itemIndex-1)).val() != "") &&
						($("#uprice" + (itemIndex-1)).val() != "")) 
					{
						addItemRow();
					}
				});
			});

			function setDisable(val){
				disableForm = val;
				if(val) {
					$(".show-only").hide();
				} else {
					$(".show-only").show();
				}
			}

			function addPurchasing(){
				initialize();
				setDisable(false);
				$('#state').val(false);
				addItemRow();
				$("#formTitle").html("ADD PURCHASE");
				$("#purchasingForm :input").prop("readonly", disableForm);
				$("#purchasingForm select").attr("disabled", disableForm);
				$("#purchasingForm button").prop("disabled", disableForm);
			}

			function initialize(){
				for(var i = 0; i <= itemIndex; i++){
					removeItemRow(i);
				}
				$('#addItemSupply').modal('show');
				$('#purchasenum').val({{$data['purchaseid'] + 1}});
				$('#referecenum').val("");
				$('#orderdate').val(formatDate(new Date()));
				$('#supplier').val("");

				totalAmount = 0;
				pAmount = [];
				pAmount[0] = 0;
				itemIndex = 0;
			}

			function editPurchasing(id, dis){
				initialize();
				setDisable(dis);
				$("#formTitle").html("");
				$('#addItemSupply').modal('show');
				$('#state').val(true);
				for(var i in purchasing) {
					if(purchasing[i].Order_No == id){
						$('#purchasenum').val(purchasing[i].Order_No);
						$('#referecenum').val(purchasing[i].Invoice_No);
						$('#orderdate').val(purchasing[i].Order_Date);
						$('#supplier').val(purchasing[i].Supplier_ID);
						$('#totalamount').val(purchasing[i].Amount);
						for(var j in purchasing[i].order_detail) {
							addItemRow();
							$("#item_code" + (itemIndex-1)).val(purchasing[i].order_detail[j].Item_ID);
							$("#quantity" + (itemIndex-1)).val(purchasing[i].order_detail[j].Quantity);
							$("#unit" + (itemIndex-1)).val(purchasing[i].order_detail[j].Unit);
							$("#uprice" + (itemIndex-1)).val(purchasing[i].order_detail[j].Unit_Price);
							updateAmount(itemIndex-1);
							updateItemDesc(purchasing[i].order_detail[j].Item_ID, itemIndex-1);
						}
						$("#purchasingForm :input").prop("readonly", disableForm);
						$("#purchasingForm select").attr("disabled", disableForm);
						$("#purchasingForm button").prop("disabled", disableForm);
						break;
					}
				}
			}

			function addItemRow() {
				$("#baseitemform").append(
					'<tr id="itemrow' + itemIndex + '">'+
					'<td><select id="item_code' + itemIndex + '" name="itemcode[]" onchange="updateItemDesc(this.value, ' + itemIndex + ')" class="form-control form-control-sm" placeholder="Order From:" required="required" autofocus="autofocus">'+
					'<option value="" selected disabled hidden></option>'+
					'@if(count($data['inventory']) > 0)'+
					'@foreach($data['inventory'] as $inventory)'+
					'<option value="{{$inventory->Item_ID}}">{{$inventory->Item_Code}}</option>'+
					'@endforeach@else<option>No item available</option>@endif'+
					'</select></td>'+
					'<td><input type="number" id="quantity' + itemIndex + '" min="1" value="1" class="form-control-sm form-control" onclick="updateAmount(' + itemIndex + ')" onkeyup="updateAmount(' + itemIndex + ')" name="quantity[]"></td>'+
					'<td><input type="text" id="unit' + itemIndex + '" class="form-control-sm form-control" name="unit[]"></td>'+
					'<td><input id="desc' + itemIndex + '" type="text" class="form-control-sm form-control" name="desc[]"></td>'+
					'<td><input id="uprice' + itemIndex + '" type="text" class="form-control-sm form-control" onclick="updateAmount(' + itemIndex + ')" onkeyup="updateAmount(' + itemIndex + ')" name="uprice[]"></td>'+
					'<td><span id="amount' + itemIndex + '"></span></td>'+
					'<td class="text-center"><a><span><button type="button" class="btn btn-sm btn-danger" onclick="removeItemRow(' + itemIndex + ')"><i class="fa fa-times"></i></button></span></a></td>'+
					'</tr>'
					);
				pAmount[itemIndex] = 0;
				itemIndex++;
			}

			function updateItemDesc(obj, index){
				for(var i in inventory) {
					if(inventory[i].Item_ID == obj){
						$("#unit" + index).val(inventory[i].Item_Unit);
						$("#desc" + index).val(inventory[i].Item_Description);
						break;
					}
				}
			}

			function removeItemRow(index) {
				$("#itemrow" + index).remove();
				pAmount[index] = 0;
				updateTotal();
			}

			function updateAmount(index){
				var q = $("#quantity"+index).val();
				var p = $("#uprice"+index).val();
				if(q && p){
					$("#amount"+index).html(formatMoney(q*p));
					pAmount[index] = q*p;
					updateTotal();
				}
			}

			function updateTotal(){
				totalAmount = 0;
				for(var i = 0; i<itemIndex; i++) {
					totalAmount  += pAmount[i];
				}
				$("#totalamount").val(totalAmount);
				$("#totalamountspan").html(formatMoney(totalAmount, 2));
			}

			function formatDate(date) {
				var d = new Date(date),
				month = '' + (d.getMonth() + 1),
				day = '' + d.getDate(),
				year = d.getFullYear();

				if (month.length < 2) month = '0' + month;
				if (day.length < 2) day = '0' + day;

				return [year, month, day].join('-');
			}

			function formatMoney(n, c, d, t) {
				var c = isNaN(c = Math.abs(c)) ? 2 : c,
				d = d == undefined ? "." : d,
				t = t == undefined ? "," : t,
				s = n < 0 ? "-" : "",
				i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
				j = (j = i.length) > 3 ? j % 3 : 0;

				return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
			};

		</script>