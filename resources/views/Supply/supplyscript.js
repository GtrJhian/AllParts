//  <datalist id="supply">
// 		@foreach($supplier as $supply)
// 		<option value="{{$supply->Supplier_ID}}">
// 			@endforeach
// 		</datalist>

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
	$('#updatesupplier').modal('show');
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
	$('#removesupplier').modal('show');
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