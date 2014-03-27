@extends('layouts.main')


@section('contents')
{{ Form::Open(array('url'=>'/events'))}}

<p>
{{ Form::label('name', 'Get Feedback for: ')}}
{{ Form::text('name')}}
</p>

<p>
{{ Form::label('name', 'Get Feedback for: ')}}
{{ Form::text('name')}}
</p>

{{ Form::Close()}}

@stop