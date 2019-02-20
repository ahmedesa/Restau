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

    <menu-container 
    :items='@json($menus)'
	:restau_id="{{$restau_id}}"
    ></menu-container>
</div>
@endsection
