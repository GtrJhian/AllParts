<!DOCTYPE html>
<html>
<head>
	<title>AllParts</title>
	<link rel="icon" type="text/css" href="{{asset('vendor/img/allparts.png')}}" style="width: 100%;height: 100%">
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/custom/textanimate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/custom/action-button.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/custom/notification.css')}}">
	<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	
	<script src="{{ asset('vendor/custom/icons.js')}}"></script>

	<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
	<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<script src="{{asset('vendor/custom/sb-admin.js')}}"></script>
	<link href="{{asset('vendor/custom/sb-admin.css')}}" rel="stylesheet">

	<link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
	<script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
	<script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
	
	<link href="{{asset('vendor/custom/sb-inventory.css')}}" rel="stylesheet">

	<link href="{{asset('vendor/select2/css/select2.min.css')}}" rel="stylesheet" />
	<script src="{{asset('vendor/select2/js/select2.min.js')}}"></script>

	<!-- <link href="/css/app.css" rel="stylesheet" >
	<link href="{{ asset('public/css/toastr.min.css') }}" rel="stylesheet" type="text/css">
	<script src="/js/app.js"></script>
	<script src="{{ asset('public/js/toastr.min.js')}}"></script>
	<script>
		@if(Session::has('success'))
			toastr.success("{{Session::get('success')}}")
		@endif
	</script> -->
</head>
@yield('content')
@yield('script')
</html>