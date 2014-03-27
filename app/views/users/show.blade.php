@extends('layouts.main')

@section('contents')


{{ HTML::Image($user->photo, $user->name, array('width'=>100, 'height'=>100))}}

<h1>{{ $user->name }}</h1>

Gender: @if($user->gender=='m')Male @else Female @endif
@if(Auth::guest())
<p>Login to post on this user's wall.</p>
@elseif(Auth::user()->id==$user->id)
<a href="/events/create">Create an Event:</a>
<h3>Posts by others.</h3>
@else
{{ Form::Open(array('url'=>'/p')) }}
<p>
{{ Form::Label('post', 'Post')}}
{{ Form::Textarea('post') }}
</p>
<p>
{{ Form::Label('masked', 'Masked')}}
{{ Form::checkbox('masked', '1', true);}}
</p>

{{ Form::hidden('post_for', $user->id)}}
{{ Form::Submit('Post') }}

{{ Form::Close() }}
@endif


@foreach($posts as $post)
<h1>
@if($post->masked)
Anonymous
@else
{{ User::find($post->post_by)->name }}
@endif
</h1>
<p>{{ $post->post}}</p>


@endforeach
@stop