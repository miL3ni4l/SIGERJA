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

           
            //NOT NULL / TIDAK BOLEH KOSONG
            $table->enum('jk', ['Pria', 'Wanita']);
            $table->string('tempat_lahir');
            $table->string('kota');
            $table->string('kelurahan');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->enum('gerwil', ['Tengah', 'Timur', 'Barat', 'Selatan', 'Utara'])->nullable();
            $table->enum('agama', ['Kristen', 'Katolik', 'Islam', 'Hindu', 'Buddha', 'KhongHuCu'])->nullable();
            $table->enum('goldar', ['A', 'B', 'AB', 'O', 'RH+', 'RH-'])->nullable();
            $table->string('pekerjaan')->nullable();
            
            //KELUARGA
            //NOT NULL
            $table->string('pernikahan'); 
            //NULL
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->enum('sts_klrg', ['Suami', 'Istri', 'Anak', 'Saudara', 'Lainnya'])->nullable();;
            $table->string('sts_keluarga')->nullable();
            
            //BAPTIS
            $table->date('tgl_baptis')->nullable();
            $table->string('grj_baptis')->nullable();
            $table->string('pdt_baptis')->nullable();
            
            //PENDIDIKAN
            $table->string('pendidikan')->nullable();
            $table->string('ilmu')->nullable();
            $table->string('hp')->nullable();
            $table->text('aktiv_gereja')->nullable();
            $table->text('aktiv_masyarakat')->nullable();
            //NOT NULL
            $table->enum('sts_jemaat', ['Jemaat', 'Simpatisan', 'Tamu']);
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
