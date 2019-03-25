{{-- Remove brand--}}
	<div class="modal fade" id="removeBrand">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="brandArchive" action="/archiveBrand" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="abid" name="abid">
					<input type="hidden" id="abn" name="abn">
					<div class="modal-header">
						<h4>Remove Message</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Are you sure you want to archive <p id="brand_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-danger" type="submit" name="absubmit" value="Archive">
							</div>
							<div class="col-sm-6">
								<input type="button" class="close_confirm_br btn btn-primary" value="Cancel">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end remove category--}}

	{{-- Remove category--}}
	<div class="modal fade" id="removeCategory">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="categoryArchive" action="/archiveCategory" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="acid" name="acid">
					<input type="hidden" id="aicat" name="aicat">
					<div class="modal-header">
						<h4>Remove Message</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<span>Are you sure you want to archive <p id="category_name"></p></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-6">
								<input class="btn btn-danger" type="submit" name="acsubmit" value="Archive">
							</div>
							<div class="col-sm-6">
								<input type="button" class="close_confirm_ca btn btn-primary" value="Cancel">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> {{-- end remove category--}}
