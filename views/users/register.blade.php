@extends('layouts/default')

@section('content')
<h2>Register</h2><hr>
{{ Form::open(array('action' => 'UsersController@createUser')) }}
	<p>
		{{ Form::label('username', 'Username') }}<br>
		{{ Form::text('username', Input::old('username')) }}
		{{ $errors->first('username', '<span class="error">:message</span>') }}
	</p>
	<p>
		{{ Form::label('password', 'Password') }}<br>
		{{ Form::password('password') }}
		{{ $errors->first('password', '<span class="error">:message</span>') }}
	</p>
	<p>
		{{ Form::label('password_confirmation', 'Password confirmation') }}<br>
		{{ Form::password('password_confirmation') }}
	</p>
	<p>
		{{ Form::submit('Register') }}
	</p>
{{ Form::close() }}
@stop