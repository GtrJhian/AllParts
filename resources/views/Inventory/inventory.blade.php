@extends('components/main')

@section('content')


<script>
	var msg = '{{Session::get('alert')}}';
	var exist = '{{Session::has('alert')}}';
	var evalmsg = msg.replace(/(&quot\;)/g,"\"");
	if(exist){
		alert(evalmsg);
	}
</script>

<body>
	@include('components.nav2')
	<div id="wrapper">
		@include('components.menu2')
		<div id="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-1">
						<a href="/selectInventory" class="btn btn-secondary d-block mx-auto back-btn">
							<i class="fa fa-arrow-left back-btn-icon"></i>
						</a>
					</div>
					<div class="col-sm-11">
						<ol class="breadcrumb" style="border-radius: 0px">
							<li class="breadcrumb-item">
								<a href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">INVENTORY</a>
							</li>
						</ol>
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="table-responsive">
									<?php
									$inventories = \DB::table('inventory')->where('archive',0)->orderBy('item_code','ASC')->get();
									?>
									<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
										<thead>
											<th>Item Code</th>
											<th>Description</th>
											<th>Brand</th>
											<th>Category</th>
											<th>Type</th>
											<th>Quantity</th>
											<th>Price/Unit</th>
											<th>Alarm Quantity</th>
											<th>Action</th>
										</thead>
										<tbody>
											@foreach($inventories as $inventory)
											<tr id="trID_{{$inventory->Item_ID}}">
												<td><b>{{$inventory->Item_Code}}</b></td>
												<td>{{$inventory->Item_Description}}</td>
												<td>
													<?php
													$brand = \DB::table('item_brands')->where('brand_id',$inventory->Item_Brand)->value('brand_name');
													?>
													{{$brand}}
												</td>
												<td>
													<?php
													$category = \DB::table('item_categories')->where('category_id',$inventory->Item_Category)->value('item_category');
													?>
													{{$category}}
												</td>
												<td><?php
												if($inventory->Item_Type==0){
													echo "Item";
												}
												else{
													echo "Package";
												}
												?>
											</td>
											<td>{{$inventory->Item_Quantity}} {{$inventory->Item_Unit}}s</td>
											<td>P{{$inventory->Item_Price}}</td>
											<td>{{$inventory->Alarm_Quantity}} {{$inventory->Item_Unit}}s</td>
											<td>
												<button class="update_btn btn btn-primary btn-action-invt">
													<i class="fa fa-edit"></i>
												</button>
												<button class="archive_btn btn btn-danger btn-action-invt">
													<i class="fa fa-times"></i>
												</button>
											</td></tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="d-block mx-auto">
						<a href="/archiveInventory" class="btn btn-primary">Archive Inventory</a>
					</div>
				</div>
			</div>
			@include('components.footer2')
		</div>
	</div>

	{{-- Buttom Icon --}}
	<div class="zoom">
		<a class="zoom-fab zoom-btn-green zoom-btn-large tooltip-iventory-green" data-toggle="modal" data-target="#invtCreate">
			<i class="fa fa-plus"></i>
			<span class="tooltip-iventorytext-green">CREATE</span>
		</a>
		{{-- 	<ul class="zoom-menu">
			<li>
				<a class="zoom-fab zoom-btn-sm zoom-btn-green scale-transition scale-out tooltip-iventory-green" data-toggle="modal" data-target="#invtCreate">
					<i class="fa fa-plus"></i><span class="tooltip-iventorytext-green">CREATE</span>
				</a>
			</li>
		</ul> --}}
	</div>

	{{-- Remove item--}}
	<div class="modal fade" id="removeItem">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="itemArchive" action="/archiveItem" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="aid" name="aid">
					<input type="hidden" id="aic" name="aic">
					<div class="modal-header">
						<h4>Remove Message</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Are you sure you want to archive <p id="item_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-danger" type="submit" name="aisubmit" value="Archive">
							</div>
							<div class="col-sm-6">
								<input type="button" class="close_confirm btn btn-primary" value="Cancel">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end remove item--}}


	<!---UPDATE ITEM FORM -->
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
									<label>Price:</label>
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


				<!-- CREATE ITEM FORM-->
				<div class="tab-content">
					<div id="createItem" class="container tab-pane active"><br>
						<form id="itemCreate" action="/createItem" method="post"/>
						{{ csrf_field() }}
						<div class="form-horizontal">
							<div class="row">
								<label class="col-sm-3">Code: </label>
								<div class="col-sm-9">
									<input type="text" name="ic" required class="form-control">
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
									<label>Price:</label>
									<input class="form-control" type="number" name="ip" min="0" step=".01" value="0" required>
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
									<input class="btn btn-success btn-block" type="submit" name="cisubmit" value="Create">
								</div>
								<div class="col-sm-6">
									<input class="btn btn-danger btn-block" type="reset" name="cireset" value="Clear">
								</div>
							</div>
						</div>
					</form>
				</div>


				<!-- CREATE Package FORM-->
				<div id="package" class="container tab-pane fade"><br>
					<label class="col-sm-3">Code: </label>
					<div class="col-sm-9">
						<input type="text" name="pc" required class="form-control">
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
							<label>Price:</label>
							<input class="form-control" type="number" name="pp" min="0" step=".01" value="0" required>
						</div>
						<div class="col-sm-6">
							<label>Unit:</label>
							<input type="text" name="puom" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Quantity:</label>
							<input type="number" name="pq" min="0" value="0" class="form-control" required>
						</div>
						<div class="col-sm-6">
							<label>Alarm Quantity:</label>
							<input type="number" name="paq" min="0" value="0" class="form-control" required>
						</div>
					</div><br>
					<div class="row">
						<label class="col-sm-4">Number of Items Required: </label>
						<div class="col-sm-3">
							<input class="form-control" type="number" name="ItemList" maxlength=3 min=1 onChange="numOfLines(this.value);" required>
						</div>
					</div>
					<hr>
					<div id="input_items">			
					</div>
					<div class="row">
						<input class="btn btn-info d-block mx-auto button-view" type="submit" name="cpsubmit" value="Create">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
{{-- end inventory CREATE --}}
</body>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#itemlist').DataTable();
	});
	// $('#zoomBtn').click(function() {
	// 	$('.zoom-btn-sm').toggleClass('scale-out');
	// 	if (!$('.zoom-card').hasClass('scale-out')) {
	// 		$('.zoom-card').toggleClass('scale-out');
	// 	}
	// });
