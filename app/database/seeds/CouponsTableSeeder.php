<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CouponsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Coupon::create([
				'type' => $faker->randomDigit,
				'store_id' => null,
				'name' => $faker->userName,
				'time_begin' =>$faker->dateTime,
				'time_end' => $faker->dateTime,
				'radius' => $faker->randomDigit,
				'name' => $faker->word,
				'description' => $faker->text
			]);
		}
	}

}