<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AcceptRequestSpecialists;
use Faker\Generator as Faker;

$factory->define(AcceptRequestSpecialists::class, function (Faker $faker) {

    return [
        'note' => $faker->word,
        'recommendation' => $faker->word,
        'rating' => $faker->word,
        'doctor_id' => $faker->word,
        'request_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