//function for update button	
$('.update_btn').click(function(){
	var $row = $(this).closest('tr');
	var rowID = $row.attr('id').split('_')[1];
	$('#uid').val(rowID);
	$.ajax({
		method: "POST",
		url: "{{ route('popItemForm') }}",
		data:{itemID:rowID,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			document.getElementById("uic").value = array[0].Item_Code;
			document.getElementById("uidesc").value = array[0].Item_Description;
			document.getElementById("uip").value = array[0].Item_Price;
			document.getElementById("uiuom").value = array[0].Item_Unit;
			document.getElementById("uiq").value = array[0].Item_Quantity;
			document.getElementById("uiaq").value = array[0].Alarm_Quantity;
			$('#uib').val(array[0].Item_Brand);
			$('#uicat').val(array[0].Item_Category);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("ERROR IN REQUEST");
		} 
	});
	$('#updateItem').modal('show');
});
$('.close_confirm').click(function(){	
	$('#removeItem').modal('toggle');
});
//function for archive button
$('.archive_btn').click(function(){
	var $row = $(this).closest('tr');
	var rowID = $row.attr('id').split('_')[1];
	var $paragraph = $('#item_name');
	$('#aid').val(rowID);
	$.ajax({
		method: "POST",
		url: "{{ route('popItemForm') }}",
		data:{itemID:rowID,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			$paragraph.text(array[0].Item_Code+"?");
			document.getElementById("aic").value = array[0].Item_Code;
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("ERROR IN REQUEST");
		} 
	});
	$('#removeItem').modal('show');
});
</script>

<script language="javascript" type="text/javascript">
	function numOfLines(choice)
	{
		document.getElementById("input_items").innerHTML='';
		for(var i = 0; i < choice; ++i)
		{
			document.getElementById("input_items").innerHTML+= '<div class="row">' +
			'<div class="col-sm-6"><label>Item Name:</label><input class="form-control" list="items" name="in-'+i+'" size="50" maxlength="50" required ></div> ' +
			'<div class="form-group col-sm-6"><label>Quantity Needed:</label><input class="form-control" type="number" name="iq-'+i+'" size="6" maxlength="6" value="1" min="1" required ></div>'+
			'</div>';
		}
	}
</script>


@stop