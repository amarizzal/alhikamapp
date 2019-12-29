<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSantrisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 50);
            $table->string('nama', 50);
            $table->string('kelamin', 20);
            $table->string('kategori', 20);
            $table->string('angkatan', 6);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('santris');
    }
}
