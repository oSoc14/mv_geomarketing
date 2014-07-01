<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Store extends \Eloquent implements UserInterface, RemindableInterface {

        use UserTrait, RemindableTrait;


	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	protected $hidden = array('password', 'created_at', 'updated_at');

	// Don't forget to fill this array
	protected $fillable = ['name', 'password', 'lat', 'long', 'address'];

}
