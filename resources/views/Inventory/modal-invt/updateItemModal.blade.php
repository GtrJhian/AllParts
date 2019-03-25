	<div class="modal fade" id="updateItem">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">UPDATE ITEM</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div id="item" class="container tab-pane active"><br>
						<form id="itemCreate" action="/updateItem" method="post"/>
						{{ csrf_field() }}
						<input type="hidden" value="" id="uid" name="uid">

						<div class="form-horizontal">
							<div class="row">
								<label class="col-sm-3">Code: </label>
								<div class="col-sm-9">
									<input type="text" id="uic" name="ic" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-3">Description: </label>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<textarea class="form-control" id="uidesc" name="id" required></textarea>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Brand: </label>
								<div class="col-sm-8">
									<?php
									$brands = \DB::table('item_brands')->where('archive',0)->orderBy('brand_name','ASC')->get();			
									?>
									<select class="form-control" id="uib" name="ib">
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
									<select class="form-control" id="uicat" name="icat">
										@foreach($categories as $category)
										<option value="{{$category->category_id}}">{{$category->item_category}}</option>
										@endforeach
									</select> 
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<label>Price: ₱</label>
									<input class="form-control" type="number" id="uip" name="ip" min="0" step=".01" value="0" required>
								</div>
								<div class="col-sm-6">
									<label>Unit:</label>
									<input type="text" name="iuom" id="uiuom" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label>Quantity:</label>
									<input type="number" name="iq" min="0" value="0" id="uiq" class="form-control" required>
								</div>
								<div class="col-sm-6">
									<label>Alarm Quantity:</label>
									<input type="number" name="iaq" min="0" value="0" id="uiaq" class="form-control" required>
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