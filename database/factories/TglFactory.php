<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tgl;
use Faker\Generator as Faker;

$factory->define(Tgl::class, function (Faker $faker) {

    return [
        'tgl' => $faker->word,
        'jenis_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
