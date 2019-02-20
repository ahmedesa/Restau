@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <restau-group 
    	    :restaus='@json($restaus)'
        	></restau-group>
		</div>
	</div>
</div>
@endsection
