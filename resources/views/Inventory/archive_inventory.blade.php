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
					<div class="col-sm-1">
						<a href="/inventory" class="btn btn-secondary d-block mx-auto back-btn">
							<i class="fa fa-arrow-left back-btn-icon"></i>
						</a>
					</div>
					<div class="col-sm-11">
						<ol class="breadcrumb" style="border-radius: 0px">
							<li class="breadcrumb-item">
								<a href="/inventoryMain" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">INVENTORY</a>
							</li>
							<li class="breadcrumb-item">
								<a href="/archiveInventory" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">ARCHIVE</a>
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
									$inventories = \DB::table('inventory')->where('archive',1)->orderBy('item_code','ASC')->get();
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
												<button class="unarchive_btn btn btn-primary btn-action-invt">
													<i class="fa fa-check"></i>
												</button>
												<button class="delete_btn btn btn-danger btn-action-invt">
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


	{{-- Delete item--}}
	<div class="modal fade" id="deleteItem">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="itemDelete" action="/deleteItem" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="did" name="did">
					<input type="hidden" id="dic" name="dic">
					<div class="modal-header">
						<h4>Remove Message</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Are you sure you want to permanently delete <p id="del_item_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-danger" type="submit" name="aisubmit" value="Delete">
							</div>
							<div class="col-sm-6">
								<input type="button" class="del_close_confirm btn btn-primary" value="Cancel">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end Delete item--}}

	{{-- Return Item--}}
	<div class="modal fade" id="returnItem">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="itemUnarchive" action="/unarchiveItem" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="aid" name="aid">
					<input type="hidden" id="aic" name="aic">
					<div class="modal-header">
						<h4>Return Message</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Do you want to restore <p id="item_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-primary" type="submit" name="aisubmit" value="Yes">
							</div>
							<div class="col-sm-6">
								<input type="button" class="close_confirm btn btn-danger" value="No">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end Return Item--}}


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

//function for archive button
$('.unarchive_btn').click(function(){
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
	$('#returnItem').modal('show');
});


$('.close_confirm').click(function(){	
	$('#returnItem').modal('toggle');
});

$('.del_close_confirm').click(function(){	
	$('#deleteItem').modal('toggle');
});

//function for delete button
$('.delete_btn').click(function(){
	var $row = $(this).closest('tr');
	var rowID = $row.attr('id').split('_')[1];
	var $paragraph = $('#del_item_name');
	$('#did').val(rowID);
	$.ajax({
		method: "POST",
		url: "{{ route('popItemForm') }}",
		data:{itemID:rowID,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			$paragraph.text(array[0].Item_Code+"?");
			document.getElementById("dic").value = array[0].Item_Code;
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("ERROR IN REQUEST");
		} 
	});
	$('#deleteItem').modal('show');
});


</script>


@stop