<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employ;
use Faker\Generator as Faker;

$factory->define(Employ::class, function (Faker $faker) {

    return [
        'graduation_date' => $faker->date('Y-m-d'),
        'birth_of_date' => $faker->date('Y-m-d'),
        'medical_registration_number' => $faker->randomNumber(),
        'registration_date' => $faker->date('Y-m-d'),
        'address' => $faker->address,
        'years_of_experience' => $faker->randomDigitNotNull,
        'cv' => $faker->imageUrl(),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'medical_field_id' => function () {
            return factory(App\Models\MedicalSpecialty::class)->create()->id;
        }
    ];
});
