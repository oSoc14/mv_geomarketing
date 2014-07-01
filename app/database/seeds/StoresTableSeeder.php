<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StoresTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Store::create([
				'name' => $faker->userName,
				'password' => Hash::make($faker->word),
				'lat' => $faker->latitude,
				'long' => $faker->longitude,
				'adres' => $faker->address
			]);
		}
	}

}