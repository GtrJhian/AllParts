<div class="modal fade" id="updatesup">
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
								<label class="col-sm-6">Company Name: </label>
								<div class="col-sm-12">
									<input type="text" id="companyname" name="companyname" required class="form-control" value="{{$supply->Company_Name}}">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-6">Company Address: </label>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<textarea class="form-control" id="companyadd" name="companyadd" required>{{$supply->Company_Address}}</textarea>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-6">Company Number: </label>
								<div class="col-sm-12">
									<input type="text" id="companynumber" name="companynumber" required class="form-control" value="{{$supply->Company_Contact}}">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-6">Company E-mail: </label>
								<div class="col-sm-12">
									<input type="text" id="companyemail" name="companyemail" required class="form-control" value="{{$supply->Company_Email}}">
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-12">
									<input class="btn btn-success btn-block" type="submit" name="uisubmit" value="Update Item">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> {{-- end UPDATE supplier --}}