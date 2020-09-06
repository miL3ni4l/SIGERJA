<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acara';
    protected $fillable = ['nama_acr', 'bank_id' ,'tgl_acara', 'lokasi', 'jumlah_acara', 'ket', 'cover'];
    
    public function bank()
    {
    	return $this->hasOne(Bank::class);
    }
    /**
     * Method One To Many 
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
