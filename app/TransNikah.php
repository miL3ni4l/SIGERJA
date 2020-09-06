<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransNikah extends Model
{
    protected $table = 'trans_nikahs';
    protected $fillable = ['kode', 'suami_id', 'istri_id', 'tgl', 'jam', 'pdt', 'tempat', 'cover'];

    public function jemaat()
    {
    	return $this->belongsTo(Jemaat::class);
    }

} 
