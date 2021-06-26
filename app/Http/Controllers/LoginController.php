<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller{

    public function login(){ 
        //verifico che l'utente sia già loggato e in quel caso
        if (Auth::check()){
            return view('allievi');
        }else{
            return view('login')->with('csrf_token', csrf_token());
        }  
    }

    public function checkLogin(Request $request)
    { 
        
        $login = $request->input('login'); //questo è il name

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $request->merge([$fieldType => $login]);//prende l'array requeste e dentro mette email o username

        $credentials = $request->only($fieldType, 'password');//vado a mettere dentro credenziali la password e quella che può essere l'email o username

        if(Auth::attempt($credentials, $request->remember)){
            return view('allievi');
        }else{
            return redirect('login')->withInput()->withErrors(['errore' => 'Nome utente, email o password errati']);
        }
    
    }


    public function logout() {	
        Auth::logout();
        Session::flush();
        return Redirect::route('login');
        
    }
}
?>
