@extends('layouts.master')

@section('title')
	stores
@stop

@section('content')
	<h1>All Stores</h1>
	@foreach($stores as $store)
		<p>This is store {{$store->name}}</p>
	@endforeach
@stop