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
             $table->integer('anggota_id')->unsigned();
            $table->foreign('anggota_id')->references('id')->on('anggota')->onDelete('cascade');
            
            // $table->Integer('anggota_id')->references('id')->on('anggotas')->onDelete('restrict');
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
