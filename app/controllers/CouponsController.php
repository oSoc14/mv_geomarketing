<?php

class CouponsController extends \BaseController {

	/**
	 * Display a listing of coupons
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Coupon::all());
	}

	/**
	 * Show the form for creating a new coupon
	 *
	 * @return Response
	 */
	public function create()
	{
		return '';
	}

	/**
	 * Store a newly created coupon in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Coupon::create(array(
			'type' => Input::get('type'),
			'time_begin' =>  Input::get('time_begin'),
			'time_end' =>  Input::get('time_end'),
			'radius' => Input::get('radius'),
			'name' => Input::get('name'),
			'description' => Input::get('description'),
			'user_id' => Input::get('user')
		));

		return Response::json(array('success' => true));
	}

	/**
	 * Display the specified coupon.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(Coupon::findOrFail($id));
	}

	/**
	 * Show the form for editing the specified coupon.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return '';
	}

	/**
	 * Update the specified coupon in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		return '';

		$coupon = Coupon::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Coupon::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$coupon->update($data);

		return Redirect::route('coupons.index');
	}

	/**
	 * Remove the specified coupon from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Coupon::destroy($id);

		return Response::json(array('success' => true));
	}

}
