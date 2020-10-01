<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
	protected $table = 'jemaat';
    protected $fillable = ['kode_jemaat', 'sts_klrg', 'pernikahan', 'ayah', 'ibu', 'tgl_baptis', 'grj_baptis', 'pdt_baptis', 'kota', 'kelurahan','jabatan_id', 'talenta_id', 'nij', 'nama', 'sts_keluarga', 'jk', 'tempat_lahir', 'gerwil', 'pendidikan', 'ilmu', 'aktiv_gereja', 'aktiv_masyarakat', 'tgl_lahir', 'agama', 'alamat', 'hp', 'sts_jemaat', 'goldar', 'pekerjaan'];

    // public function gerwil()
    // {
    // 	return $this->hasOne(Gerwil::class);
    // }

   
    public function jabatan()
    {
    	return $this->belongsTo(Jabatan::class);
    } 

    // public function jabatan()
    // {
    // 	return $this->hasOne(Jabatan::class);
    // }
    // public function talenta()
    // {
    // 	return $this->hasOne(Talenta::class);
    // }

    /**
     * Method One To One 
     */
    // public function user()
    // {
    // 	return $this->belongsTo(User::class);
    // }


    /**
     * Method One To Many 
     */
    public function transnikah()
    {
    	return $this->hasMany(TransNikah::class);
    }
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
        public function talenta()
    {
    	return $this->hasMany(Talenta::class);
    }
}
