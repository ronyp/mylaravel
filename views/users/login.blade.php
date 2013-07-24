@extends('layouts/default')

@section('content')
<h2>Login</h2>
@if(Session::has('message'))
	<span class="{{ Session::get('status') }}">{{ Session::get('message') }}</span>
@endif
{{ Form::open(array('url' => 'login')); }}
	<p>
		{{ Form::label('username', 'Username'); }} <br>
		{{ Form::text('username') }}
	</p>
	<p>
		{{ Form::label('password', 'Password'); }}<br>
		{{ Form::password('password'); }}
	</p>
	<p>
		{{ Form::submit('Login'); }}
	</p>
{{ Form::close() }}
@stop