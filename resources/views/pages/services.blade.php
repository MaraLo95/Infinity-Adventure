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
        
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
      

            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">

                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth

                </div>
            @endif
        </div>
            <div class="containe-fluid cardServices">
                <h2 class="text-center">USLUGE</h2>
                <div class="row">
                @if (count($products) > 0)
                @foreach($products as $p)
                <div class="col-sm-12 col-md-6 col-lg-3"><div class="card">
                        <div class="card-body" style="background-image:url('{{asset('storage/images/'.$p->image)}}'); background-size:100% 100%;" onmouseover="hoverCard(this)" onmouseleave="unhoverCard(this)">  
                        <div class="card-header bg-dark">{{$p->title}}</div>
                            <div class="card-text">{{$p->text}}</div>
                        </div>
                    </div></div>
                @endforeach    
            @else 
                <h3 class="m-5">Trenutno nema usluga za prikaz!</h3>      
            @endif         
                </div>
            </div>



            <div class="container">
            <h2 class="text-center">PONUDA</h2>
                <div class="row">
                @if (count($offer) > 0)
                @foreach($offer as $o )
                <div class="card text-center" style="width: 18rem;">
  <img class="card-img-top" src="{{asset('storage/images/'.$o->image)}}" style="height:250px;" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$o->name}}</h5>
    <p class="card-text">{{$o->text}}</p>
    <small>{{$o->dateStart}} / {{$o->dateEnd}}</small>
    <br>
    <a href="{{URL::to('delete-offer/'.$o->id)}}" class="btn m-3 mr-2"><i class="fa-solid fa-trash"></i></a>
    <a href="{{URL::to('view-offer/'.$o->id)}}" class="btn btn-primary  m-3 ml-5">Prikaži</a>
  </div>
</div>
</div>
                @endforeach    
            @else 
                <h3 class="m-5">Trenutno nema usluga za prikaz!</h3>      
            @endif         
                </div>
            </div>

            <script src="{{asset('js/mainjs.js')}}"></script>
    </body>
</html>
