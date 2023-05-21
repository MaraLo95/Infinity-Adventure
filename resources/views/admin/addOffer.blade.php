
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Infiniti Adventure</title>
    @include('../includes/cdn')
    <link href="{{asset('css/mainstyle.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      @include('../layouts/adminsidebar')
       
        <div id="content-wrapper" class="d-flex flex-column">

          <div id="content">
            @include('../layouts/adminnav')
            <h2 class="m-5">Dodaj paket</h2>
            <div class="container p-5">
                <form action="{{asset('insert-offer')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <label for="title">Naziv</label> 
                <input required type="text" class="form-control" name="name"><hr>
                <label for="text">Text</label> 
                <textarea required type="text" class="form-control" name="text"></textarea><hr>
                <label for="description">Opis</label> 
                <textarea required type="text" class="form-control" name="description"></textarea><hr>
                <label class="mr-5" for="price">Cena
                <input class="form-control" type="number" name="price" id=""></label>
                <input required type="file" name="image" id="image">
                <label for="dateStart">Od
                <input type="date" onchange="promeniMinDatum(this)" min="{{$min->toDateString()}}" name="dateStart" id="" class="form-control dateStart">
                </label>
                <label for="dateEnd">Do
                <input type="date" name="dateEnd" id="dateEnd" min="{{$min->toDateString()}}" class="form-control dateEnd">
                </label>

                <br>
                <div class="text-center">
            @if(count($products)>0)
            @foreach($products as $p)
            
               <label for="services" class="m-5">
                <input type="checkbox" class="form-control servicesOffer" value="{{$p->title}}" name="checked[]" id="">
                {{$p->title}}
               </label> 
           
            @endforeach
            @endif
            </div>
            <div class="text-center">
                <button class="btn btn-primary">Dodaj</button>
            </div>    
            </form>
            </div>           



          </div>
            @include('../layouts/adminfooter')
        </div>
      

    </div>
    
    

   
   


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('js/mainjs.js')}}"></script>

</body>
<script>$.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});</script>
</html>