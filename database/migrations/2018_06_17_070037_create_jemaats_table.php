<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJemaatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_jemaat');
            // $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->Integer('gerwil_id')->references('id')->on('gerwils')->onDelete('restrict');
            // $table->Integer('jabatan_id')->references('id')->on('jabatans')->onDelete('restrict');
            // $table->Integer('talenta_id')->references('id')->on('talentas')->onDelete('restrict');
            // $table->integer('nij');
            $table->string('nama'); 
            $table->enum('sts_klrg', ['Suami', 'Istri', 'Anak', 'Saudara', 'Lainnya']);
            $table->string('pernikahan'); 
            $table->string('sts_keluarga')->nullable();
            $table->enum('gerwil', ['Tengah', 'Timur', 'Barat', 'Selatan', 'Utara']);
            $table->enum('jk', ['Pria', 'Wanita']);
            $table->string('tempat_lahir');
            $table->string('kota');
            $table->string('kelurahan');
            $table->date('tgl_lahir');
            $table->enum('agama', ['Kristen', 'Katolik', 'Islam', 'Hindu', 'Buddha', 'KhongHuCu']);
            $table->enum('goldar', ['A', 'B', 'AB', 'O', 'RH+', 'RH-']);
            $table->string('pekerjaan')->nullable();
            $table->string('alamat');
            $table->string('pendidikan');
            $table->string('ilmu')->nullable();
            $table->string('hp')->nullable();
            $table->enum('sts_jemaat', ['Jemaat', 'Simpatisan']);
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
        Schema::dropIfExists('jemaats');
    }
}
