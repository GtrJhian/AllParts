<div class="modal fade" id="catbrandCreate">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create New</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-pills nav-justified" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#createCategory">CATEGORY</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#createBrands">BRAND</a>
					</li>
				</ul>

					<!---- CREATE CATEGORY AND BRANDS FORM----->
					<div class="tab-content">
						<div id="createCategory" class="container tab-pane active"><br>
							<form id="createCategory" action="/createCategory" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-horizontal">
									<div class="row">
										<div class="col-sm-6">
											<label>Category Name: </label>
											<input type="text" name="cn" id="cn" required class="form-control"><div id="cnwarnm"></div>
											<hr>	
											<label for="imageInput">Image</label>
											<input name="categ_img" type="file" id="imageInput">
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-12">
											<input class="btn btn-success d-block mx-auto" type="submit" id="cnsubmit" name="cnsubmit" value="Create Category">
										</div>
								</div>
							</div>
						</form>
					</div>

						<div id="createBrands" class="container tab-pane fade"><br>
							<form id="createBrands" action="/createBrand" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-horizontal">
									<div class="row">
										<div class="col-sm-6">
											<label>Brand Name: </label>
											<input type="text" name="bn" id="bn" required class="form-control"><div id="bnwarnm"></div>
											<hr>
											<label for="imageInput">Image</label>
											<input name="brand_img" type="file" id="imageInput">
										</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-12">
										<input class="btn btn-success d-block mx-auto" type="submit" id="bnsubmit" name="cisubmit" value="Create Brand">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
