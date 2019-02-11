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
							<a href="/category&brands" class="btn btn-secondary d-block mx-auto back-btn">
								<i class="fa fa-arrow-left back-btn-icon"></i>
							</a>
						</div>
						<div class="col-sm-11">
							<ol class="breadcrumb" style="border-radius: 0px">
								<li class="breadcrumb-item">
									<a href="/category&brands" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">CATEGORY & BRANDS</a>
								</li>
								<li class="breadcrumb-item">
									<a href="/archiveCategory&Brands" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">ARCHIVE</a>
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
																<button class="unarchive_btn_ca btn btn-primary btn-action-invt">
																	<i class="fa fa-check"></i>
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
																<button class="unarchive_btn_br btn btn-primary btn-action-invt">
																	<i class="fa fa-check"></i>
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

</script>



@stop