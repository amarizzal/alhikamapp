<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresensisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 50);
            $table->date('tanggal');
            $table->string('masuk', 30)->nullable();
            $table->string('keluar', 30)->nullable();
            $table->boolean('izin');s
            $table->string('keterangan', 100);
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
        Schema::drop('presensis');
    }
}
