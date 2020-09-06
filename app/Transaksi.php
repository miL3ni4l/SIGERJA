<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['kode_transaksi', 'jemaat_id', 'acara_id', 'tgl_transaksi', 'bank', 'rek', 'jml_donasi','total_donasi', 'status', 'ket', 'bukti'];

    public function jemaat()
    {
    	return $this->belongsTo(Jemaat::class);
    }

    public function acara()
    {
    	return $this->belongsTo(Acara::class);
    }
} 
