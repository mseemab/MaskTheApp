<!DOCTYPE html>
<html>
<head>
	<title>Mask</title>
</head>
<body>

<form action="/u/search" method="get"> 
<input type="text" name="Search" id="Search" >
<input type="submit" value="Search">
</form>
@if(Auth::user())
{{ HTML::Link('/u/'.Auth::user()->id, Auth::user()->name)}}  <br>
<a href="/">Home</a>
@endif
@if(Session::has('message'))
	<p class="alert">{{Session::get('message')}} </p>
@endif
@if(Auth::guest())
{{ Form::open(array('url'=>'/u/signin'))}}
<p>
{{ Form::label('email', 'Email: ')}}
{{ Form::email('email')}}
</p>
<p>
{{ Form::label('password', 'Password: ')}}
{{ Form::password('password')}}
</p>
{{ Form::submit('Signin')}}
{{ Form::close()}}

@else
<a href="/u/signout">Signout</a>
@endif
@yield('contents')
</body>
</html>