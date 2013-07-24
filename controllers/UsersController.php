<?php

class UsersController extends BaseController {

	public function register() {
		return View::make('users/register')
			->with('title', 'Questa - Register');
	}

	public function createUser() {
		$validator = Validator::make(Input::all(), User::$rules);
		if($validator->passes()) {
			User::create(array(
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password'))
			));

			return Redirect::route('home')->with('message', 'Thanks for registering');
		} else {
			return Redirect::route('register')->withErrors($validator);
		}
	}

	public function getLogin() {
		return View::make('users/login')
			->with('title', 'Questa - Login');
	}

	public function postLogin() {
		$user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($user, true)) {
			return Redirect::route('home')->with('message', 'You are logged in!');
		} else {
			return Redirect::to('login')
				->with('message', 'Your username/password combination was incorrect!')
				->with('status', 'error')
				->withInput(Input::except('password'));
		}

	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/')->with('message', 'You have logged out sucessfully!');
	}
}