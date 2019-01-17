@extends('components/main')

@section('content')
<body>
	@include('components.nav2')
	<div id="wrapper">
		@include('components.menu2')
		<div id="content-wrapper">
            <a class="btn" href="/Billing">GO Back</a>
			<div class="container-fluid">
                <h2>{{$billingposts->Name}}</h2>
                <p>{{$billingposts->Bill}}</p>
			</div>
			@include('components.footer2')
		</div>
	</div>
</body>
@stop