<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Corso;
use App\Models\User;

class Allievo extends Model
{
    protected $table='allievo';//gli dico qual è la tabella del database a cui fare riferimento

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
    
     //tutte quelle variabili che possono essere modificate
    'nome',
    'cognome',
    'data_nascita'
    ];

    public function iscrizione(){
        return $this->belongsToMany(Corso::class, 'iscrizione', 'allievo', 'corso', 'id', 'id');
    }
   
    public function iscrizione2(){
        return $this->belongsToMany(User::class, 'iscrizione', 'allievo', 'istruttore', 'id', 'id');
    }
}

?>