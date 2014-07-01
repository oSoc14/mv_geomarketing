<?php

class StoresController extends \BaseController {

	/**
	 * Display a listing of stores
	 *
	 * @return Response
	 */
	public function index()
	{
		$stores = Store::all();

		return View::make('stores.index', compact('stores'));
	}

	/**
	 * Show the form for creating a new store
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('stores.create');
	}

	/**
	 * Store a newly created store in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Store::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Store::create($data);

		return Redirect::route('stores.index');
	}

	/**
	 * Display the specified store.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$store = Store::findOrFail($id);

		return View::make('stores.show', compact('store'));
	}

	/**
	 * Show the form for editing the specified store.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$store = Store::find($id);

		return View::make('stores.edit', compact('store'));
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

		return Redirect::route('stores.index');
	}

}
