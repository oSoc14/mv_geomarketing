<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('type');
			$table->unsignedInteger('store_id');
			$table->dateTime('time_begin');
			$table->dateTime('time_end');
			$table->integer('radius');
			$table->text('naam');
			$table->mediumText('omschrijving');
			$table->foreign('store_id')->references('id')
						 ->on('stores')->onDelete('cascade')
						 ->onUpdate('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
