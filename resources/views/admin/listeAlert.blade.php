<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard-Admin</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('demo/chart-area-demo.js')}}"></script>
        <script src="{{ asset('demo/chart-bar-demo.js')}}"></script>
        <script src="{{ asset('demo/chart-pie-demo.js')}}"></script>
        <script src="{{ asset('demo/datatables-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <title></title>
    </head>
    <body class="sb-nav-fixed">
       @include('layouts.nav')
   <main style="margin-left: 0px; margin-top: 90px">
   <br>
  <div class="container-fluid px-4">
      <div class="card mb-4">
           <div class="card-header bg-dark">
               <i class="fas fa-table me-1 bg-light"></i>
               <span style="color:aliceblue">Liste des alertes</span>
           </div>
          <div class="card-body">
            @foreach ($liste as $alert)
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">{{$alert->firstName}} {{$alert->lastName}}</h4>
                <p>{{$alert->message}}</p>
                <hr>
                <h3 class="mb-0">{{$alert->telephone}}</3>
                <hr>
                <h4>{{$alert->created_at}}</h4>
            </div>
            @endforeach
          </div>
      </div>
  </div>
</main>
       @include('layouts.footer');
    </body>
</html>
