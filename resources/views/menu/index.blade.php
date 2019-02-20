@extends('layouts.app')

@section('content')
<div class="container">
    <menu-container 
    :items='@json($menus)'
	:restau_id="{{$restau_id}}"
    ></menu-container>
</div>
@endsection
