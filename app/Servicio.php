<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public function palnes()
    {
    	return $this->belongsTo(Plane::class);
    }
}
