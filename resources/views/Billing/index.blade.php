@extends('components/main')

@section('content')
<?php
	$index_row = 1;
?>
<body>
	@include('components.nav_sales')
	<div id="wrapper">
		@include('components.menu_sales')
		<div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb" style="border-radius: 0px">
					<li class="breadcrumb-item">
						<a href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">Billing</a>
					</li>
				</ol>
				<!-- <div class="container"> -->
				<div class="row">
					<div class="col-md-12">
						<button type="button" href="#" class="btn btn-danger btn-suc btn-wd float-right" role="button">Delete</button>
						<button type="button" href="#" class="btn btn-success btn-suc float-right" role="button">Select</button>
	
  					<div class="nav nav-tabs" id="nav-tab" role="tablist">
    					<a class="nav-item nav-link active" id="bill" data-toggle="tab" href="#billing" role="tab"  aria-selected="true">Billing <i class="fa fa-check"></i></a>
    					<a class="nav-item nav-link" id="tab1" data-toggle="tab" href="#tab1" role="tab"  aria-selected="false">Tab1 <i class="fa fa-check"></i></a>
    					<a class="nav-item nav-link" id="tab2" data-toggle="tab" href="#tab2" role="tab"  aria-selected="false">Tab2 <i class="fa fa-check"></i></a>
						</div>
					</div>
				</div>
				<!-- </div> -->
				
			
				<!-- tab contents -->
				<div class="tab-content" id="nav-tabContent">
					<!-- tab 1 -->
					<div class="tab-pane fade show active" id="billing" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<div class="table-responsive">
											<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
												<thead>
													<th width=5%>#</th>
													<th width=30%>TR No.</th>
													<th width=30%>NAME</th>
													<th width=35%>COMPANY</th>
													<th width=15%>ADDRESS</th>
												</thead>
												<tbody>
													@if(count($indexPost) > 0)
														@foreach($indexPost as $post)
															<tr index="{{$post->TR_Acc}}">
																<td>{{$index_row}}</td>
																<td>{{$post->TR_Acc}}</td>
																<td>{{$post->F_Name.' '.$post->L_Name}}</td>
																<td>{{$post->Company}}</td>
																<td>{{$post->Address}}</td>
																<?php $index_row++; ?>
															</tr>
														@endforeach
													@endif
												</tbody>
											</table>	
										</div>
									</div>
								</div>
							</div>
						</div> 
					</div> 
					<!-- end of content 1 -->
					<!-- tab 2 -->
					<div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="nav-profile-tab">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<div class="table-responsive">
											<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
												<thead>
													<th width=20%>Billing_ID</th>
													<th width=30%>Name</th>
													<th width=35%>Address</th>
													<th width=15%>Bill</th>
												</thead>
												<tbody>
																					
																							
												</tbody>
											</table>	
										</div>
									</div>
								</div>
							</div>
						</div> 
					</div>
					<!-- end of content 2 -->
					<!-- tab3 -->
					<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-contact-tab">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<div class="table-responsive">
											<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
												<thead>
													<th width=20%>Billing_ID</th>
													<th width=30%>Name</th>
													<th width=35%>Address</th>
													<th width=15%>Bill</th>
												</thead>
												<tbody>
										   
										   
										   </tbody>
									   </table>	
										</div>
									</div>
								</div>
							</div>
						</div> 
					</div>  
					<!-- end of content 3 -->		
				</div>
				<!-- end of contents -->	
			</div>
			@include('components.footer2')
			@include('Billing.modal.indexModal')
		</div>
	</div>
</body>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#itemlist').DataTable();
	});

    $("#itemlist tbody tr").on('click',function() {  
		var bill_id = $(this).attr('index');
        window.location = "/Billing/"+bill_id;
	}); 
	
	function indexModal(){
    document.getElementById('modal-wrapper-index').style.display = 'block';
  }
</script>
@stop