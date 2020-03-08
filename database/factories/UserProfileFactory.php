<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1,3),
        'address' => $faker->sentence(10),
        'photo' => $faker->sentence(3),
        'phone' => random_int(1,3),
    ];
});
