@extends('layouts.main')
@section('contents')
@if($errors->has())
<div id="form-errors">
	<p>The following Errors have occured</p>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

{{ Form::open(array('url'=>'/u', 'files' => true)) }}

	<p>
	{{ Form::label('name','Your Name') }}
	{{ Form::text('name') }}
	</p>
	<p>
	{{ Form::label('email','Your Email') }}
	{{ Form::email('email') }}
	</p>
	<p>
	{{ Form::label('password','Your Password') }}
	{{ Form::password('password') }}
	</p>
	<p>
	{{ Form::label('gender','You are a:') }}
	Male: {{ Form::radio('gender', 'm', 'male') }}
	Female: {{ Form::radio('gender', 'f', 'female') }}
	</p>
	<p>
	{{ Form::label('photo', 'Choose an Image') }}
	{{ Form::file('photo')}}
	</p>
	<p>
	{{ Form::submit('Submit') }}
	</p>

{{ Form::close()}}
@stop