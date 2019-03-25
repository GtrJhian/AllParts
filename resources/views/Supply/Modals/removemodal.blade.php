{{-- Remove item--}}
<div class="modal fade" id="removesupplier">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="itemArchive" action="/archiveItem" method="post">
				{{ csrf_field() }}
				<input type="hidden" id="aid" name="aid">
				<input type="hidden" id="aic" name="aic">
				<div class="modal-header">
					<h4>Remove Message</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<span>Are you sure you want to archive <p id="item_name"></p></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">
						<div class="col-sm-6">
							<input class="btn btn-danger" type="submit" name="aisubmit" value="Archive">
						</div>
						<div class="col-sm-6">
							<input type="button" class="close_confirm btn btn-primary" value="Cancel">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> {{-- end remove item--}}