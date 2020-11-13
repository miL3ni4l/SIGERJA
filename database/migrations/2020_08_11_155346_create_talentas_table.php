<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talentas', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('jemaat_id')->unsigned();
            $table->foreign('jemaat_id')->references('id')->on('anggota')->onDelete('cascade');
            
            // $table->Integer('jemaat_id')->references('id')->on('jemaats')->onDelete('restrict');
            $table->string('nama_talenta');
            $table->string('ket');
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
        Schema::dropIfExists('talentas');
    }
}
