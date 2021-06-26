@extends('layouts.loginRegister')

@section('script')
<script src='{{ asset("js/register.js")}}' defer="true"></script>
@endsection

@section('signup')
        <main class="login2">
        <section class="main_right">

            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
            
 @csrf 
            <div class="riquadro" id="riqIscriz">

                        <div class="name @error('name') errorj @enderror">
                        <div><label for='name'>Nome</label></div>
                        <div><input type='text' name='name' value="{{ old('name') }}"></div>
                        <span class="avviso"></span> 
                    </div>

                    <div class="surname @error('surname') errorj @enderror">
                        <div><label for='surname'>Cognome</label></div>
                        <div><input type='text' name='surname' value="{{ old('surname') }}" ></div>
                        <span class="avviso"></span>
                    </div>

                    <div class="username1 @error('username1') errorj @enderror">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' value="{{ old('username') }}"></div>
                    <span class="avviso">&nbsp;@error('username1') {{ $message }} @enderror</span>
                </div>

                <div class="email @error('email') errorj @enderror">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email'></div>
                    <span class="avviso">&nbsp;@error('email') {{ $message }} @enderror</span>
                </div>

                <div class="password1 @error('password1') errorj @enderror">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password'></div>
                    <span class="avviso">&nbsp;@error('password1') {{ $message }} @enderror</span>
                </div>

                <div class="confirm_password @error('password1') errorj @enderror">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password'></div>
                    <span class="avviso"></span>
                </div>

                <div class="fileupload @error('avatar') errorj @enderror">
                    <div><label for='avatar'>Scegli un'immagine profilo</label></div>
                    <div>
                        <input type='file' name='avatar' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original">
                        <div id="upload"><div class="file_name">Seleziona un file...</div><div class="file_size"></div></div>
                    </div>
                    <span class="avviso">@error('avatar') {{ $message }} @enderror</span>
                </div>
              
                <div class="allow"> 
                    <div><input type='checkbox' name='allow' value="1"></div>
                    <div class="didascalia"><label for='allow'>Acconsento al trattamento dei dati personali</label></div>
                </div>

                <div class="submit">
                    <input class="accedi" type='submit' value="Registrati" id="submit" disabled>

                </div>
        
                </form> 

                <div class="signup">Hai già un account? <a class="iscriviti" href="{{ route('login') }}">Accedi</a>

            </div>

        </section>

        </main>
        </header>
        @endsection
  