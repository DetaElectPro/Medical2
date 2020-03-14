<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RequestSpecialists;
use Faker\Generator as Faker;

$factory->define(RequestSpecialists::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'start_time' => $faker->date('Y-m-d'),
        'end_time' => $faker->date('Y-m-d'),
        'price' => $faker->numberBetween(90, 300),
        'number_of_hour' => $faker->numberBetween(2, 9),
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'doctor_id' => function () {
            return factory(App\User::class)->create()->id;
        }, 'medical_id' =>$faker->numberBetween(1, 22),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
