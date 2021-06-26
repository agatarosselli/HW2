<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Allievo;

class Corso extends Model
{
    protected $table='corso';//gli dico qual è la tabella del database a cui fare riferimento

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
    'nome'
    ];

    
    public function iscrizione() /*acquisizione qualifiche autodifesa */
    {
        return $this->belongsToMany(User::class, 'iscrizione','corso', 'istruttore',  'id', 'id');
    }

      
    public function iscrizione2() /*acquisizione qualifiche autodifesa */
    {
        return $this->belongsToMany(Allievo::class, 'iscrizione','corso', 'allievo',  'id', 'id');
    }
}



?>