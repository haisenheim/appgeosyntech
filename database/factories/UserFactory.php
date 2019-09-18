<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
	return [
		'first_name' => $faker->firstName(),
		'last_name'=>$faker->lastName,
		'role_id'=>rand(1,6),
		'phone'=>$faker->phoneNumber,
		'male'=>rand(0,1),
		'active'=>1,
		'pay_id'=>rand(1,3),
		'senior'=>rand(0,1),

		'email' => $faker->unique()->safeEmail,
		//'email_verified_at' => now(),
		'password' => \Illuminate\Support\Facades\Hash::make('1234'), // 1234
		'remember_token' => \Illuminate\Support\Str::random(10),
	];
});
