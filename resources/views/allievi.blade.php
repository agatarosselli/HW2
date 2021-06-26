@extends('layouts.style')

  @routes

  @section('script')
   <script> let user = {{ Auth::user()->id }} </script> 
   <script src='{{ asset("js/iscritti.js")}}' defer="true"></script>
  @endsection

     
                
 @section('content')
    
    <section id="sezcolorata" class="sezione">
    
       
        <div id=sez1>
            <h1>ISCRITTI</h1>
        </div>

        <div id="barraricerca">
            <input id="filtro" type="text" placeholder="Cerca Allievo..." >
        </div>

    </section> 

    <section  class="sezione hidden" id="sezione0">
    
    </section>

    <section class="sezione">
        <div class="persone"> </div>
    </section>

  @endsection