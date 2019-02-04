@extends('components/main')

@section('content')
<body>
	@include('components.nav_sales')
	<div id="wrapper">
		@include('components.menu_sales')
		<div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb" style="border-radius: 0px">
					<li class="breadcrumb-item">
						<a href="" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">CUSTOMERS</a>
					</li>
				</ol>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="table-responsive">
									<table class="table table-striped" id="customerlist" width="100%" cellspacing="0">
										<thead>
											<th>Customer No.</th>
											<th>Customer Name</th>
											<th>Action</th>
										</thead>
										<tbody>
											<td>CSN-001</td>
											<td>John Santos</td>
											<td>
												<a href="" style="border: 1px #127ffb solid;padding: 5px;border-radius: 20%;width: 10px;height: 10px;background-color: #127ffb;color: #fff"><i class="fa fa-eye"></i></a>
												<a href="" style="border: 1px #127ffb solid;padding: 5px;border-radius: 20%;width: 10px;height: 10px;background-color: #127ffb;color: #fff"><i class="fa fa-user"></i></a>
												<a href="" style="border: 1px #127ffb solid;padding: 5px;border-radius: 20%;width: 10px;height: 10px;background-color: #127ffb;color: #fff"><i class="fa fa-edit"></i></a>
											</td>
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
		$('#customerlist').DataTable();
	});
</script>
@stop