<div class="modal fade" id="updatePackage">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">UPDATE PACKAGE</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-pills nav-justified" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#info">INFO</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#list">LIST OF ITEMS</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="info" class="container tab-pane active"><br>
						<form id="packageInfoUpdate" action="/updatePckgInfo" method="post"/>
						{{ csrf_field() }}
						<input type="hidden" value="" id="upd" name="upd">

						<div class="form-horizontal">
							<div class="row">
								<label class="col-sm-3">Code: </label>
								<div class="col-sm-9">
									<input type="text" id="upc" name="pc" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-3">Description: </label>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<textarea class="form-control" id="updesc" name="pd" required></textarea>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Brand: </label>
								<div class="col-sm-8">
									<?php
									$brands = \DB::table('item_brands')->where('archive',0)->orderBy('brand_name','ASC')->get();			
									?>
									<select class="form-control" id="upb" name="pb">
										@foreach($brands as $brand)
										<option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
										@endforeach
									</select> 
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Category: </label>
								<div class="col-sm-8">
									<?php
									$categories = \DB::table('item_categories')->where('archive',0)->orderBy('item_category','ASC')->get();	
									?>
									<select class="form-control" id="upcat" name="pcat">
										@foreach($categories as $category)
										<option value="{{$category->category_id}}">{{$category->item_category}}</option>
										@endforeach
									</select> 
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<label>Price: ₱</label>
									<input class="form-control" type="number" id="upp" name="pp" min="0" step=".01" value="0" required>
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<input class="btn btn-success btn-block" type="submit" name="upsubmit" value="Update Info">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div id="list" class="container tab-pane fade">
					<form id="packageListUpdate" action="/updatePckgList" method="post">
						{{ csrf_field() }}
					<hr>
					<div id="list_items">			
					</div>

					<div class="row">
						<div class="col-sm-6">
							<input class="btn btn-success btn-block" type="submit" name="upsubmit" value="Update List">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div> {{-- end UPDATE package --}}
