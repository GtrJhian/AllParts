@extends('components/main')

@section('content')
<body>
	@include('components.nav_sales')
	<div id="wrapper" class="offset1">
		@include('components.menu_sales')
		<div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
					<li class="breadcrumb-item">
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-clipboard-list" style="font-size:23px"></i> Item List</strong></h6>
					</li>
				</ol>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="table-responsive">
									<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
										<thead>
											<th>Item Code</th>
											<th>Item Description</th>
											<th>Quantity</th>
											<th>Price/Unit</th>
										</thead>
										<tbody>
											<td>RS-001</td>
											<td>Butterfly Faucet</td>
											<td>50</td>
											<td>200</td>
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
</body>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#itemlist').DataTable({
			ajax: '/Store/json/itemlistdt2'
		});
	});
</script>
@stop