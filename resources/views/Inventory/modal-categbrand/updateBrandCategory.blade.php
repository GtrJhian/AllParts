<div class="modal fade" id="updateCategory">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">UPDATE CATEGORY</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div id="updateCategory" class="container tab-pane active"><br>
					<form id="updateCategory" action="/updateCategory" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="cid" id="cid">
						<div class="form-horizontal">
							<div class="row">
								<div class="col-sm-6">
									<label>Category Name: </label>
									<input type="text" name="ucn" id="ucn" required class="form-control">
									<hr>
									<label>Preview Image</label>
									<img id="prevCateg" width="150" height="150">
									<input name="categ_img" type="file" id="categ_img">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12">
									<input class="btn btn-success d-block mx-auto" type="submit" name="cnsubmit" value="Update Category">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> 
</div>{{-- end UPDATE category --}}


<div class="modal fade" id="updateBrand">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">UPDATE BRAND</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div id="updateBrand" class="container tab-pane active"><br>
					<form id="updateBrand" action="/updateBrand" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="bid" id="bid">
						<div class="form-horizontal">
							<div class="row">
								<div class="col-sm-6">
									<label>Brand Name: </label>
									<input type="text" id="ubn" name="ubn" required class="form-control">
									<hr>
									<label>Preview Image</label>
									<img id="prevBrand" width="150" height="150">	
									<input name="brand_img" type="file" id="brand_img">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12">
									<input class="btn btn-success d-block mx-auto" type="submit" name="cnsubmit" value="Update Brand">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> 
</div>{{-- end UPDATE brand --}}