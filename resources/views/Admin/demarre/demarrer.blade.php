@extends('layouts.base-agent')
@section('demarrer') 

  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/index.css')}}"> 
    <title> harmonie</title>
   
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- flipTimer CSS -->
<link rel="stylesheet" href="{{asset('css/flipTimer.css')}}">
<!-- flipTimer JS -->
<script src="{{asset('js/jquery.flipTimer.js')}}"></script>
	<!-- Demo CSS -->
	<link rel="stylesheet" href="{{asset('css/demo.css')}}">


    <div class="container-login100">
      <div class="wrap">
        <div class="wrap-login100 p-t-50 p-b-90 p-l-50 p-r-50">
                        <h2 class="attente_ppp">En Attente d'un appel..</h2>
                        <br> 
                        <button class="btn btn-default btn-outlined btn-square back-to-menu agentStatusButton"> retour</button>
                        <main>
                         <article>
                         
                          <div class="flipTimer" id="timeREADY">
                            <div class="hours"></div>
                            <div class="minutes"></div>
                            <div class="seconds"></div>
                          </div> 
                        </article>
                     </main>
                    </div>
                   
                     
        </div>
                 
                        <div>
                        <img class="fit-picture"
                            src="{{asset('images/15.png')}}"
                            alt="Grapefruit slice atop a pile of other slices">
                       </div>
                   
      </div>
 </div> 


          
@endsection
