<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDendaDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denda_details', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl');
            $table->string('denda', 20);
            $table->integer('denda_id')->unsigned();
            $table->integer('jadwalkegiatan_id')->unsigned();
            $table->boolean('status');
            $table->string('keterangan', 30);
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
        Schema::drop('denda_details');
    }
}
