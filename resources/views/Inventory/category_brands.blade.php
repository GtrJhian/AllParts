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
					<div class="col-sm-12">
					{{-- 	<ol class="breadcrumb" style="border-radius: 0px">
							<li class="breadcrumb-item">
								<a href="/category&brands" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">CATEGORY & BRANDS</a>
							</li>
						</ol> --}}
						<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
							<li class="breadcrumb-item">
								<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-layer-group" style="font-size:23px"></i> Category & Brands</strong>
								</h6>
							</li>
						</ol>
					</div>
					{{-- <div class="col-sm-3">
						<a href="/archiveCategory&Brands" class="btn btn-primary">Archive Category & Brands</a>
					</div> --}}
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
											$categories = \DB::table('item_categories')->where('archive',0)->orderBy('item_category','ASC')->get();
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
															<button class="update_category btn btn-primary btn-action-invt">
																<i class="fa fa-edit"></i>
															</button>
															<button class="archive_btn_ca btn btn-danger btn-action-invt">
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
											$brands = \DB::table('item_brands')->where('archive',0)->orderBy('brand_name','ASC')->get();
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
															<button class="update_brand btn btn-primary btn-action-invt">
																<i class="fa fa-edit"></i>
															</button>
															<button class="archive_btn_br btn btn-danger btn-action-invt">
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
				<!-- <div class="row">
					<div class="d-block mx-auto">
						<a href="/archiveCategory&Brands" class="btn btn-primary">Archive Category & Brands</a>
					</div>
				</div> -->
			</div>
			@include('components.footer2')
		</div>
	</div>

	{{-- Buttom Icon --}}
	<div class="zoom">
		<a class="zoom-fab zoom-btn-green zoom-btn-large tooltip-iventory-green" data-toggle="modal" data-target="#catbrandCreate">
			<i class="fa fa-plus"></i>
			<span class="tooltip-iventorytext-green">CREATE</span>
		</a>
	</div>

	<div class="zoom-top">
		<a href="/archiveCategory&Brands" class="zoom-fab zoom-btn-black zoom-btn-sm tooltip-iventory">
			<i class="fa fa-archive"></i>
			<span class="tooltip-iventorytext">ARCHIVE</span>
		</a> 
	</div>

	
	<!-- REMOVE BRAND & CATEGORY -->
	@include('Inventory.modal-categbrand.removeBrandCategory')


	<!---UPDATE BRAND & CATEGORY FORM ----->
	@include('Inventory.modal-categbrand.updateBrandCategory')
	

	<!-- CREATE BRAND & CATEGORY -->
	@include('Inventory.modal-categbrand.createBrandCategory')
	
</body>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#categoryTable').DataTable();
	});

	$(document).ready(function() {
		$('#brandsTable').DataTable();
	});


	$('.update_brand').click(function(){
		var $row = $(this).closest('tr');
		var rowID = $row.attr('id').split('_')[1];
		$('#bid').val(rowID);
		$.ajax({
			method: "POST",
			url: "{{ route('popBrandForm') }}",
			data:{brandID:rowID,'_token':"{{csrf_token()}}"},
			success: function (data){
				var array = jQuery.parseJSON(data);
				document.getElementById("ubn").value = array[0].brand_name;
				var idpic=array[0].brand_pic;
				getbpic(idpic);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert("ERROR IN REQUEST");
			} 
		});
		$('#updateBrand').modal('show');
	});


	$('.update_category').click(function(){
		var $row = $(this).closest('tr');
		var rowID = $row.attr('id').split('_')[1];
		$('#cid').val(rowID);
		$.ajax({
			method: "POST",
			url: "{{ route('popCategoryForm') }}",
			data:{categoryID:rowID,'_token':"{{csrf_token()}}"},
			success: function (data){
				var array = jQuery.parseJSON(data);
				document.getElementById("ucn").value = array[0].item_category;
				var idpic=array[0].categ_pic;
				getcpic(idpic);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert("ERROR IN REQUEST");
			} 
		});
		$('#updateCategory').modal('show');
	});

	$('.close_confirm_ca').click(function(){	
		$('#removeCategory').modal('toggle');
	});

	function getbpic(pic_id){
		var picid=pic_id;
		if(picid!=null){
			$.ajax({
				method: "POST",
				url: "{{ route('getPic') }}",
				data:{pic_id:picid,'_token':"{{csrf_token()}}"},
				success: function (data){
					var array = jQuery.parseJSON(data);
					document.getElementById("prevBrand").src=array[0].pic_url;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert("ERROR IN REQUEST");
				} 
			});
		}
		else{
			document.getElementById("prevBrand").src="/inventory/none.png";
		}
	}

	function getcpic(pic_id){
		var picid=pic_id;
		if(picid!=null){	
			$.ajax({
				method: "POST",
				url: "{{ route('getPic') }}",
				data:{pic_id:picid,'_token':"{{csrf_token()}}"},
				success: function (data){
					var array = jQuery.parseJSON(data);
					document.getElementById("prevCateg").src=array[0].pic_url;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert("ERROR IN REQUEST");
				} 
			});
		}
		else{
			document.getElementById("prevCateg").src="/inventory/none.png";
		}
	}



//function for archive button
$('.archive_btn_ca').click(function(){
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
	$('#removeCategory').modal('show');
});

$('.close_confirm_br').click(function(){	
	$('#removeBrand').modal('toggle');
});

//function for archive button
$('.archive_btn_br').click(function(){
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
	$('#removeBrand').modal('show');
});

</script>


@stop