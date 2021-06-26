<?php
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Corso;
use App\Models\QualAutodifesa;
use App\Models\QualCombattimento;
use App\Models\Allievo;
use App\Models\Gallery;
use App\Models\Iscrizione;

class ApiController extends Controller{

   
    public function index(){//prendo tutte le foto presenti nel database e visualizzo la galleria

        $foto = Gallery::all(); 
        
        return view("gallery1")->with("foto", $foto);
    }


    public function scheda(Request $request){ //faccio la richiesta se ci sono diversi parametri
        
        $q=$request->get('istruttore');//metto istruttore dentro a q, il parametro è q
       
        $a=User::with('iscrizione')->with('acq_combattimento')->with('acq_autodifesa'); 
       
        if($q)
        $a=$a->where('nome', 'like', '%'.$q.'%' )->orWhere('cognome', 'like', '%'.$q.'%');

        return $a->get();    
    }


    public function schedaAllievo($user){//mostra gli allievi relativi all'istruttore che esegue l'accesso

        return User::with('iscrizione')->with('iscrizione2')->where('id', $user)->get();
    }


    public function eliminaAllievo($user, Request $request){


        $c=$request->get('nome');//dal form data
        $a=$request->get('cognome');

       $allievo= Allievo::where('nome', $c)->where('cognome', $a)->first();
    
        Iscrizione::where('istruttore', $user)->where('allievo', $allievo->id)->delete();
    }

    public function aggiungiAllievo($user, Request $request) {

        $istruttore=User::find($user);

        $allievo = Allievo::create([
            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome')
        ]);


        if($istruttore){

            $newIscritto = Iscrizione::create([
                'allievo' => $allievo->id,
               'istruttore' => $user,
                'corso' =>  $request->input('corso') //lo prende dal value id
            ]);
        } 
       
    }


    public function randomUser(){ //api randomUser, mi ritorna il file json con tutti gli utenti

        $json = Http::get('https://randomuser.me/api/?results=24&nat=us');
      
        if ($json->failed()) abort(500);

        return $json;
    }

   
    public function visualizzaApiRandom(){ //visualizza i corsi e ritorna la pagina con gli allievi dell'api random user

        $nome = Corso::all(); //sono i corsi del form al quale iscriversi
            
        return view("iscrizioni")->with("nome", $nome);

    }


}


?>