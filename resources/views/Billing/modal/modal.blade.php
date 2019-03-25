<div class="modal fade" id="modal-billing" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
	<div class="modal-dialog" style="min-width: 900px">
		<div class="modal-content">
			<div class="modal-body">
				<div class="container">
					<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
					{{-- Heder --}}
					<legend class="text-center" id="modalHeaderTitle">Customer Billing Infomation</legend>
					<hr>
					{{-- End of Header --}}
					
					{{-- Notification --}}
					<div Style="display:none" class="msg-visible" id="modalNotif"> Sample Notification</div>
					{{-- End of Notification --}}
					
					{{-- First Part --}}
					<div style="display:none" id="modalFirstPart">
						<div class="row">
							<div class="offset-1 col-4	">
								<label id="modalViewName">Name:</label>
							</div>
							<div class="offset-1 col-6">
								<label id="modalViewPONumber">P.O Number:</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-4">
								<label id="modalViewAddress">Address:</label>
							</div>
							<div class="offset-1 col-6">
								<label id="modalViewTINNumber">TIN No:</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-4">
								<label id="modalViewBusStyle">Bus Style:</label>
							</div>
							<div class="offset-1 col-6">
								<label id="modalViewOSCANumber">OSCA/PWD ID No:</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-4">
								<label id="modalViewDRNumber">D.R No:</label>
							</div>
							<div class="offset-1 col-6">
								<label id="modalViewTerms">Terms of Payment:</label>
							</div>
						</div>
						<div class="row">
							<div class="offset-1 col-4">
								<label id="modalViewOSCASignature">OSCA/PWD Signature:</label>
							</div>
							<div class="offset-1 col-6">
								<label id="modalViewTotalBill">Total Bill:</label>
							</div>
						</div>
						<hr>
					</div>
					{{-- End of First Part --}}

					{{-- Second Part --}}
					<div style="display:none" id="modalSecondPart">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col"><legend class="text-center">Transaction Details</legend>
										<div class="table-responsive">
											<table class="table table-striped" width="100%" cellspacing="0">
												<thead>
													<th>No.</th>
													<th>Quantity</th>
													<th>Unit</th>
													<th>Unit Price</th>
													<th>Total Price</th>
												</thead>
												<tbody id="modalSaleDetailsTbody">
												</tbody>
											</table>
											<label id="modalTotalItems">Total Items:</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- End of Second Part --}}

					{{-- Third Part --}}
					<div style="display:none" id="modalThirdPart">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col"><legend class="text-center">Payment Details</legend>
										<div class="table-responsive">
											<table class="table table-striped" width="100%" cellspacing="0" id="paymentTable">
												<thead>
													<th>No.</th>
													<th>Date</th>
													<th>Amount</th>
												</thead>
												<tbody id="modalAccDetailsTbody">
												</tbody>
											</table>
											<label id="modalTotalPayment">Total Payment:</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- End of Third Part --}}

					{{-- Accounting Part --}}
					<div style="display:none" id="modalAccountingPart">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col"><legend class="text-center">Add Payment</legend>
										{{-- <form method="POST" id="modalPaymentFormID"> --}}
											{{ csrf_field() }}
											<div class="row">
												<div class="col-4"></div>
												<div class="col-3">
														{{-- <input type="text" id="formID" name="id"> --}}
														<input type="number" class="form-control" id="formPayment" name="payment" min="1" placeholder="Enter Amount">
												</div>
												<div class="col-3">
														<button class="btn btn-primary" id="formSave" data-id="">Save</button>
												</div>
											</div>
										{{-- </form> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- End of Accounting Part --}}

					{{-- Receipt Button --}}
					<button class="btn btn-primary" style="display:none" id="modalReceiptBtn" onclick="receipt()"data-id="">Generate Receipt</button>
					{{-- End of Receipt Button --}}
				</div>
			</div>
		</div>
	</div>
</div>