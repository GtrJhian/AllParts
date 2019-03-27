@extends('components/main')

@section('content')


<body>
	@include('components.nav_sales')
	
	<div id="wrapper" class="offset1">
		@include('components.menu_inventory')
		<div id="content-wrapper">
			<div class="container-fluid">
				{{-- <ol class="breadcrumb" style="border-radius: 0px">
					<li class="breadcrumb-item">
						<span href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">INVENTORY REPORTS</span>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge badge-pill badge-danger count" style="border-radius:10px;"></span> <span class="fa fa-bell" style="font-size:18px;"></span></a>
						<ul class="dropdown-menu" style="width: 300px; height: 200px; overflow: auto"></ul>
					</li>
				</ol> --}}
				<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
					<li class="breadcrumb-item">
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-clipboard-list" style="font-size:23px"></i> Inventory Alerts</strong>
						</h6>
					</li>
					{{-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge badge-pill badge-danger count" style="border-radius:10px;"></span> <span class="fa fa-bell" style="font-size:18px;"></span></a>
						<ul class="dropdown-menu" style="width: 300px; height: 200px; overflow: auto"></ul>
					</li> --}}
				</ol>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col">
								{{-- <div class="form-group">
									<label for="comment">Logs:</label>
									<textarea class="form-control" rows="5" cols="60" id="comment" name="alerts" disabled></textarea>
								</div> --}}
								<div class="table-responsive">
									<table class="table table-striped" id="report_table">
										<thead>
											<tr>
												<th>Category</th>
												<th>Item Code</th>
												<th>Alert</th>
											</tr>
										</thead>
										<tbody id="report_tablebody">
											</tbody>
									</table>
								</div>
							</div>
						</div>
						<hr>
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


<script>

	

	$(document).ready(function(){
    // updating the view with notifications using ajax
    function load_unseen_notification()
    {
    	$.ajax({
    		method: "POST",
    		url: "{{ route('getInvAlerts') }}",
    		data:{'_token':"{{csrf_token()}}"},
    		success: function (data){
    			var array = jQuery.parseJSON(data);
    		//	$('#table_body').html(array.notification);

    			
    			$("#report_table").dataTable().fnDestroy()
    			$("#report_tablebody").empty();
    			$('#report_table').find('tbody').append(array.notification);
    			$('#report_table').DataTable();
    		},
    		error: function(XMLHttpRequest, textStatus, errorThrown) {
    			alert("ERROR IN REQUEST");
    		} 
    	});
    }

    load_unseen_notification();



//refresh every 5 minutes
setInterval(function(){
	load_unseen_notification();;
}, 300000);

});

	
</script>


@stop