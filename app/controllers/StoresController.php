<?php

class StoresController extends \BaseController {

        /**
         * Instantiate a new StoresController instance
         */
        public function __construct()
        {
              $this->beforeFilter('basic.once');
        }

	/**
	 * Display a listing of stores
	 *
	 * @return Response
	 */
	public function index()
	{
                /*$store = new Store;
                $store->name = 'test';
                $store->password = Hash::make('test');
                $store->lat = 50.80009;
                $store->long = 3.26968;
                $store->adres = 'President Kennedypark 10, 8500 Kortrijk';
                $store->save();*/
		
		return Response::json(Store::all());
	}

	/**
	 * Show the form for creating a new store
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'not yet';
	}

	/**
	 * Store a newly created store in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Store::create(array(
			'name' => Input::get('name'),
			'password' => Hash::make(Input::get('password')),
			'lat' => Input::get('lat'),
			'long' => Input::get('long'),
			'adres' => Input::get('addres')
		));

		return Response::json(array('success' => true));
	}

	/**
	 * Display the specified store.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(Store::findOrFail($id));
	}

	/**
	 * Show the form for editing the specified store.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return 'not yet';
	}

	/**
	 * Update the specified store in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$store = Store::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Store::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$store->update($data);

		return Redirect::route('stores.index');
	}

	/**
	 * Remove the specified store from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Store::destroy($id);

		return Response::json(array('success' => true));
	}

}
