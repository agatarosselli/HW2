<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Iscrizione extends Model
{
    protected $table='iscrizione';//gli dico qual è la tabella del database a cui fare riferimento

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
    'allievo',
    'istruttore',
    'corso'
    ];

 
}



?>