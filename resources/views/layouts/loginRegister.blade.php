<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"> <!-- settare la codifica-->
  <title>   TAEKWON-DO ITF CATANIA  </title>   
<meta name="viewport" content="width=device-width, initial-scale=1"> 

<link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&family=Oswald:wght@600&family=Truculenta:wght@600;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&family=Oswald:wght@600&family=Truculenta:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Carter+One&family=Kanit:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&family=Ropa+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("mhw1.css") }}'>
<script src='{{ asset("js/menuLaterale.js")}}' defer="true"></script>
@routes


@yield('script')

</head>

<body> 
    <header> 
        <nav>      
                <div id="logo">
                     <img src="immagini/img/animation (2).gif"> 
                </div>  
            
                <div id="menuLaterale"class="pannelloLaterale  comandi">  
                       <a href="javascript:void(0)" class="close">&times;</a>                              
                        <a href="{{ route('mhw1')}}">HOME</a>
                        <a href="{{ route('aboutUs')}}">ABOUT US</a> 
                        <a href="{{ route('taekwondo')}}">TAEKWON-DO ITF</a>
                        <a href="{{ route('gallery') }}">GALLERIA</a>
                        <a href="{{ route('istruttori') }}">ISTRUTTORI</a>
                        @auth
                        <a href="{{ route('allieviApi') }}">ALLIEVI</a>
                        <a href="{{ route('allievi') }}">ISCRITTI</a>
                        @endauth
                </div>
                 
          

           @yield('tasto')          

       <button class="open" >&#9776;</button>

            
        </nav>
          @yield('login')  
          @yield('signup')  
          @yield('testo') 
    </header>    
        @yield('content')
      
    <footer>
                    <div id="social">
                        <a href="https://www.instagram.com/agata_rosselli/"><img src="immagini/img/insta.png" alt="" ></a>
                       <a href="https://www.facebook.com/agata.rosselli.1/"><img src="immagini/img/fb.png" alt=""></a>
                       <a href="https://twitter.com/?lang=it"><img src="immagini/img/tw.png" alt=""></a> 
                    </div>  
                        <div id="nome"><em> Agata Rosselli</em></div>
                            <div id="matricola"> O46002240</div>                   
                </footer>
                </body>
</html>