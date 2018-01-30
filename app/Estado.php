<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
		protected $connection = 'catalogos';
        protected $table = 'estados';
   		protected $primaryKey = 'id';
}
