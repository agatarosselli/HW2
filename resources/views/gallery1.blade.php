@extends('layouts.style')
@section('script')
<script src='{{ asset("js/photo.js") }}' defer="true"></script>
@endsection
       
                
          
                    @section('content')
                <section>
                    <div id="titGallery"><h1>I NOSTRI MIGLIORI MOMENTI</h1></div>
                    <div id="album-view">
                    
                    @foreach($foto as $f)
                  <div class="contenitore"><img src='immagini/{{$f->foto}}'></div>
                 <!--   {{$f}} serve per stampare-->
                    @endforeach
                    
                    </div>
                </section>
          
                
                <section id="modal-view" class="hidden">
                    
                </section>
                @endsection

    