	<div class="modal fade" id="viewItem">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">ITEM INFORMATION</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="offset-md-1 col-sm-4">
							<img src="{{asset('inventory/none.png')}}" style="height: 200px; width: 200px; border:1px solid black;">
						</div>
						<div class="col-sm-5">
							<div class="card">
								<div class="card-body">
									<span class="info-labels">Item Code</span><br>
									<span class="info-labels">Category Brand</span><br>
									<span class="info-labels">Quantity</span>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-12">
							<h4 class="info-labels">Description</h4>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-12">
							<h4 class="info-labels">Items Included</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
</div> {{-- end VIEW item --}}