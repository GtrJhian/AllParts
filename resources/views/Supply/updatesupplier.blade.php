@extends('components/main')

@section('content')
 

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
		@include('components.menu3')
		<div id="content-wrapper">
			<div class="container-fluid">
				<div class="row">
				
					<div class="col-sm-12">
						{{-- <ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
							<li class="breadcrumb-item">
								<a href="/inventoryMain" class="text5" style="letter-spacing: .25em; text-transform: uppercase;">EDIT SUPPLIER</a>
							</li>
						</ol> --}}
						<ol class="breadcrumb" style="border-radius: 0px;background-color:#fff">
							<li class="breadcrumb-item">
								<h6 class="text5" style="letter-spacing: .15em; text-transform: uppercase;"><strong><i class="fa fa-truck" style="font-size:23px"></i> Edit Supplier</strong>
								</h6>
							</li>
						</ol>
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col">
                            <form id="itemCreate" action="{{ route('supplier.update',['id' => $supplier->Supplier_ID])}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-horizontal">
                                    <div class="row">
                                        <label class="col-sm-6">Company Name: </label>
                                        <div class="col-sm-12">
                                            <input type="text" id="companyname" name="companyname" required class="form-control" value="{{$supplier->Company_Name}}">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <label class="col-sm-6">Company Address: </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <textarea class="form-control" id="companyadd" name="companyadd" required>{{$supplier->Company_Address}}</textarea>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <label class="col-sm-6">Company Number: </label>
                                        <div class="col-sm-12">
                                            <input type="text" id="companynumber" name="companynumber" required class="form-control" value="{{$supplier->Company_Contact}}">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <label class="col-sm-6">Company E-mail: </label>
                                        <div class="col-sm-12">
                                            <input type="text" id="companyemail" name="companyemail" required class="form-control" value="{{$supplier->Company_Email}}">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input class="btn btn-success btn-block" type="submit" name="uisubmit" value="Update Supplier">
                                        </div>
                                    </div>
                                </div>
                            </form>
			
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
