<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\JadwalKegiatan;
use Faker\Generator as Faker;

$factory->define(JadwalKegiatan::class, function (Faker $faker) {

    return [
        'tanggal' => $faker->word,
        'kegiatan_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
