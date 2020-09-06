<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';
    protected $fillable = ['nama','bank', 'rek'];

    public function acara()
    {
    	return $this->belongsTo(Acara::class);
    }
}
