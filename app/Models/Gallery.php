<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
   
    protected $table='gallery';//gli dico quale è la tabella del database a cui fare riferimento

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [//tutte quelle variabili che possono essere modificate
      'foto'

    ];

}


?>