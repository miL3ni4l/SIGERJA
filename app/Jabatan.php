<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';
    protected $fillable = ['jabatan_id','nama_jabatan', 'ket'];

    // public function jemaat()
    // {
    // 	return $this->belongsTo(Jemaat::class);
    // }

    public function jemaat()
    {
    	return $this->hasMany(Jemaat::class);
    }
    
}
