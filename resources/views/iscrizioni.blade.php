@extends('layouts.style')

  @routes

  @section('script')
   <script> let user = {{ Auth::user()->id }} </script> 
   <script src='{{ asset("js/allievi.js")}}' defer="true"></script>
  @endsection

     
                
 @section('content')
    
    <section id="sezcolorata" class="sezione">
    
       
        <div id=sez1>
            <h1>ISCRIVI AI CORSI</h1>
        </div>

        <div id="barraricerca">
            <input id="filtro" type="text" placeholder="Cerca Allievo..." >
        </div>

    </section> 

    <section  class="sezione hidden" id="sezione0">
    
<div id="linea">
    <div class="scritta"><h2>SELEZIONATI:</h2></div>
    
            <div id="rigaUnica">
        
                    
                        <select name="corsi" id="nomiCorsi">
                            
                                <option>Scegliere un corso al quale iscriversi</option>
                        

                                @foreach($nome as $nome)

                                {{$nome->nome}}
                                    <option value="{{$nome->id}}">{{$nome->nome}}</option>
                                @endforeach

                        </select>
                    
                                <div class="submit2">
                                    <a class="accedi" id="submit2">Iscrivi</a>
                                </div>
              
            </div>
</div>

        <div class="selezionati">
            
        </div>
    </section>

    <section class="sezione">
        <div class="persone"> </div>
    </section>

  @endsection