	<div class="modal fade" id="viewItem">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="itemtype">ITEM INFORMATION</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="offset-md-1 col-sm-4">
							{{-- <img src="{{asset('inventory/none.png')}}" style="height: 200px; width: 200px; border:1px solid black;"> --}}
							<div id="itemInformation" class="carousel slide" data-interval="false">
								<ul class="carousel-indicators">
									<li data-target="#itemInformation" data-slide-to="0" class="active"></li>
									<li data-target="#itemInformation" data-slide-to="1"></li>
									<li data-target="#itemInformation" data-slide-to="2"></li>
								</ul>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="{{asset('inventory/none.png')}}" alt="Category" id="categorypic" style="height: 200px; width: 200px; border:1px solid black;"> 
									</div>
									<div class="carousel-item">
										<img src="{{asset('inventory/none.png')}}" alt="Brand" id="brandpic" style="height: 200px; width: 200px; border:1px solid black;">
									</div>
								</div>
								<a class="carousel-control-prev" href="#itemInformation" data-slide="prev">
									<span class="carousel-control-prev-icon"></span>
								</a>
								<a class="carousel-control-next" href="#itemInformation" data-slide="next">
									<span class="carousel-control-next-icon"></span>
								</a>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="card">
								<div class="card-body">
									<b><span class="info-labels" id="itemcode">Item Code</span></b><br>
										<span class="info-labels" id="brand">Brand</span><br>
										<span class="info-labels" id="category">Category</span><br>
										<b><span class="info-labels" id="price">Item Price</span></b><br>
										<i><span class="info-labels" id="quantity">Quantity</span></i>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-12">
								<h4 class="info-labels">Description</h4>
								<span class="info-labels" id="description">Body</span>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-12" id="package_itemlist">
							</div>
						</div>
					</div>
				</div>
			</div>
</div> {{-- end VIEW item --}}