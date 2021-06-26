<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class QualCombattimento extends Model
{ 
    protected $table='q_combattimento';//gli dico quale è la tabella del database a cui fare riferimento

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'nome'
    ];

    public function acq_combattimento()/*acquisizione qualifiche rapido*/
    {
        return $this->belongsToMany(User::class, 'acq_combattimento', 'combattimento', 'istruttore',  'id', 'id');
    }

}



?>


