<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="customer" aria-hidden="true">
		<div class="modal-dialog" style="min-width: 700px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">Add User</legend>
						<hr>
						<form method="POST" action='/User/register'>
							@csrf
							<p class="text-secondary"><i>Note: <strong style="color:red">*</strong> are required</i></p>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Fname">First Name:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='F_Name' type="text" id="Fname" class="form-control form-control" placeholder="Ex: Juan" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Mname">Middle Name:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='M_Name' type="text" id="Mname" class="form-control form-control" placeholder="Ex: Santos" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
								<label for="Lname">Last Name:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='L_Name' type="text" id="Lname" class="form-control form-control" placeholder="Ex: Dela Cruz" required="required" autofocus="autofocus">									
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="position">Position:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='position' type="text" id="position" class="form-control form-control" placeholder="Ex: Brgy.South Triangle, Quezon City" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="address">Address:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='address' type="text" id="position" class="form-control form-control" placeholder="Ex: Brgy.South Triangle, Quezon City" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Contact">Contact Number:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='Contact_No' type="number" id="Contact" class="form-control form-control" placeholder="Ex: 09123456789" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<!-- <div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Company">Company:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='Company' type="text" id="Company" class="form-control form-control" placeholder="Ex: AGeekHub" autofocus="autofocus">
									</div>
								</div>
							</div> -->
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="email">Email:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='email' id="email" class="form-control form-control" placeholder="Ex: jdelacruz" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="username">Username:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='username' id="username" class="form-control form-control" placeholder="Ex: jdelacruz" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="password">Password:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='password' type="password" id="password" class="form-control form-control" placeholder="Ex: ******" autofocus="autofocus">
									</div>
								</div>
							</div>
                            <div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="cpassword">Confirm Password:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input type="password" id="cpassword" class="form-control form-control" placeholder="Ex: ******" autofocus="autofocus">
									</div>
								</div>
                            </div>
                            <hr>
                            <div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="access">User Access:</label>
								</div>
								<div class="offset-1 col-8">
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[0]">Admin
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[1]">Sales Invoice
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[2]">Inventory
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[3]">Billings
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[4]">Suppliers
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
								</div>
                            </div>
                            <hr>
							<div class="row">
								<div class="offset-4 col-1">
									<input type="submit" class="btn btn-md btn-success">
								</div>
								<div class="offset-1 scol-1">
									<input type="reset" class="btn btn-md btn-danger">
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="customer" aria-hidden="true">
		<div class="modal-dialog" style="min-width: 700px">
			<div class="modal-content">
				<div class="modal-body">
					<div class="container">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						<legend class="text-center">Edit User</legend>
						<hr>
						<form method="POST" action='/User/edit'>
							@csrf
							<input type = "hidden" name = "id">
							<p class="text-secondary"><i>Note: <strong style="color:red">*</strong> are required</i></p>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Fname">First Name:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='F_Name' type="text" id="Fname" class="form-control form-control" placeholder="Ex: Juan" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Mname">Middle Name:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='M_Name' type="text" id="Mname" class="form-control form-control" placeholder="Ex: Santos" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
								<label for="Lname">Last Name:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='L_Name' type="text" id="Lname" class="form-control form-control" placeholder="Ex: Dela Cruz" required="required" autofocus="autofocus">									
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="position">Position:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='position' type="text" id="position" class="form-control form-control" placeholder="Ex: Brgy.South Triangle, Quezon City" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Contact">Contact Number:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='Contact_No' type="number" id="Contact" class="form-control form-control" placeholder="Ex: 09123456789" required="required" autofocus="autofocus">
									</div>
								</div>
							</div>
							<!-- <div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="Company">Company:</label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='Company' type="text" id="Company" class="form-control form-control" placeholder="Ex: AGeekHub" autofocus="autofocus">
									</div>
								</div>
							</div> -->
							<div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="username">Username:<strong style="color:red">*</strong></label>
								</div>
								<div class="offset-1 col-8">
									<div class="form-group">
										<input name='username' type="text" id="username" class="form-control form-control" placeholder="Ex: jdelacruz" autofocus="autofocus">
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:5px">
								<!-- <div class="col-3">
									<label for="password">Edit Password:<strong style="color:red">*</strong></label>
								</div> -->
								<div class="col-2 offset-4">
									<div class="form-group">
										<div data-target="#chnge_pass" data-toggle="modal"  class="btn btn-md btn-primary" >Change Password</div>
									</div>
								</div>
							</div>
                            <hr>
                            <div class="row" style="padding-bottom:5px">
								<div class="col-3">
									<label for="access">User Access:</label>
								</div>
								<div class="offset-1 col-8">
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[0]">Admin
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[1]">Sales Invoice
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[2]">Inventory
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[3]">Billings
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="container9">
                                            <input type="checkbox" class="form-check-input" name="access[4]">Suppliers
                                            <span class="boxmark"></span>
                                        </label>
                                    </div>
								</div>
                            </div>
                            <hr>
							<div class="row">
								<div class="offset-4 col-1">
									<input type="submit" class="btn btn-md btn-success">
								</div>
								<div class="offset-1 scol-1">
									<input type="reset" class="btn btn-md btn-danger">
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="customer" aria-hidden="true">
	<div class="modal-dialog" style="min-width: 700px">
		<div class="modal-content">
			<div class="modal-body">
                <legend class="text-left">Are you sure to restore this user account?</legend>
                <div class="row">
                    <div class="offset-9 col-1">
                        <input type="button" name="Yes" value="Yes" class="btn btn-md btn-success">
                    </div>
                    <div class="col-1">
                        <input type="button" name="No" value="No" class="btn btn-md btn-danger">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="chnge_pass" tabindex="-1" role="dialog" aria-labelledby="chnge_pass" aria-hidden="true">
	<div class="modal-dialog" style="min-width: 700px">
		<div class="modal-content">
			<div class="modal-body">
				<form method = "POST" action = "/User/changepassword">
					@csrf
					<input type = "hidden" name = "id">
					<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
					<legend class="text-left">Change Password</legend>
					<hr>
					<div class="row" style="padding-bottom:5px">
						<div class="col-3">
							<label for="ch_password">Password:<strong style="color:red">*</strong></label>
						</div>
						<div class="offset-1 col-8">
							<div class="form-group">
								<input name='password' type="password" id="password" class="form-control form-control" placeholder="Ex: ******" autofocus="autofocus">
							</div>
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<div class="col-3">
							<label for="ch_cpassword">Confirm Password:<strong style="color:red">*</strong></label>
						</div>
						<div class="offset-1 col-8">
							<div class="form-group">
								<input name='cpassword' type="password" id="cpassword" class="form-control form-control" placeholder="Ex: ******" autofocus="autofocus">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="offset-8 col-1">
							<button type="submit" name="Confirm" class="btn btn-md btn-success">Confirm</button>
						</div>
						<div class="offset-1 col-1">
							<button type="button" name="Cancel" class="btn btn-md btn-danger" data-target="chnge_pass" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="double_check1" tabindex="-1" role="dialog" aria-labelledby="check" aria-hidden="true">
	<div class="modal-dialog" style="min-width: 700px">
		<div class="modal-content">
			<div class="modal-body">
				<div class="container">
					<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
					<legend class="text-center">Are you sure to delete this user?</legend>
					<hr>
					<div class="row">
						<div class="offset-4 col-1">
							<input id="deleteUser" type="button" name="Yes" value="Yes" class="btn btn-md btn-success" userID="yes" onclick = 'confirmedDelete(this)'>
						</div>
						<div class="offset-1 scol-1">
							<input type="button" name="No" value="No" class="btn btn-md btn-danger" data-target="double_check1" data-dismiss="modal">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>