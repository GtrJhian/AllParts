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
		@include('components.menu_inventory')
		<div id="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					{{-- <div class="col-sm-1">
						<button id="sidebarBtn">Menu</button>
					</div> --}}

					<div class="col-sm-12">
						{{-- <ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
							<li class="breadcrumb-item">
								<a href="/inventoryMain" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">INVENTORY</a>
							</li>
						</ol> --}}
						<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
							<li class="breadcrumb-item">
								<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-box" style="font-size:23px"></i> Inventory</strong>
								</h6>
							</li>
						</ol>
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="table-responsive">
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
											<th style="width: 15%;">Action</th>
										</thead>
										<tbody>
											@foreach($inventories as $inventory)
											<tr id="trID_{{$inventory->Item_ID}}">
												@if($inventory->Item_Quantity<=$inventory->Alarm_Quantity)
												<td><p style="color:red"><b>{{$inventory->Item_Code}}</b></p></td>
												@else
												<td><p><b>{{$inventory->Item_Code}}</b></p></td>
												@endif
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
											<td>₱{{$inventory->Item_Price}}</td>
											<td>{{$inventory->Alarm_Quantity}} {{$inventory->Item_Unit}}s</td>
											<td>
												<button class="view_btn btn btn-primary btn-action-invt">
													<i class="fa fa-eye"></i>
												</button>
												@if($inventory->Item_Type==0)
												<button class="update_item_btn btn btn-primary btn-action-invt">
													<i class="fa fa-edit"></i>
												</button>
												@else
												<button class="update_pckg_btn btn btn-primary btn-action-invt">
													<i class="fa fa-edit"></i>
												</button>
												@endif
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
	</div>

	<div class="zoom-top">
		<a href="/archiveInventory" class="zoom-fab zoom-btn-black zoom-btn-sm tooltip-iventory">
			<i class="fa fa-archive"></i>
			<span class="tooltip-iventorytext">ARCHIVE</span>
		</a> 
	</div>




	<!---REMOVE ITEM FORM ----->
	@include('Inventory.modal-invt.removeItem')
	<!---REMOVE ITEM FORM ----->
	@include('Inventory.modal-invt.viewItemModal')
	<!---UPDATE ITEM FORM ----->
	@include('Inventory.modal-invt.updateItemModal')
	<!---UPDATE PACKAGE FORM ----->
	@include('Inventory.modal-invt.updatePackageModal')
	<!-- CREATE INVENTORY MODAL -->
	@include('Inventory.modal-invt.createInventory')


	<datalist id="items">
		@foreach($inventories as $inventory)
		<option value="{{$inventory->Item_Code}}">
			@endforeach
		</datalist>

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
	// $(document).ready(function(){
	// 	$("#sidebarBtn").click(function(){
	// 		if($("#sidebarInvt").hasClass('sidebar-hide')){
	// 			$("#sidebarInvt").removeClass('sidebar-hide').addClass('sidebar');
	// 		}
	// 		else{
	// 			$("#sidebarInvt").addClass('sidebar-hide');
	// 		}
			
	// 	});
	// });

	

//function for update item button	
$('.update_item_btn').click(function(){
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


//function for update button	
$('.update_pckg_btn').click(function(){
	var $row = $(this).closest('tr');
	var rowID = $row.attr('id').split('_')[1];
	$('#upd').val(rowID);
	$.ajax({
		method: "POST",
		url: "{{ route('popItemForm') }}",
		data:{itemID:rowID,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			document.getElementById("upc").value = array[0].Item_Code;
			document.getElementById("updesc").value = array[0].Item_Description;
			document.getElementById("upp").value = array[0].Item_Price;
			$('#upb').val(array[0].Item_Brand);
			$('#upcat').val(array[0].Item_Category);
			getPackageItems(rowID);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("ERROR IN REQUEST");
		} 
	});
	$('#updatePackage').modal('show');
});

//populate package list of items
function getPackageItems(package_id){
	var pckg_id=package_id;
	$.ajax({
		method: "POST",
		url: "{{ route('popPckgList') }}",
		data:{itemID:pckg_id,'_token':"{{csrf_token()}}"},
		success: function (data){
			$("#list_items").html(data);	
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("ERROR IN REQUEST");
		} 
	});
}


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

//function for view button
$('.view_btn').click(function(){
	$('#viewItem').modal('show');
});

/*function for multiple item in packages create*/
function numOfLines(choice)
{
	document.getElementById("input_items").innerHTML='';
	for(var i = 0; i < choice; ++i)
	{
		document.getElementById("input_items").innerHTML+= '<div class="row">' +
		'<div class="col-sm-6"><label>Item Code:</label><input class="form-control" list="items" name="in-'+i+'" size="50" maxlength="50" required ></div> ' +
		'<div class="form-group col-sm-6"><label>Quantity Needed:</label><input class="form-control" type="number" name="iq-'+i+'" size="6" maxlength="6" value="1" min="1" required ></div>'+
		'</div>';
	}
}

</script>

@stop