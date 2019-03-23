@extends('components/main')

@section('content')

<
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
		@include('components.menu_inventory')
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
								<a href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">REPORTS</a>
							</li>
						</ol>
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
			<form id="itemCreate" action="/photoUpload" method="post" enctype="multipart/form-data" />			
						{{ csrf_field() }}
						<div class="form-group">
							<label for="imageInput">File input</label>
							<input data-preview="#preview" name="item_img" type="file" id="imageInput">
							<img class="col-sm-6" id="preview"  src="">
						</div>
						<div class="form-group">
							<label for="">submit</label>
							<input class="form-control" type="submit">
						</div>
</form>
					</div>
				</div>
				<!-- <div class="row">
					<div class="d-block mx-auto">
						<a href="/archiveInventory" class="btn btn-primary">Archive Inventory</a>
					</div>
				</div> -->
			</div>
			@include('components.footer2')
		</div>
	</div>
</body>
@stop