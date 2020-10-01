<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transnikah extends Model
{
    protected $table = 'trans_nikahs';
    protected $fillable = ['kode', 'jemaat_id', 'istri_id' ,'tgl', 'jam', 'pdt', 'tempat', 'cover'];

    public function jemaat()
    {
    	return $this->belongsTo(Jemaat::class);
    }

} 
