<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
		protected $connection = 'catalogos';
        protected $table = 'municipios';
   		protected $primaryKey = 'id';
}
