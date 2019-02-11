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
								<a href="/category&brands" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">CATEGORY & BRANDS</a>
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
											$categories = \DB::table('item_categories')->where('archive',0)->orderBy('item_category','ASC')->get();
											?>
											<table class="table table-striped" id="categoryTable" width="100%" cellspacing="0">
												<thead>
													<th>ID</th>
													<th>Item Category</th>
													<th>Action</th>
												</thead>
												<tbody>
													@foreach($categories as $category)
													<tr id="trID_{{$category->category_id}}">
														<td>{{$category->category_id}}</td>
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
													<th>ID</th>
													<th>Brand Name</th>
													<th>Action</th>
												</thead>
												<tbody>
													@foreach($brands as $brand)
													<tr id="trID_{{$brand->brand_id}}">
														<td>{{$brand->brand_id}}</td>
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
				<div class="row">
					<div class="d-block mx-auto">
						<a href="/archiveCategory&Brands" class="btn btn-primary">Archive Category & Brands</a>
					</div>
				</div>
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
	{{-- Remove brand--}}
	<div class="modal fade" id="removeBrand">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="brandArchive" action="/archiveBrand" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="abid" name="abid">
					<input type="hidden" id="abn" name="abn">
					<div class="modal-header">
						<h4>Remove Message</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Are you sure you want to archive <p id="brand_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-danger" type="submit" name="absubmit" value="Archive">
							</div>
							<div class="col-sm-6">
								<input type="button" class="close_confirm_br btn btn-primary" value="Cancel">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end remove category--}}

	{{-- Remove category--}}
	<div class="modal fade" id="removeCategory">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="categoryArchive" action="/archiveCategory" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="acid" name="acid">
					<input type="hidden" id="aicat" name="aicat">
					<div class="modal-header">
						<h4>Remove Message</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Are you sure you want to archive <p id="category_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-danger" type="submit" name="acsubmit" value="Archive">
							</div>
							<div class="col-sm-6">
								<input type="button" class="close_confirm_ca btn btn-primary" value="Cancel">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end remove category--}}


	<!---UPDATE CATEGORY FORM ----->
	<div class="modal fade" id="updateCategory">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">UPDATE CATEGORY</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div id="updateCategory" class="container tab-pane active"><br>
						<form id="updateCategory" action="/updateCategory" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="cid" id="cid">
							<div class="form-horizontal">
								<div class="row">
									<div class="col-sm-6">
										<label>Category Name: </label>
										<input type="text" name="ucn" id="ucn" required class="form-control">
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-12">
										<input class="btn btn-success d-block mx-auto" type="submit" name="cnsubmit" value="Update Category">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> 
	</div>{{-- end UPDATE category --}}

	<!---UPDATE Brand FORM ----->
	<div class="modal fade" id="updateBrand">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">UPDATE BRAND</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div id="updateBrand" class="container tab-pane active"><br>
						<form id="updateBrand" action="/updateBrand" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="bid" id="bid">
							<div class="form-horizontal">
								<div class="row">
									<div class="col-sm-6">
										<label>Brand Name: </label>
										<input type="text" id="ubn" name="ubn" required class="form-control">
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-12">
										<input class="btn btn-success d-block mx-auto" type="submit" name="cnsubmit" value="Update Brand">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> 
	</div>{{-- end UPDATE brand --}}


	<div class="modal fade" id="catbrandCreate">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Create New</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-pills nav-justified" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#createCategory">CATEGORY</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#createBrands">BRAND</a>
						</li>
					</ul>

					<!---- CREATE CATEGORY AND BRANDS FORM----->
					<div class="tab-content">
						<div id="createCategory" class="container tab-pane active"><br>
							<form id="createCategory" action="/createCategory" method="post">
								{{ csrf_field() }}
								<div class="form-horizontal">
									<div class="row">
										<div class="col-sm-6">
											<label>Category Name: </label>
											<input type="text" name="cn" required class="form-control">
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-12">
											<input class="btn btn-success d-block mx-auto" type="submit" name="cnsubmit" value="Create Category">
										</div>
									</div>
								</div>
							</form>
						</div>

						<div id="createBrands" class="container tab-pane fade"><br>
							<form id="createBrands" action="/createBrand" method="post">
								{{ csrf_field() }}
								<div class="form-horizontal">
									<div class="row">
										<div class="col-sm-6">
											<label>Brand Name: </label>
											<input type="text" name="bn" required class="form-control">
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-12">
											<input class="btn btn-success d-block mx-auto" type="submit" name="cisubmit" value="Create Brand">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

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