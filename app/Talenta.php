<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talenta extends Model
{
    protected $table = 'talentas';
    protected $fillable = ['jemaat_id','nama_talenta', 'ket'];

    // public function jemaat()
    // {
    // 	return $this->belongsTo(Jemaat::class);
    // } 
     public function jemaat()
    {
    	return $this->belongsTo(Jemaat::class);
    } 
}