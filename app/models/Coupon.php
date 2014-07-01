<?php

class Coupon extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ["store_id", "time_begin", "time_end", "radius", "name", "description"];

}