<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pharmacy;
use Faker\Generator as Faker;

$factory->define(Pharmacy::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'address' => $faker->word,
        'dose' => $faker->word,
        'company' => $faker->word,
        'type' => $faker->word,
        'user_id' => $faker->word,
        'pharmacy_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
