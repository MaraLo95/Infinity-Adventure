<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @include('../includes/cdn')
    <link href="{{asset('css/mainstyle.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       
    </head>
    <body class="antialiased">
     
    <div class="container">
        <div class="text-center m-5"><h3>naslov: {{$offer->name}}</h3></div>
    <div class="row">
       
        <div class="col-6">
        <h4>text: {{$offer->text}}</h4> <hr>
        <h4>opis: {{$offer->description}}</h4> <hr>
        <h4>cena: {{$offer->price}} €</h4> <hr>
        <h4>datum: {{$offer->dateStart}} / {{$offer->dateEnd}}</h4> <hr>
       
        @php
        $removeServ = str_replace(array('[',']','"'), '',$offer->services);
        $services = explode(',', $removeServ);
        @endphp
        @if(count($services) > 0)
        @foreach($services as $s)
        <h4><i class="fa-solid fa-square-check"></i> {{$s}}</h4><hr>
        @endforeach
        @endif
     
      
    </div>
        <div class="col-6">
            <img  src="{{asset('storage/images/'.$offer->image)}}" style="width:100%;height:100%;" alt="">
        </div>
        </div>
    </div>      
    <script src="{{asset('js/mainjs.js')}}"></script>
    </body>
</html>
