<!-- Breadcrumbs-->
				<ol class="breadcrumb" style="border-radius: 0px">
					<li class="breadcrumb-item">
						<a href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">Suppliers</a>
					</li>
				</ol>

				<div class="card mb-3">
					<div class="card-header">
						 
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<nav>
									<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
										<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Suppliers Information</a>
										<!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reports</a> -->
									</div>
								</nav>
								<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
									<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										

										<div class="card mb-3">
									<div class="card-body">
										<div class="row">
											<div class="col">
												<div class="table-responsive">
													<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
														<thead>
															<th>Company Name</th>
															<th>Address</th>
															<th>Supplier Agent</th>
															<th>Contact Info</th>
															<th>Company E-mail</th>
															<th>Action</th>
														</thead>
														<tbody>
															<tr id="">
																<td><b>Sample Company</b></td>
																<td>Sample Address</td>
																<td>
																	Sample Agent
																</td>
																<td>
																	Sample Contact
																</td>
																<td>
																	Sample email
																</td>
															<td>
																<button class="update_btn btn btn-primary btn-action-invt">
																	<i class="fa fa-edit"></i>
																</button>
																<button class="archive_btn btn btn-danger btn-action-invt">
																	<i class="fa fa-times"></i>
																</button>
															</td></tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>

									</div>
									<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
										<table class="table table-bordered">
											<thead>
												<th>Quantity</th>
												<th>Unit</th>
												<th>Item</th>
												<th>Unit Price</th>
												<th>Amount</th>
											</thead>
											<tbody>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tbody>
										</table>
										<div class="row">
											<div class="col-2 offset-5" style="float:right">
												<input type="submit" name="Pay" class="btn btn-success">
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<!-- <div class="card-footer small text-muted">Issued By: <span style="font-weight: bold">Juan Dela Cruz</span></div> -->
				</div>
				{{-- Buttom Icon --}}
	<div class="zoom">
		<a class="zoom-fab zoom-btn-green zoom-btn-large tooltip-iventory-green" data-toggle="modal" data-target="#supplyAdd">
			<i class="fa fa-plus"></i>
			<span class="tooltip-iventorytext-green">ADD</span>
		</a>
		{{-- 	<ul class="zoom-menu">
			<li>
				<a class="zoom-fab zoom-btn-sm zoom-btn-green scale-transition scale-out tooltip-iventory-green">
					<i class="fa fa-plus"></i><span class="tooltip-iventorytext-green">ADD</span>
				</a>
			</li>
		</ul> --}}
	</div>

@include('Supply.Modals.addmodal')
@include('Supply.Modals.updatemodal')



