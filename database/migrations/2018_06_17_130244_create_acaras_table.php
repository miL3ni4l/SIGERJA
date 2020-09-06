<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateacarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acara', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('bank_id')->references('id')->on('banks')->onDelete('restrict');
            $table->string('nama_acr'); 
            $table->date('tgl_acara');
            $table->string('lokasi')->nullable();
            $table->integer('jumlah_acara');
            $table->text('ket')->nullable();
            $table->string('cover')->nullable();
            // $table->string('bank')->nullable();
            // $table->string('rek')->nullable();
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
        Schema::dropIfExists('acara');
    }
}
