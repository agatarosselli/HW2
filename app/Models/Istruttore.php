<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\QualAutodifesa;
use App\Models\QualCombattimento;
use App\Models\Corso;
use App\Models\Allievo;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table='istruttore';//gli dico quale è la tabella del database a cui fare riferimento

    /**
     * The attributes that are mass assignable.
     *
     * 
     * @var array
     */

    protected $fillable = [
       
        //tutte quelle variabili che possono essere modificate
      'nome',
      'cognome',
      'foto_profilo',
      'email',
      'username',
      'password'

    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ //serve a non farle apparire, oscurare il contenuto
        'password',
        'remember_token'//quando vengono mandate cose con la post, serve sempre il token
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
 

    
    public function acq_autodifesa() /*acquisizione qualifiche autodifesa */
    {
        return $this->belongsToMany(QualAutodifesa::class, 'acq_autodifesa', 'istruttore', 'autodifesa', 'id', 'id');
    }


    public function acq_combattimento()/*acquisizione qualifiche combattimento*/
    {
        return $this->belongsToMany(QualCombattimento::class, 'acq_combattimento', 'istruttore', 'combattimento', 'id', 'id');
    }
    
    public function iscrizione(){
        return $this->belongsToMany(Corso::class, 'iscrizione', 'istruttore', 'corso',  'id', 'id')->distinct();
    }
  
    public function iscrizione2(){
        return $this->belongsToMany(Allievo::class, 'iscrizione','istruttore', 'allievo',  'id', 'id');
    }
}

