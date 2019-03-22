<div class="modal fade" id="supplyAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">ADD SUPLIER</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				
				<!---- ADD FORM----->
				<div class="tab-content">
					<div id="addSupply" class="container tab-pane active"><br>
						<form id="addSupply" action="" method="post"/>
						{{ csrf_field() }}
						<div class="form-horizontal">
							<div class="row">
								<label class="col-sm-3">Company: </label>
								<div class="col-sm-9">
									<input type="text" name="companyname" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-3">Address: </label>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<textarea class="form-control" name="compaddress" required></textarea>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Agent: </label>
								<div class="col-sm-8">
                                <input type="text" name="companyagent" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Contact Number: </label>
								<div class="col-sm-8">
                                <input type="number" name="companynumber" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Email Address: </label>
								<div class="col-sm-8">
                                <input type="email" name="companyemail" required class="form-control">
								</div>
							</div><br>
							
							
							<div class="row">
								<div class="col-sm-6">
									<input class="btn btn-success btn-block" type="submit" name="addsubmit" value="Add">
								</div>
								<div class="col-sm-6">
									<input class="btn btn-danger btn-block" type="reset" name="addreset" value="Clear">
								</div>
							</div>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>