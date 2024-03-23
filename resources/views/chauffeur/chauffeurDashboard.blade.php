<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <meta name="viewport" content="widthg=device-width, initial-scale=1, shrink-to-fit=no" />
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
    <body>
        <x-app-layout>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
            <div class="container-fluid">
                <div class="row" style="justify-content: center;">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        
                            <button style="margin: 50px;width: 300px;height: 300px;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <svg style="margin-left: 120px;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                                  </svg>
                                    <span style="font-size: 30px; font-weight: bold">Notifications</span>
                            </button>
                        
                        <!-- Modal- Notification -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Notification</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div style="width: 450px; margin-left: 25px; margin-top: " class="alert alert-success" role="alert">
                                    <p>Vous avez <strong> {{ $details ? '(1) voyage à faire': '(0) voyage à faire' }} </strong>aujourd'hui!<br>
                                    </p>
                                    <br>
                                    <h3>Véhicule à conduire: <span style="border: 1px solid yellow;background-color: yellow; width: 100px;height: 80px;"> <strong>{{ $details ? $details->marque : 'Aucun' }}</strong> </span></h3>
                                </div>
                                <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <button style="margin: 50px; width: 300px;height: 300px;" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                <svg style="margin-left: 120px;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                  </svg>
                                <span style="font-size: 30px">Alertes</span>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="container-fluid bg-dark" style="padding-top: 50px;padding-left: 80px; background-image: url(../build/assets/images/accueil.png);background-size: cover; background-repeat: no-repeat;">
                <main>
                   <div class="container-fluid" style="padding:40px">
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
                                        <th>Véhicule</th>
                                       </tr>
                                   </thead>
                                   <tfoot>
                                       <tr>
                                         <th>Prénom</th>
                                         <th>Nom</th>
                                         <th>Véhicule</th>
                                       </tr>
                                   </tfoot>
                                   <tbody>
                                       @foreach ($liste as $conducteur)
                                       <tr>
                                         <td>{{$conducteur->firstName}}</td>
                                         <td>{{$conducteur->lastName}}</td>
                                         <td>{{$conducteur->marque}}</td>
                                       </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
                </main>
            </div>
        </x-app-layout>
        
         <!-- Modal- Alert -->
         <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Alerte</h1>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('soumettre.alerte') }}" method="POST">
                        @csrf <!-- Ajoutez ceci pour la protection CSRF -->
                        <div class="form-floating">
                            <textarea rows="50" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="message"></textarea>
                            <br>
                            <label for="floatingTextarea">Laisser un message d'alerte svp</label>
                            <!-- Champ caché pour l'ID du chauffeur, sa valeur sera automatiquement renseignée côté serveur -->
                            <input hidden type="number" name="id_chauffeur" value="{{ auth()->id() }}" placeholder="{{ auth()->id() }}">
                        </div>
                        <button class="btn btn-success" style="background-color: forestgreen;color:white" type="submit" data-bs-dismiss="modal">Soumettre</button>
                    </form>                    
                </div>
                <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        @include('layouts.footer')
    </body>
</html>
