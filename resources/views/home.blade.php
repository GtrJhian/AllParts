@extends('components/main')

@section('content')
<body>
	<div class="container2">
		@include('components.nav')
	</div>
	<div class="container1">
		<span class="text1">AllParts</span>
		<span class="text2">Hydraulics Industrial Corporation</span>
		<div class="container2">
			@include('components.menu')
		</div>
	</div>
	<footer class="sticky-footer1">
		<span>© AllParts Hydraulics Industrial Corporation 2018 || All Rights Reserved.</span>
	</footer>

</body>
@stop
