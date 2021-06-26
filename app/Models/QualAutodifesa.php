<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class QualAutodifesa extends Model
{
    protected $table='q_autodifesa';//gli dico qual è la tabella del database a cui fare riferimento

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
    
     //tutte quelle variabili che possono essere modificate
    'nome',
    'livello'
    ];

    
    public function acq_autodifesa() /*acquisizione qualifiche autodifesa */
    {
        return $this->belongsToMany(User::class, 'acq_autodifesa','autodifesa', 'istruttore', 'id', 'id');
    }

}



?>