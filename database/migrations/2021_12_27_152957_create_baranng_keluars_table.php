<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaranngKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baranng_keluars', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah');
            $table->date('tgl_keluar');
            $table->string('jurusan');
            $table->string('kondisi');
            $table->bigInteger('barang_id')->unsigned();
            $table->foreign('barang_id')->references('id')
            ->on('barangs')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baranng_keluars');
    }
}
