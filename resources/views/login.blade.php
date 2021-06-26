@extends('layouts.loginRegister')
      
        @section('login')
        <main class="login">

        <section class="main_right">
            <h1>Ciao!</h1>
            <form name='login' method='post' action="{{ route('login') }}">
            @csrf 
                <!-- Seleziono il valore di ogni campo sulla base dei valori inviati al server via POST,
                mantengo inoltre i valori inseriti in caso di ricarica della pagina -->
               
                <div class="riquadro" id="riqLogin">
                
                <h3>Sei un istruttore del nostro team?</br> Accedi o registrati</h3>

                <span class="avviso">@error('errore') {{ $message }} @enderror</span>

                <div class="username">
                    <div><label for='username'>Nome utente o email</label></div>
                    <div><input type='text' name='login' value="{{ old('login') }}" required  autofocus></div>  
             
                </div>  
             

                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password'></div>
              
                </div>

                <div class="remember">
                    <div><input type='checkbox' name='remember' value="1" ></div>
                    <div><label for='remember'>Ricordami</label></div>
                </div>

                <div >
                    <input  class="accedi" type='submit' value="Accedi">
                </div>
            </form>

            <div class="signup">Non hai un account? <a class="iscriviti" href="{{ route('register') }}">Iscriviti</a>
            </div>

        </section>
        </main>
    
        </header>
  @endsection
