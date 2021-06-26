<?php

    use Illuminate\Support\Facades\Route;

    /*
    | Web Routes
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    */

    Route::get('/', 
       
        function () {

           return view('mhw1');
        
        })->name('mhw1');




    Route::get('/aboutUs', 
        function(){

            return view('aboutUs');

        })->name("aboutUs");




    Route::get('/taekwondo', 
        function(){

            return view('taekwondo');

        })->name("taekwondo");




    Route::get('/istruttori', 
       function(){

           return view('istruttori');

        })->name("istruttori");


 Route::get('/api/allievi/{user}', "ApiController@schedaAllievo")->name("allieviIscritti");//ritorna il json degli iscritti

 Route::get('/allievi', //ritorna gli allievi iscritti con l'istruttore loggato
    function(){

        return view('allievi');

    })->name("allievi");

 

    Route::get('/api/randomUser', "ApiController@randomUser")->name("randomUser"); //ritorna il json
    Route::get('/iscrizioni', "ApiController@visualizzaApiRandom")->name("allieviApi");//visualizza gli allievi dell'api random user e i corsi da secegliere per iscriversi



    Route::get('/login',  "LoginController@login")->name("login");     //rinomino la route
    Route::post('/login', "LoginController@checkLogin");              //route che definisce l'invio del form
    Route::get('/logout', "LoginController@logout")->name("logout");
    //Route::get('/login/errore', "LoginController@erroreLogin");
    


    Route::get('/register', "RegisterController@index")->name("register");  //visualizza la pagina di registrazione


    Route::post('/register', "RegisterController@create");  //si attiva quando mando i valori tramite form alla register
    Route::get("/register/username/{query}", "RegisterController@checkUsername")->name("registrazione");    
    Route::get("/register/email/{q}", "RegisterController@checkEmail")->name("email"); //la q è la variabile che passo alla route
   

    Route::get('/gallery1', "ApiController@index")->name("gallery");
 
   
    Route::get('/api/schedeIstruttori', "ApiController@scheda")->name("schedaIstruttore");
  
 

    Route::get('/ricerca/{q}', "ApiController@ricerca")->name("ricerca");


    Route::post('/api/aggiungi/{user}', "ApiController@aggiungiAllievo")->name("aggiungiAllievoApi"); 
    Route::post('/api/elimina/{user}', "ApiController@eliminaAllievo")->name("eliminaAllievo");





?>