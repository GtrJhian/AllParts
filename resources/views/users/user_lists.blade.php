@extends('components/main')

@section('content')

<meta name='csrf-token' content="{{csrf_token()}}"/>

<body>
    @include('components.nav_sales')
    <div id="wrapper" class="offset1">
        @include('components.menu_user')
        <div id="content-wrapper">
			<div class="container-fluid">
                <ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
					<li class="breadcrumb-item">
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-user" style="font-size:23px"></i> Users</strong></h6>
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
									<table class="table table-striped" id="userlist" width="100%" cellspacing="0">
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
                                                <!-- <button class="btn btn-sm btn-primary hi-icon1" data-target="#view_user" data-toggle="modal" ><i class="fa fa-eye"><span class="tooltiptext">View</span></i></button> -->
								                <button class="btn btn-sm btn-primary hi-icon1" data-target="#edit_user" data-toggle="modal"><i class="fa fa-edit"><span class="tooltiptext">Edit</span></i></button>
								                <button class="btn btn-sm btn-danger hi-icon1" data-target="#double_check1" data-toggle="modal"><i class="fa fa-times"><span class="tooltiptext">Remove</span></i></button>
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
    <div class="zoom">
		<a class="zoom-fab zoom-btn-blue zoom-btn-large tooltip-iventory-blue" data-toggle="modal" data-target="#add_user">
			<i class="fa fa-plus"></i>
			<span class="tooltip-iventorytext-blue">CREATE</span>
		</a>
	</div>
</body>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#userlist').DataTable({
			ajax: {
				url: '/User/show'
			},
			aoColumnDefs:[
				{
					render: function(data, type, row){
						return '<button  onclick="editUser('+data+')"class="btn btn-sm btn-primary hi-icon1"><i class="fa fa-edit"><span class="tooltiptext">Edit</span></i></button>\
								<button id = "btnDeleteUser'+data+'" onclick="deleteUser('+data+')" class="btn btn-sm btn-danger hi-icon1" ><i class="fa fa-times"><span class="tooltiptext">Remove</span></i></button>';
					},
					targets: 4
				}
			]
		});
	});

	function editUser(id){
		$.post({
			url: '/User/select',
			data: {
				_token : $('meta[name = "csrf-token"]').attr('content'),
				id: id
			}
		}).done(function(response){
			user = JSON.parse(response);
			$('#edit_user').modal('show');
			$('#edit_user input[name = "F_Name"]').val(user.F_Name);
			$('#edit_user input[name = "M_Name"]').val(user.M_Name);
			$('#edit_user input[name = "L_Name"]').val(user.L_Name);
			$('#edit_user input[name = "username"]').val(user.username);
			$('#edit_user input[name = "position"]').val(user.position);
			$('#edit_user input[name = "Contact_No"]').val(user.Contact_No);
			$('input[name = "id').val(user.id);
			//$('#edit_user input[name = "id').val(user.id);
			for(ctr = 0 ; ctr < 5; ctr++){
				$('#edit_user input[name = "access['+ctr+']"]').attr('checked',(user.user_access&(1<<ctr))>0?true:false);
			}
		});
	}
	function deleteUser(id){
		$('#double_check1').modal('show');
		$('#deleteUser').attr('userID',id);
	}
	function confirmedDelete(userid){
		userid = $(userid).attr('userid');
		$.post({
			url: '/User/delete',
			data: {
				_token: $('meta[name = "csrf-token"]').attr('content'),
				id: userid
			}
		}).done(function(response){
			$('#double_check1').modal('hide');
			$('#userlist').DataTable().row($('#btnDeleteUser'+userid).parents('tr')).remove().draw();
		});
	}
</script>
@stop