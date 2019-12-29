<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Presensi;
use Faker\Generator as Faker;

$factory->define(Presensi::class, function (Faker $faker) {

    return [
        'nik' => $faker->word,
        'tanggal' => $faker->word,
        'masuk' => $faker->word,
        'keluar' => $faker->word,
        'izin' => $faker->word,
        'keterangan' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
