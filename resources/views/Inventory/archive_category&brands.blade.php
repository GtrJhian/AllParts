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
						<a href="/category&brands" class="btn btn-secondary d-block mx-auto back-btn">
							<i class="fa fa-arrow-left back-btn-icon"></i>
						</a>
					</div> --}}
					<div class="col-sm-11">
						{{-- <ol class="breadcrumb" style="border-radius: 0px">
							<li class="breadcrumb-item">
								<a href="/category&brands" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">CATEGORY & BRANDS</a>
							</li>
							<li class="breadcrumb-item">
								<a href="/archiveCategory&Brands" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">ARCHIVE</a>
							</li>
						</ol> --}}
						<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
							<li class="breadcrumb-item">
								<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-layer-group" style="font-size:23px"></i> Category & Brands / Archive</strong>
								</h6>
							</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h4 class="text-center"><b>Categories</b></h4><hr>
										<div class="table-responsive">
											<?php
											$categories = \DB::table('item_categories')->where('archive',1)->orderBy('item_category','ASC')->get();
											?>
											<table class="table table-striped" id="categoryTable" width="100%" cellspacing="0">
												<thead>
													<th>Picture</th>
													<th>Item Category</th>
													<th>Action</th>
												</thead>
												<tbody>
													@foreach($categories as $category)
													<tr id="trID_{{$category->category_id}}">
														<?php
														$categpic = \DB::table('item_pics')->where('pic_id',$category->categ_pic)->first();
														?>
														@if($categpic===null)
														<td><img src="/inventory/none.png" width="50" height="50"></td>
														@else
														<td><img src="{{$categpic->pic_url}}"  width="50" height="50"></td>
														@endif
														<td><b>{{$category->item_category}}</b></td>
														<td>
															<button class="unarchive_btn_ca btn btn-primary btn-action-invt">
																<i class="fa fa-check"></i>
															</button>
															<button class="delete_btn_ca btn btn-danger btn-action-invt">
																<i class="fa fa-times"></i>
															</button>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h4 class="text-center"><b>Brands</b></h4><hr>
										<div class="table-responsive">
											<?php
											$brands = \DB::table('item_brands')->where('archive',1)->orderBy('brand_name','ASC')->get();
											?>
											<table class="table table-striped" id="brandsTable" width="100%" cellspacing="0">
												<thead>
													<th>Picture</th>
													<th>Brand Name</th>
													<th>Action</th>
												</thead>
												<tbody>
													@foreach($brands as $brand)
													<tr id="trID_{{$brand->brand_id}}">
														<?php
														$brandpic = \DB::table('item_pics')->where('pic_id',$brand->brand_pic)->first();
														?>
														@if($brandpic===null)
														<td><img src="/inventory/none.png" width="50" height="50"></td>
														@else
														<td><img src="{{$brandpic->pic_url}}"  width="50" height="50"></td>
														@endif
														<td><b>{{$brand->brand_name}}</b></td>
														<td>
															<button class="unarchive_btn_br btn btn-primary btn-action-invt">
																<i class="fa fa-check"></i>
															</button>
															<button class="delete_btn_br btn btn-danger btn-action-invt">
																<i class="fa fa-times"></i>
															</button>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			@include('components.footer2')
		</div>
	</div>
	<div class="zoom">
		<a class="zoom-fab zoom-btn-blue zoom-btn-large tooltip-iventory-blue" href="/category&brands">
			<i class="fa fa-arrow-left"></i>
			<span class="tooltip-iventorytext-blue">Back</span>
		</a>
	</div>



	{{-- Return Brand--}}
	<div class="modal fade" id="returnBrand">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="brandUnarchive" action="/unarchiveBrand" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="abid" name="abid">
					<input type="hidden" id="abn" name="abn">
					<div class="modal-header">
						<h4>Return Message</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Do you want to restore <p id="brand_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-primary" type="submit" name="absubmit" value="Yes">
							</div>
							<div class="col-sm-6">
								<input type="button" class="close_confirm_br btn btn-danger" value="No">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end Return Brand--}}

	{{-- Delete Brand--}}
	<div class="modal fade" id="deleteBrand">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="brandDelete" action="/deleteBrand" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="dbid" name="dbid">
					<input type="hidden" id="dbn" name="dbn">
					<div class="modal-header">
						<h4>Delete</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Do you want to permanently delete <p id="del_brand_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-primary" type="submit" name="absubmit" value="Yes">
							</div>
							<div class="col-sm-6">
								<input type="button" class="del_close_confirm_br btn btn-danger" value="No">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end Delete Brand--}}


	{{-- Return Category--}}
	<div class="modal fade" id="returnCategory">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="categoryUnarchive" action="/unarchiveCategory" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="acid" name="acid">
					<input type="hidden" id="aicat" name="aicat">
					<div class="modal-header">
						<h4>Return Message</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Do you want to restore <p id="category_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-primary" type="submit" name="acsubmit" value="Yes">
							</div>
							<div class="col-sm-6">
								<input type="button" class="close_confirm_ca btn btn-danger" value="No">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end Return Category--}}

	{{-- Delete Category--}}
	<div class="modal fade" id="deleteCategory">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="categoryDelete" action="/deleteCategory" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="dcid" name="dcid">
					<input type="hidden" id="dicat" name="dicat">
					<div class="modal-header">
						<h4>Delete</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Do you want to permanently delete <p id="del_category_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-primary" type="submit" name="acsubmit" value="Yes">
							</div>
							<div class="col-sm-6">
								<input type="button" class="del_close_confirm_ca btn btn-danger" value="No">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end Delete Category--}}
