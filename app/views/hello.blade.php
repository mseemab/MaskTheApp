

@extends('layouts.main')

@section('contents')
<h1>Current Masked Users</h1>
@foreach($users as $user)
	<a href="/u/{{ $user->id}}">
		<li>{{ HTML::image($user->photo, $user->title, array('width'=>'50'))}}<h5>{{ $user->name}}</h5></li>
	</a>
@endforeach

<a href="/u/create">Sign Up</a>
@stop