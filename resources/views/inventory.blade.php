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
						<a href="#" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">INVENTORY</a>
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
											<th>Category</th>
											<th>Type</th>
											<th>Quantity</th>
											<th>Unit</th>
											<th>Price/Unit</th>
											<th>Action</th>
										</thead>
										<tbody>
											<td>RS-001</td>
											<td>Butterfly Faucet</td>
											<td>Faucet</td>
											<td>Item</td>
											<td>50</td>
											<td>Piece</td>
											<td>200</td>
											<td>
												<button class="btn btn-primary" data-toggle="modal" data-target="#updateItem">
													<i class="fa fa-edit"></i>
												</button>
												<button class="btn btn-danger" data-toggle="modal" data-target="#removeItem">
													<i class="fa fa-times"></i>
												</button>
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

	{{-- ADD/EDIT --}}
	<div class="zoom">
		<a class="zoom-fab zoom-btn-large" id="zoomBtn"><i class="fa fa-bars"></i></a>
		<ul class="zoom-menu">
			{{-- <li>
				<a class="zoom-fab zoom-btn-sm zoom-btn-red scale-transition scale-out tooltip-iventory-red">
					<i class="fa fa-times"></i><span class="tooltip-iventorytext-red">REMOVE</span>
				</a>
			</li> --}}
			<li>
				<a class="zoom-fab zoom-btn-sm zoom-btn-green scale-transition scale-out tooltip-iventory-green" data-toggle="modal" data-target="#invtCreate">
					<i class="fa fa-plus"></i><span class="tooltip-iventorytext-green">CREATE</span>
				</a>
			</li>
			<li>
				<a class="zoom-fab zoom-btn-sm zoom-btn-blue scale-transition scale-out tooltip-iventory-blue" data-toggle="modal" data-target="#invtUpdate">
					<i class="fa fa-edit"></i><span class="tooltip-iventorytext-blue">UPDATE</span>
				</a>
			</li>
		</ul>
	</div>


	<div class="modal fade" id="removeItem">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Remove Message</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<span>Are you sure you want to remove this item?</span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-sm-6">
							<button class="btn btn-primary">Cancel</button>
						</div>
						<div class="col-sm-6">
							<button class="btn btn-danger">Remove</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> {{-- end remove item--}}

	<div class="modal fade" id="updateItem">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">UPDATE ITEM</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-horizontal">
							<div class="row">
								<label class="col-sm-3">Item Name: </label>
								<div class="col-sm-9">
									<select  name="in" required class="form-control">
									</select>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Item Category: </label>
								<div class="col-sm-8">
									<select class="form-control" id="select-branch" name="ic">
										<option value="Office Supply" selected>Office Supply</option>
										<option value="Motorcycle Part">Motorcycle Part</option>
									</select> 
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-3">Description: </label>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<textarea class="form-control" name="id" required></textarea>
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<label>Price:</label>
									<input class="form-control" type="number" name="ip" min="0" step=".01" value="0" required>
								</div>
								<div class="col-sm-6">
									<label>Unit:</label>
									<input type="text" name="iuom" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label>Alarm Quantity:</label>
									<input type="number" name="iaq" min="0" value="0" class="form-control" required>
								</div>
								<div class="col-sm-6">
									<label>Quantity:</label>
									<input type="number" name="iq" min="0" value="0" class="form-control" required>
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-12">
									<input class="btn btn-success btn-block" type="submit" name="submit" value="Update">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> {{-- end UPDATE item --}}


	<div class="modal fade" id="invtCreate">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Create New</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-pills nav-justified" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#item">ITEM</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#package">PACKAGE</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="item" class="container tab-pane active"><br>
							<form>
								<div class="form-horizontal">
									<div class="row">
										<label class="col-sm-3">Item Name: </label>
										<div class="col-sm-9">
											<input type="text" name="in" required class="form-control">
										</div>
									</div><br>
									<div class="row">
										<label class="col-sm-4">Item Category: </label>
										<div class="col-sm-8">
											<select class="form-control" id="select-branch" name="ic">
												<option value="Office Supply" selected>Office Supply</option>
												<option value="Motorcycle Part">Motorcycle Part</option>
											</select> 
										</div>
									</div><br>
									<div class="row">
										<label class="col-sm-3">Description: </label>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<textarea class="form-control" name="id" required></textarea>
										</div>
									</div><br>
									<div class="row">
										<div class="col-sm-6">
											<label>Price:</label>
											<input class="form-control" type="number" name="ip" min="0" step=".01" value="0" required>
										</div>
										<div class="col-sm-6">
											<label>Unit:</label>
											<input type="text" name="iuom" class="form-control" required>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<label>Alarm Quantity:</label>
											<input type="number" name="iaq" min="0" value="0" class="form-control" required>
										</div>
										<div class="col-sm-6">
											<label>Quantity:</label>
											<input type="number" name="iq" min="0" value="0" class="form-control" required>
										</div>
									</div><br>
									<div class="row">
										<div class="col-sm-6">
											<input class="btn btn-success btn-block" type="submit" name="submit" value="Add">
										</div>
										<div class="col-sm-6">
											<input class="btn btn-danger btn-block" type="reset" name="reset" value="Clear">
										</div>
									</div>
								</div>
							</form>
						</div>
						<div id="package" class="container tab-pane fade"><br>
							<div class="row">
								<label class="col-sm-3">Package Name: </label>
								<div class="col-sm-9">
									<input type="text" name="in" required class="form-control">
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Number of Items Required: </label>
								<div class="col-sm-3">
									<input class="form-control" type="number" name="ItemList" maxlength=3 min=1 onChange="numOfLines(this.value);" required>
								</div>
							</div>
							<hr>
							<div id="input_items">			
							</div>
							<div class="row">
								<input class="btn btn-info d-block mx-auto button-view" type="submit" name="orsubmit" value="Submit OR">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> {{-- end inventory CREATE --}}

	<div class="modal fade" id="invtUpdate">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">UPDATE</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-horizontal">
							<div class="row">
								<label class="col-sm-3">Item Name: </label>
								<div class="col-sm-9">
									<select  name="in" required class="form-control">
									</select>
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-4">Item Category: </label>
								<div class="col-sm-8">
									<select class="form-control" id="select-branch" name="ic">
										<option value="Office Supply" selected>Office Supply</option>
										<option value="Motorcycle Part">Motorcycle Part</option>
									</select> 
								</div>
							</div><br>
							<div class="row">
								<label class="col-sm-3">Description: </label>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<textarea class="form-control" name="id" required></textarea>
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-6">
									<label>Price:</label>
									<input class="form-control" type="number" name="ip" min="0" step=".01" value="0" required>
								</div>
								<div class="col-sm-6">
									<label>Unit:</label>
									<input type="text" name="iuom" class="form-control" required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label>Alarm Quantity:</label>
									<input type="number" name="iaq" min="0" value="0" class="form-control" required>
								</div>
								<div class="col-sm-6">
									<label>Quantity:</label>
									<input type="number" name="iq" min="0" value="0" class="form-control" required>
								</div>
							</div><br>
							<div class="row">
								<div class="col-sm-12">
									<input class="btn btn-success btn-block" type="submit" name="submit" value="Update">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> {{-- end inventory UPDATE --}}

</body>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#itemlist').DataTable();
	});

	$('#zoomBtn').click(function() {
		$('.zoom-btn-sm').toggleClass('scale-out');
		if (!$('.zoom-card').hasClass('scale-out')) {
			$('.zoom-card').toggleClass('scale-out');
		}
	});

</script>

<script language="javascript" type="text/javascript">
	function numOfLines(choice)
	{
		document.getElementById("input_items").innerHTML='';
		for(var i = 0; i < choice; ++i)
		{
			document.getElementById("input_items").innerHTML+= '<div class="row">' +
			'<div class="col-sm-6"><label>Item Name:</label><input class="form-control" list="items" name="in-'+i+'" size="50" maxlength="50" required ></div> ' +
			'<div class="form-group col-sm-6"><label>Quantity Needed:</label><input class="form-control" type="number" name="iq-'+i+'" size="6" maxlength="6" value="1" min="1" required ></div>'+
			'</div>';
		}
	}
</script>


@stop