@extends('components/main')

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
						<a href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">Billing</a>
					</li>
				</ol>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="table-responsive">
									<table class="table table-striped" id="itemlist" width="100%" cellspacing="0">
										<thead>
											<th>Billing_ID</th>
											<th>Name</th>
											<th>Bill</th>
										</thead>
                                        <tbody>
                                            @if(count($billingposts) > 0)
                                                @foreach($billingposts as $post)
                                                    <tr index="{{$post->Bill_ID}}">
                                                        <td>{{$post->Bill_ID}}</td>
                                                        <td>{{$post->Name}}</td>
                                                        <td>{{$post->Bill}}</td>
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
			@include('components.footer2')
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
</script>
@stop