<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Komplain;
use Faker\Generator as Faker;

$factory->define(Komplain::class, function (Faker $faker) {

    return [
        'isi' => $faker->text,
        'santri_id' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
