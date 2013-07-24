<?php

use Illuminate\Auth\UserInterface;


class User extends Eloquent implements UserInterface{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	// Add the fillable array
	protected $fillable = array('username', 'password');


	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
     * Automatically Hash the password when setting it
     * @param string $password The password
     */
    



	/**
	 * Set rules for users
	 */
	public static $rules = array(
		'username' => 'required|unique:users|alpha_dash|min:4',
		'password' => 'required|alpha_num|between:4,8|confirmed',
		'password_confirmation' => 'required|alpha_num|between:4,8' 
	);


	/**
	 * Add relationship to question model
	 */
	
	public function questions() {
		return $this->hasMany('Question');
	}

}