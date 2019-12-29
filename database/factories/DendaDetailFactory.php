<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DendaDetail;
use Faker\Generator as Faker;

$factory->define(DendaDetail::class, function (Faker $faker) {

    return [
        'tgl' => $faker->word,
        'denda' => $faker->word,
        'denda_id' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
