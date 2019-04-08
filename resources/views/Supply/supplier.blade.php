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
	@include('components.nav_sales')
	<div id="wrapper" class="offset1">
		@include('components.menu3')
		<div id="content-wrapper">
			<div class="container-fluid">
				<div class="row">
				
					<div class="col-sm-12">
						{{-- <ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
							<li class="breadcrumb-item">
								<a href="/inventoryMain" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">SUPPLIER</a>
							</li>
						</ol> --}}
						<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
							<li class="breadcrumb-item">
								<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-truck" style="font-size:23px"></i> Supplier</strong>
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
											<th>Company Name</th>
											<th>Address</th>
											<th>Telephone Number</th>
											<th>Company E-mail</th>
											<th>Company Tin Number</th>
											<th style="width: 15%;">Action</th>
										</thead>
										<tbody>
												@foreach($supplier as $supply)
													<tr id="trID_{{$supply->Supplier_ID}}">
														
														<td><p style="color:red"><b>{{$supply->Company_Name}}</b></p></td>
														<td>{{$supply->Company_Address}}</td>
														<td>{{$supply->Company_Contact}}</td>
														<td>{{$supply->Company_Email}}</td>
														<td>{{$supply->TIN_No}}</td>
													<td>
														
														<a href="{{ route('supplier.edit',['id' => $supply->Supplier_ID])}}" class="update_item_btn btn btn-primary btn-action-invt">
															<i class="fa fa-edit"></i>
														</a>
														
														<a href="{{ route('supplier.archive',['id' => $supply->Supplier_ID])}}" class="archive_btn btn btn-danger btn-action-invt" >  
														<!-- data-toggle="modal" data-target="#removesupplier" -->
															<i class="fa fa-times"></i>
														</a>
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
			@include('components.footer2')
		</div>
	</div>

	{{-- Buttom Icons --}}
	<!-- add -->
	<div class="zoom">
		<a class="zoom-fab zoom-btn-green zoom-btn-large tooltip-iventory-green" data-toggle="modal" data-target="#supplyAdd">
			<i class="fa fa-plus"></i>
			<span class="tooltip-iventorytext-green">ADD</span>
		</a>
	</div>
	<!-- archive -->
	<div class="zoom-top">
		<a href="{{route('supplier.trashed')}}" class="zoom-fab zoom-btn-black zoom-btn-sm tooltip-iventory">
			<i class="fa fa-trash"></i>
			<span class="tooltip-iventorytext">ARCHIVE</span>
		</a> 
	</div>
	
	
	<!-- CREATE SUPPLIER MODAL -->
	@include('Supply.Modals.addmodal')
	
	
	

	</body>
	@stop

	@section('script')
	<script type="text/javascript">
	$(document).ready(function() {
		$('#itemlist').DataTable();
	});
	
	
</script>
@stop