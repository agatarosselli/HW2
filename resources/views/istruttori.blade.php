@extends('layouts.style')
  
  @routes
  
  @section('script')
    <script src='{{ asset("js/pageistruttori.js") }}' defer="true"></script>
  @endsection
                    
                
    
               
            </nav>
        
                
        </header>   
        @section('content')
        <section>

             <div class="titIstruttori">
                     <h1 class="istruttoriTitolo">I NOSTRI ISTRUTTORI</h1>
                     <form name="form_istr" method="get">
                     <input id="filtro" name="cerca" type="text" placeholder="Cerca istruttore...">
                     <input id="sumbit2" type="submit" value="invia" name="tasto_invia">
                     </form>
            </div>
             
        </section>
                        
        <section id="Istr">
                     <div class="scheda">

                     </div>
         </section>
          @endsection          
                    
      