<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Santri;
use Faker\Generator as Faker;

$factory->define(Santri::class, function (Faker $faker) {

    return [
        'nik' => $faker->word,
        'nama' => $faker->word,
        'kelamin' => $faker->word,
        'kategori' => $faker->word,
        'angkatan' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
