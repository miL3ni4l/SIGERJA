<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talenta extends Model
{
    protected $table = 'talentas';
    protected $fillable = ['anggota_id','nama_talenta', 'ket'];


    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    } 
}
