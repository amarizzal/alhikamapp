<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Kegiatan;
use Faker\Generator as Faker;

$factory->define(Kegiatan::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'harga_denda' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
