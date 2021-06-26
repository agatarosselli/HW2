<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller {
    
    protected function create()
    {
        $request = request(); //prendo le cose inviate con metodo post all'interno del form in php
        $foto_profilo = $request->has('avatar') ? $request->file('avatar') : null;//verifico se la foto è stata inviata o meno 
    
        if($this->countErrors($request) === 0) {//se non trova errori prosegue

        if($foto_profilo){
                $request->validate([//validazione foto profilo
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
                ]);
                $nomeImg = $request['username'] . '.' . $request->avatar->extension();
                $request->avatar->move(public_path('immagini/istruttori'), $nomeImg);
                $foto_profilo =  url("/immagini/istruttori/{$nomeImg}");
       
            }


            $newIstrutt =  User::create([
            'username' => $request['username'],//assegno i corrispettivi valori
            'password' =>Hash::make($request['password']),//a sinistra quelli del modello a destra quelli del form, Hash cifra la password
            'nome' => $request['name'],
            'cognome' => $request['surname'],
            'email' => $request['email'],
            'foto_profilo' => $foto_profilo ?? null
            ]);
            if ($newIstrutt) {//se è stato creato il nuovo istruttore, rimane loggato
                Auth::login($newIstrutt);
                return view('allievi');
            } 
            else {
                return view('register')->withInput();
            }
        }
       else 
           return view('register')->withInput();
           
    }

    private function countErrors($data) {
        $error = array();
        

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        # PASSWORD
        if (strlen($data["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        # CONFERMA PASSWORD
        if (strcmp($data["password"], $data["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        return count($error);
    }


    public function checkUsername($query){ //se esiste già mi ritorna qualcosa true o false(se non esiste)
    $exist = User::where('username', $query)->exists();
    return ['exists'=> $exist];
    }

    public function checkEmail($query){
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function index(){//mi ritorna la pagina di iscrizione
        return view('register');
    }

}
?>