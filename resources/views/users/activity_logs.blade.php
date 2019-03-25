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
						<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-history" style="font-size:23px"></i> Activity Logs</strong></h6>
					</li>
				</ol>
                <div class="card mb-3">
					<div class="card-body">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Inventory</a>
                                <a class="nav-item nav-link" id="nav-b-tab" data-toggle="tab" href="#nav-b" role="tab" aria-controls="nav-b" aria-selected="false">Billings</a>
                                <a class="nav-item nav-link" id="nav-sup-tab" data-toggle="tab" href="#nav-sup" role="tab" aria-controls="nav-sup" aria-selected="false">Supplier</a>
                                <a class="nav-item nav-link" id="nav-st-tab" data-toggle="tab" href="#nav-st" role="tab" aria-controls="nav-st" aria-selected="false">Store</a>
                                <a class="nav-item nav-link" id="nav-u-tab" data-toggle="tab" href="#nav-u" role="tab" aria-controls="nav-u" aria-selected="false">User</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table name="inv_logs" id="inv_logs" class="table table-striped datatables primary">
                                    <thead class="text-center">
                                        <th>Date & Time</th>
                                        <th>Activity</th>
                                        <th>Actor</th>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-b" role="tabpanel" aria-labelledby="nav-b-tab">
                                <table name="b_logs" id="b_logs" class="table table-striped datatables primary">
                                    <thead class="text-center">
                                        <th>Date & Time</th>
                                        <th>Activity</th>
                                        <th>Actor</th>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-sup" role="tabpanel" aria-labelledby="nav-sup-tab">
                                <table name="sup_logs" id="sup_logs" class="table table-striped datatables primary">
                                    <thead class="text-center">
                                        <th>Date & Time</th>
                                        <th>Activity</th>
                                        <th>Actor</th>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-st" role="tabpanel" aria-labelledby="nav-st-tab">
                                <table name="st_logs" id="st_logs" class="table table-striped datatables primary">
                                    <thead class="text-center">
                                        <th>Date & Time</th>
                                        <th>Activity</th>
                                        <th>Actor</th>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-u" role="tabpanel" aria-labelledby="nav-u-tab">
                                <table name="u_logs" id="u_logs" class="table table-striped datatables primary">
                                    <thead class="text-center">
                                        <th>Date & Time</th>
                                        <th>Activity</th>
                                        <th>Actor</th>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
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
		$('.table').DataTable({
		});
	});
</script>
@stop