</body>
@stop

@section('script')
<script>
	var msg = '{{Session::get('alert')}}';
	var exist = '{{Session::has('alert')}}';
	var evalmsg = msg.replace(/(&quot\;)/g,"\"");
	if(exist){
		alert(evalmsg);

	}
	evalmsg=null;
</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#categoryTable').DataTable();
	});
	$(document).ready(function() {
		$('#brandsTable').DataTable();
	});
	$('.close_confirm_ca').click(function(){	
		$('#returnCategory').modal('toggle');
	});
//function for archive button
$('.unarchive_btn_ca').click(function(){
	var $row = $(this).closest('tr');
	var rowID = $row.attr('id').split('_')[1];
	var $paragraph = $('#category_name');
	$('#acid').val(rowID);
	$.ajax({
		method: "POST",
		url: "{{ route('popCategoryForm') }}",
		data:{categoryID:rowID,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			$paragraph.text(array[0].item_category+"?");
			document.getElementById("aicat").value = array[0].item_category;
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("ERROR IN REQUEST");
		} 
	});
	$('#returnCategory').modal('show');
});

$('.del_close_confirm_ca').click(function(){	
	$('#deleteCategory').modal('toggle');
});
//function for archive button
$('.delete_btn_ca').click(function(){
	var $row = $(this).closest('tr');
	var rowID = $row.attr('id').split('_')[1];
	var $paragraph = $('#del_category_name');
	$('#dcid').val(rowID);
	$.ajax({
		method: "POST",
		url: "{{ route('popCategoryForm') }}",
		data:{categoryID:rowID,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			$paragraph.text(array[0].item_category+"?");
			document.getElementById("dicat").value = array[0].item_category;
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("ERROR IN REQUEST");
		} 
	});
	$('#deleteCategory').modal('show');
});


$('.close_confirm_br').click(function(){	
	$('#returnBrand').modal('toggle');
});
//function for archive button
$('.unarchive_btn_br').click(function(){
	var $row = $(this).closest('tr');
	var rowID = $row.attr('id').split('_')[1];
	var $paragraph = $('#brand_name');
	$('#abid').val(rowID);
	$.ajax({
		method: "POST",
		url: "{{ route('popBrandForm') }}",
		data:{brandID:rowID,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			$paragraph.text(array[0].brand_name+"?");
			document.getElementById("abn").value = array[0].brand_name;
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("ERROR IN REQUEST");
		} 
	});
	$('#returnBrand').modal('show');
});

$('.del_close_confirm_br').click(function(){	
	$('#deleteBrand').modal('toggle');
});
//function for archive button
$('.delete_btn_br').click(function(){
	var $row = $(this).closest('tr');
	var rowID = $row.attr('id').split('_')[1];
	var $paragraph = $('#del_brand_name');
	$('#dbid').val(rowID);
	$.ajax({
		method: "POST",
		url: "{{ route('popBrandForm') }}",
		data:{brandID:rowID,'_token':"{{csrf_token()}}"},
		success: function (data){
			var array = jQuery.parseJSON(data);
			$paragraph.text(array[0].brand_name+"?");
			document.getElementById("dbn").value = array[0].brand_name;
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("ERROR IN REQUEST");
		} 
	});
	$('#deleteBrand').modal('show');
});
</script>



@stop