<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestStore extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$store = new Store;
                $store->name = 'test';
                $store->password = Hash::make('test');
                $store->lat = 50.80009;
                $store->long = 3.26968;
                $store->adres = 'President Kennedypark 10, 8500 Kortrijk';
                $store->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Store::where('name', 'test')->delete();
	}

}
