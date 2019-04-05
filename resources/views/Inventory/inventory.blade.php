@extends('components/main')

@section('content')



<body>
	@include('components.nav_sales')
	<div id="wrapper" class="offset1">
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
								<div class="table-responsive" id="wrapper">
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
										<tbody id="itemlist_body">
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
	<script>
	var msg = '{{Session::get('alert')}}';
	var exist = '{{Session::has('alert')}}';
	var evalmsg = msg.replace(/(&quot\;)/g,"\"");
	if(exist){
		alert(evalmsg);
		evalmsg=null;
	}

</script>



	<script type="text/javascript">

		//ready inventory table with refresh every minute
		$(document).ready(function() {
			function load_item_table()
    {
    	$.ajax({
    		method: "POST",
    		url: "{{ route('getInvItems') }}",
    		data:{'_token':"{{csrf_token()}}"},
    		success: function (data){
    			var array = jQuery.parseJSON(data);
    		//	$('#table_body').html(array.notification);
    			$("#itemlist").dataTable().fnDestroy()
    			$("#itemlist_body").empty();
    			$('#itemlist').find('tbody').append(array.notification);
    			$('#itemlist').DataTable();
    			   
    		}
    	});


    }

    load_item_table();

//refresh every 5 minute
setInterval(function(){
	load_item_table();;
}, 300000);


//function for update item button	
$(document).delegate('.update_item_btn', 'click', function(){
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
		} 
	});
	$('#updateItem').modal('show');
});


//function for update button	
$(document).delegate('.update_pckg_btn', 'click', function(){
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
		}
	});
}


$(document).delegate('.close_confirm', 'click', function(){	
	$('#removeItem').modal('toggle');
});
//function for archive button

$(document).delegate('.archive_btn', 'click', function(){
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
		}
	});
	$('#removeItem').modal('show');
});



//function for view button
$(document).delegate('.view_btn', 'click', function(){
	$('#viewItem').modal('show');
	var row = $(this).closest('tr');
	var rowID = row.attr('id').split('_')[1];
	var itemcode = $('#itemcode');
	var brand = $('#brand');
	var category = $('#category');
	var quantity = $('#quantity');
	var description = $('#description');
	var price = $('#price');
	var plist = $('#package_itemlist');
	var type = $('#itemtype');
	$.ajax({
		method: "POST",
		url: "{{ route('viewItem') }}",
		data:{itemID:rowID,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			itemcode.text(array[0].ic);
			brand.text(array[0].ib);
			category.text(array[0].icateg);
			quantity.text(array[0].iq);
			description.text(array[0].idesc);
			price.text(array[0].ip);
			plist.html(array[0].plist);
			type.text(array[0].type);
			document.getElementById("brandpic").src=array[0].bpic;
			document.getElementById("categorypic").src=array[0].cpic;
		//	document.getElementById("aic").value = array[0].Item_Code;
		}
	});
});
 $('#ic').on('blur', function(){
 		var nc=$('#ic').val();
	$.ajax({
		method: "POST",
		url: "{{ route('checkCode') }}",
		data:{itemCode:nc,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			$("#icwarnm").html(array[0].message);	
			if(array[0].exist==0){
				$('#cisubmit').prop('disabled', false);
			}
			else{
				$('#cisubmit').prop('disabled', true);
			}
		}
	});
});

 $(document).delegate('#cireset', 'click', function(){	
$('#cisubmit').prop('disabled', false);
 });


$('#pc').on('blur', function(){
 		var nc=$('#pc').val();
	$.ajax({
		method: "POST",
		url: "{{ route('checkCode') }}",
		data:{itemCode:nc,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			$("#pcwarnm").html(array[0].message);	
			if(array[0].exist==0){
				$('#cpsubmit').prop('disabled', false);
			}
			else{
				$('#cpsubmit').prop('disabled', true);
			}
		}
	});
});

$(document).delegate('.package_item', 'change', function(){
	var option 			= $('#items option');
	var output 			= $('#output');
	var val = this.value;
		if($(option).filter(function(){
			return this.value === val;
		}).length) {
			output.html("");
		}else{
			this.value="";
			output.html("Item doesn't Exist");
		}     

});

$("#ItemCount").change(function(){
/*function for multiple item in packages create*/

	var choice=$('#ItemCount').val();
	document.getElementById("input_items").innerHTML='';
	for(var i = 0; i < choice; ++i)
	{
		document.getElementById("input_items").innerHTML+= '<div class="row">' +
		'<div class="col-sm-6"><label>Item Code:</label><input class="package_item form-control" list="items" name="in-'+i+'" size="50" maxlength="50" required ></div> ' +
		'<div class="form-group col-sm-6"><label>Quantity Needed:</label><input class="form-control" type="number" name="iq-'+i+'" size="6" maxlength="6" value="1" min="1" required ></div>'+
		'</div>';
	}

});





	});
</script>

@stop