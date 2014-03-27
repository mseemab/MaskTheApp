<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable= array('name', 'gender', 'email', 'password', 'photo');
	public static $rules= array(
		 'name'=>'required|min:2',
		 'gender'=>'required',
		 'email'=>'required|email|unique:users',
		 'password'=>'required|alpha_num|between:8, 12'
		 );


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

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

	public function postFor()
	{
		return $this->hasMany('Post', 'post_for');
	}

	public function postBy()
	{
		return $this->hasMany('Post', 'post_by');
	}

	// public function postBy()
	// {
	// 	return $this->hasMany('Post', 'post_by');
	// }

	// public function comments()
 //    {
 //        return $this->hasMany('Comment');
 //    }

	

}