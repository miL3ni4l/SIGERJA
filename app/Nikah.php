<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nikah extends Model
{
    protected $table = 'nikahs';
    protected $fillable = ['kode', 'anggota_id', 'istri_id' ,'tgl', 'jam', 'pdt', 'tempat', 'cover'];


    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    } 
}
