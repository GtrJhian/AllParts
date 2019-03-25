<div class="modal fade" id="updatesupplier">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">UPDATE SUPPLIER</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div> 
				<div class="modal-body">
					<div id="item" class="container tab-pane active"><br>
						<form id="itemCreate" action="/updateItem" method="post"/>
						{{ csrf_field() }}
						<input type="hidden" value="" id="supid" name="uid">

						<div class="form-horizontal">
							<div class="row">
								<label class="col-sm-3">Company Name: </label>
								<div class="col-sm-9">
									<input type="text" id="companyname" name="ic" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-3">Address: </label>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<textarea class="form-control" id="companyadd" name="id" required></textarea>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Company Telephone: </label>
								<div class="col-sm-8">
                                <input type="number" name="companynumber" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Email: </label>
								<div class="col-sm-8">
                                <input type="email" name="companyemail" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Agent Contact Number: </label>
								<div class="col-sm-8">
                                <input type="number" name="companyagentnum" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<input class="btn btn-success btn-block" type="submit" name="uisubmit" value="Update Item">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> {{-- end UPDATE item --}}