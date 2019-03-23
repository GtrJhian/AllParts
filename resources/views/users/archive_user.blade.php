@extends('components/main')

@section('content')
<body>
    @include('components.nav_sales')
    <div id="wrapper" class="offset1">
        @include('components.menu_user')
        <div id="content-wrapper">
			<div class="container-fluid">
                <ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
					<li class="breadcrumb-item">
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-trash" style="font-size:23px"></i> Archive Users</strong></h6>
					</li>
				</ol>
                <div class="card mb-3">
					<div class="card-body">
                        <!-- <div class="row">
							<div class="col-2" style="padding-bottom:10px">
								<button class="btn btn-md btn-primary" data-target="#add_user" data-toggle="modal"><i class="fa fa-plus"></i> Add User</button>
							</div>
						</div> -->
						<div class="row">
							<div class="col">
								<div class="table-responsive">
									<table class="table table-striped" id="archlist" width="100%" cellspacing="0">
										<thead>
											<th>Employee Name</th>
											<th>Position</th>
											<th>Contact No.</th>
											<th>Username</th>
                                            <th>Action</th>
										</thead>
                                        <tbody>
											<td>Juan Dela Cruz</td>
											<td>Operations Manager</td>
											<td>09123456789</td>
											<td>jdelacruz</td>
                                            <td>
                                                <button class="btn btn-sm btn-success hi-icon1" data-target="#restore" data-toggle="modal" ><i class="fa fa-redo"><span class="tooltiptext">Restore</span></i></button>
								                <button class="btn btn-sm btn-danger hi-icon1" data-target="#doublecheck" data-toggle="modal"><i class="fa fa-times"><span class="tooltiptext">Remove</span></i></button>
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
            @include('users.users_modals')
        </div>
    </div>
</body>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#archlist').DataTable({
		});
	});
</script>
@stop