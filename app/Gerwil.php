<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerwil extends Model
{
    protected $table = 'gerwils';
    protected $fillable = ['nama_gerwil', 'ket'];

    public function jemaat()
    {
    	return $this->belongsTo(Jemaat::class);
    }
}
