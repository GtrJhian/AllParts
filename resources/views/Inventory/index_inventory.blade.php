@extends('components/main')

@section('content')


<body>
	@include('components.nav2')
	
	<div id="wrapper">
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
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-clipboard-list" style="font-size:23px"></i> Inventory Reports</strong>
						</h6>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge badge-pill badge-danger count" style="border-radius:10px;"></span> <span class="fa fa-bell" style="font-size:18px;"></span></a>
						<ul class="dropdown-menu" style="width: 300px; height: 200px; overflow: auto"></ul>
					</li>
				</ol>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="comment">Logs:</label>
									<textarea class="form-control" rows="5" cols="60" id="comment" name="alerts" disabled></textarea>
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
    			$('.dropdown-menu').html(array.notification);
    			if(array.unseen_notification > 0)
    			{
    				$('.count').html(array.unseen_notification);
    			}
    		},
    		error: function(XMLHttpRequest, textStatus, errorThrown) {
    			alert("ERROR IN REQUEST");
    		} 
    	});
    }

    load_unseen_notification();

 // load new notifications
 $(document).on('click', '.dropdown-toggle', function(){
 	$('.count').html('');
 	load_unseen_notification();  
 });

//refresh every 5 secs
setInterval(function(){
	load_unseen_notification();;
}, 5000);

});
</script>


@stop