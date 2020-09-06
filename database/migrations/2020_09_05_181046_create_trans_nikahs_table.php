<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransNikahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_nikahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->integer('suami_id')->unsigned();
            $table->foreign('suami_id')->references('id')->on('jemaat')->onDelete('cascade');
            $table->integer('istri_id')->unsigned();
            $table->foreign('istri_id')->references('id')->on('jemaat')->onDelete('cascade');
            $table->date('tgl');
            $table->string('pdt');
            $table->string('tempat');
            $table->string('jam');
            $table->string('cover')->nullable();
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
        Schema::dropIfExists('trans_nikahs');
    }
}
