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
       @include('layouts.sideConducteur')
       <main style="margin-left: 0px; margin-top: 90px">
         <div class="row">
             <div class="col-md-4"></div>
             <div class="col-md-4"></div>
             <div class="col-md-4">
                 <a href="{{route('conduire.page')}}">
                     <button style="margin-left: 195px" class="btn btn-dark">
                         Ajouter un conducteur
                     </button>
                 </a>
             </div>
         </div>
         <br>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header bg-dark">
                    <i class="fas fa-table me-1 bg-light"></i>
                    <span style="color:aliceblue">Liste des conducteurs</span>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                             <th>Prénom</th>
                             <th>Nom</th>
                             <th>Adresse</th>
                             <th>Téléphone</th>
                             <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <tr>
                                 <th>Prénom</th>
                                 <th>Nom</th>
                                 <th>Adresse</th>
                                 <th>Téléphone</th>
                                 <th>Actions</th>
                                </tr>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($liste as $conducteur)
                            <tr>
                                <td> {{ $conducteur->firstName}} </td>
                                <td> {{ $conducteur->lastName}} </td>
                                <td> {{ $conducteur->address}} </td>
                                <td> {{ $conducteur->telephone}} </td>
                                <td>
                                    {{-- <a style="text-decoration: none" href="{{ route('modifier.candidat',['id' => $candidat->id_candidat])}}"> --}}
                                    <a style="text-decoration: none" href="#">
                                        <button class="btn btn-outline-info"><i style="width: 10px;height: 10px;" class="fas fa-edit"></i></button>
                                    </a>
                                    {{-- <a style="text-decoration: none" href="{{ route('supprimer.candidat',['id' => $candidat->id_candidat])}}"> --}}
                                    <a style="text-decoration: none" href=" {{route('admin.supprimerConduite',['id' => $conducteur->id])}} ">
                                       <button class="btn btn-outline-danger"><i class="fa-solid fa-trash" style="width: 10px;height: 10px;"></i></button>
                                    </a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </main>
       @include('layouts.footer');
    </body>
</html>
