@extends('components/main')

@section('content')


<body>
	@include('components.nav2')
	<div id="wrapper">
		@include('components.menu2')
		<div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb" style="border-radius: 0px">
					<li class="breadcrumb-item">
						<span href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">INVENTORY</span>
					</li>
				</ol>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-3 text-center">
								<a href="/inventory" class="btn btn-outline-primary tooltip-iventory-blue select-invt-icon-btn">
									<i class="fas fa-box-open select-invt-icon"></i>
									<span class="tooltip-iventorytext-blue">Inventory</span>
								</a>
							</div>
							<div class="col-sm-3 text-center">
								<a href="/category&brands" class="btn btn-outline-primary tooltip-iventory-blue select-invt-icon-btn">
									<i class="fas fa-layer-group select-invt-icon"></i>
									<span class="tooltip-iventorytext-blue">Category & Brands</span>
								</a>
							</div>
							
						</div>
						<hr>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="comment">Alerts:</label>
									<?php $inventories = \DB::table('inventory')->where('archive',0)->orderBy('item_code','ASC')->get();?>
									<textarea class="form-control" rows="5" cols="60" id="comment" name="alerts" disabled>THESE ITEMS ARE RUNNING OUT @foreach($inventories as $inventory)@if($inventory->Item_Quantity<=$inventory->Alarm_Quantity)&#10;{{$inventory->Item_Code}} is running out ({{$inventory->Item_Quantity}} {{$inventory->Item_Unit}}s Left)@endif @endforeach</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			@include('components.footer2')
		</div>
	</div>



	{{-- end inventory CREATE --}}
</body>
@stop

@section('script')

@stop