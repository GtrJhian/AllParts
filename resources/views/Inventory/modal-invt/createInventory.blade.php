<div class="modal fade" id="invtCreate">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create New</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-pills nav-justified" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#createItem">ITEM</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#package">PACKAGE</a>
					</li>
				</ul>


				<!---- CREATE ITEM FORM----->
				<div class="tab-content">
					<div id="createItem" class="container tab-pane active"><br>
						<form id="itemCreate" action="/createItem" method="post"/>
						{{ csrf_field() }}
						<div class="form-horizontal">
							<div class="row">
								<label class="col-sm-3">Code: </label>
								<div class="col-sm-9">
									<input type="text" name="ic" id="ic"required class="form-control" ><div id="icwarnm"></div>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-3">Description: </label>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<textarea class="form-control" name="id" required></textarea>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Brand: </label>
								<div class="col-sm-8">
									<?php
									$brands = \DB::table('item_brands')->where('archive',0)->orderBy('brand_name','ASC')->get();				
									?>
									<select class="form-control" id="select-branch" name="ib">
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
									<select class="form-control" id="select-branch" name="icat">
										@foreach($categories as $category)
										<option value="{{$category->category_id}}">{{$category->item_category}}</option>
										@endforeach
									</select> 
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<label>Price: ₱</label>
									<input class="form-control" type="number" name="ip" min="0.01" step=".01" value="1" required>
								</div>
								<div class="col-sm-6">
									<label>Unit:</label>
									<input type="text" name="iuom" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label>Quantity:</label>
									<input type="number" name="iq" min="0" value="0" class="form-control" required>
								</div>
								<div class="col-sm-6">
									<label>Alarm Quantity:</label>
									<input type="number" name="iaq" min="0" value="0" class="form-control" required>
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<input class="btn btn-success btn-block" type="submit" id="cisubmit" name="cisubmit" value="Create">
								</div>
								<div class="col-sm-6">
									<input class="btn btn-danger btn-block" type="reset" id="cireset"name="cireset" value="Clear">
								</div>
							</div>
						</div>
					</form>
				</div>


				<!---- CREATE Package FORM----->
				<div id="package" class="container tab-pane fade"><br>
					<form id="packageCreate" action="/createPackage" method="post"/>
					{{ csrf_field() }}
					<div class="row">
						<label class="col-sm-3">Code: </label>
						<div class="col-sm-9">
							<input type="text" id="pc"name="pc" required class="form-control">
						</div><div id="pcwarnm"></div>
					</div>
					<br>
					<div class="row">
						<label class="col-sm-3">Description: </label>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<textarea class="form-control" name="pd" required></textarea>
						</div>
					</div><br>
					<div class="row">
						<label class="col-sm-4">Brand: </label>
						<div class="col-sm-8">
							<?php
							$brands = \DB::table('item_brands')->where('archive',0)->orderBy('brand_name','ASC')->get();			
							?>
							<select class="form-control" id="select-branch" name="pb">
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
							<select class="form-control" id="select-branch" name="pcat">
								@foreach($categories as $category)
								<option value="{{$category->category_id}}">{{$category->item_category}}</option>
								@endforeach
							</select> 
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-6">
							<label>Price: ₱</label>
							<input class="form-control" type="number" name="pp" min="0.01" step=".01" value="1" required>
						</div>
						<div class="col-sm-6">
							<label>Unit:</label>
							<input type="text" name="puom" class="form-control" value="Set" required disabled>
						</div>
					</div>
					<!--<div class="row">
						<div class="col-sm-6">
							<label>Quantity:</label>
							<input type="number" name="pq" min="0" value="0" class="form-control" required>
						</div>
						<div class="col-sm-6">
							<label>Alarm Quantity:</label>
							<input type="number" name="paq" min="0" value="0" class="form-control" required>
						</div>
					</div>--><br> 
					<div class="row">
						<label class="col-sm-4">Number of Items Required: </label>
						<div class="col-sm-3">
							<input class="form-control" type="number" id="ItemCount" name="ItemList" maxlength=3 min=1 onChange="numOfLines(this.value);" required>
						</div>
					</div>
					<hr>
					<div id="input_items">			
					</div>
					<center><p id="output"></p></center>
					<div class="row">
						<input class="btn btn-info d-block mx-auto button-view" type="submit" name="cpsubmit" value="Create Package" id="cpsubmit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
{{-- end inventory CREATE --}}