
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
            <h1 class="m-5">Usluge</h1>
            <div class="container text-right"><a href="{{asset('/addServices')}}" class="btn btn-primary">Dodaj uslugu</a></div>
            <br>
            <br>
            <div class="container-fluid cardServices">
            <div class="flash-message m-5">
            @include('../includes/flash-message')
          </div>
                <div class="row">

            @if (count($products) > 0)
                @foreach($products as $p)

                <div class=" col-sm-12 col-md-6 col-lg-3"><div class="card">
                        <div class="card-body" style="background-image:url('{{asset('storage/images/'.$p->image)}}'); background-size:100% 100%;" onmouseover="hoverCard(this)" onmouseleave="unhoverCard(this)">  
                        <div class="card-header bg-dark">{{$p->title}}</div>
                            <div class="card-text">{{$p->text}}</div>
                        </div>
                        <a href="{{URL::to('delete-product/'.$p->id)}}" class="btn mt-3"><i class="fa-solid fa-trash"></i></a>
                    </div></div>

                @endforeach    
            @else 
                <h3 class="m-5">Trenutno nema usluga za prikaz!</h3>      
            @endif         
                </div>
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

</html>