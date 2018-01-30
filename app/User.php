<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection as Collection;


use DB;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirmed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Retorna los datos fiscales del usuario
     * @return array
     */
    public function fiscales()
    {
        
        return $this->hasOne('App\Fiscal');
    
    }

    /**
     * Retorna las tarjetas guardadas del usuario
     * @var array
     */
    public function tarjetas()
    {
        
        return $this->hasOne('App\Tarjeta');
    
    }

  
}
