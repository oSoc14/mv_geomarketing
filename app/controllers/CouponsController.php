<?php

class CouponsController extends \BaseController {

        /**
         * Instantiate a new CouponsController instance
         */
        public function __construct()
        {
            $this->beforeFilter('basic.once');
        }

	/**
	 * Display a listing of coupons
	 *
	 * @return Response
	 */
	public function index()
	{
		$coupons = Coupon::all();

		return View::make('coupons.index', compact('coupons'));
	}

	/**
	 * Show the form for creating a new coupon
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('coupons.create');
	}

	/**
	 * Store a newly created coupon in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Coupon::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Coupon::create($data);

		return Redirect::route('coupons.index');
	}

	/**
	 * Display the specified coupon.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$coupon = Coupon::findOrFail($id);

		return View::make('coupons.show', compact('coupon'));
	}

	/**
	 * Show the form for editing the specified coupon.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$coupon = Coupon::find($id);

		return View::make('coupons.edit', compact('coupon'));
	}

	/**
	 * Update the specified coupon in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
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

		return Redirect::route('coupons.index');
	}

}
