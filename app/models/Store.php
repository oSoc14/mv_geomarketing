<?php

class Store extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	protected $hidden = array('password', 'created_at', 'updated_at');

	// Don't forget to fill this array
	protected $fillable = [];

}