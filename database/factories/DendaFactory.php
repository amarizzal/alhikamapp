<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Denda;
use Faker\Generator as Faker;

$factory->define(Denda::class, function (Faker $faker) {

    return [
        'nik' => $faker->word,
        'total_denda' => $faker->word,
        'kegiatan_id' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
