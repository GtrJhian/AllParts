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
							<div class="col">
								<a href="/inventory" class="btn btn-primary d-block mx-auto">
									<h3>Inventory</h3>
								</a>
							</div>
							<div class="col">
								<a href="/category&brands" class="btn btn-primary d-block mx-auto">
									<h3>Category & Brands</h3>
								</a>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="comment">Alerts:</label>
									<textarea class="form-control" rows="5" id="comment"></textarea>
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