<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Reservation</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
</head>
<body>
   <div class="container-fluid bg-dark">
      <br>
      <div class="text-center">
         <a href="/home">
            <img width="200" height="100" src="/build/assets/images/yobalema.png" alt="logo">
         </a>
      </div>
      <br>
      <br>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
      <div style="margin-left: 70px;" class="container-fluid">
         @foreach ($liste as $info)
          <!-- Button trigger modal -->
         @if ($info->nb_place == 0)
         <button disabled style="margin-left: 50px;" class="shadow p-3 mb-5 bg-body-tertiary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="setVehicleId({{$info->id_vehicule}})">
            <style>
               .icon-text-container {
                  display: flex;
                  align-items: center; /* Pour aligner les éléments verticalement */
               }
   
               .icon-text-container svg {
                  margin-right: 5px; /* Pour ajouter un espace entre l'icône et le texte */
               }
            </style>
            {{-- <img width="200" src="../build/assets/images/vehicules/{{$info->photo}}" alt="vehicule"> --}}
            <img style="width: 400px;height: 300px; box-shadow: 1px 1px 1px 5px rgb(255, 255, 255);" src="../build/assets/images/vehicules/{{$info->photo}}" alt="image">
            <div style="width: 300px; height: 170px;box-shadow: 1px 1px 1px 5px rgb(255, 255, 255); background-color: aliceblue; text-align: center;font-weight: bold;font-size: 15px">
               <div>
                  {{$info->marque}}
               </div>
               <br>
               <div class="icon-text-container">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                     <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                  </svg>
                  <span style="font-weight: bold;">Kilometrage: <span style="font-weight: 300">{{$info->kmDefaut}}Km/H</span></span>
               </div>
               <br>
               <div class="icon-text-container">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                     <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                     <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                     <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                  </svg>
                  <span style="font-weight: bold;">Prix:
                     @if ($info->kmDefaut <= 100 && $info->kmDefaut <= 200)
                        <span style="font-weight: 300">10500 fcfa/jour</span>
                     @elseif($info->kmDefaut <= 300 && $info->kmDefaut <= 500)
                        <span style="font-weight: 300">25000 fcfa/jour</span>
                     @else
                        <span style="font-weight: 300">35000 fcfa/jour</span>
                     @endif
               </span>
               
               </div>
               <br>
               <div class="icon-text-container">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                     <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                  </svg>
                  <span style="font-weight: bold;">Nombre de places: <span style="font-weight: 300">{{$info->nb_place}} place(s) restante(s)</span></span>
               </div>
            </div>
         </button>
         @else
         <button style="margin-left: 50px;" class="shadow p-3 mb-5 bg-body-tertiary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="setVehicleId({{$info->id_vehicule}})">
            <style>
               .icon-text-container {
                  display: flex;
                  align-items: center; /* Pour aligner les éléments verticalement */
               }
   
               .icon-text-container svg {
                  margin-right: 5px; /* Pour ajouter un espace entre l'icône et le texte */
               }
            </style>
            {{-- <img width="200" src="../build/assets/images/vehicules/{{$info->photo}}" alt="vehicule"> --}}
            <img style="width: 400px;height: 300px; box-shadow: 1px 1px 1px 5px rgb(255, 255, 255);" src="../build/assets/images/vehicules/{{$info->photo}}" alt="image">
            <div style="width: 400px; height: 170px;box-shadow: 1px 1px 1px 5px rgb(255, 255, 255); background-color: aliceblue; text-align: center;font-weight: bold;font-size: 15px">
               <div>
                  {{$info->marque}}
               </div>
               <br>
               <div class="icon-text-container">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                     <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                  </svg>
                  <span style="font-weight: bold;">Kilometrage: <span style="font-weight: 300">{{$info->kmDefaut}}Km/H</span></span>
               </div>
               <br>
               <div class="icon-text-container">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                     <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                     <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                     <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                  </svg>
                  <span style="font-weight: bold;">Prix:
                     @if ($info->kmDefaut <= 100 && $info->kmDefaut <= 200)
                        <span style="font-weight: 300">10500 fcfa/jour</span>
                     @elseif($info->kmDefaut <= 300 && $info->kmDefaut <= 500)
                        <span style="font-weight: 300">25000 fcfa/jour</span>
                     @else
                        <span style="font-weight: 300">35000 fcfa/jour</span>
                     @endif
               </span>
               
               </div>
               <br>
               <div class="icon-text-container">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                     <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                  </svg>
                  <span style="font-weight: bold;">Nombre de places: <span style="font-weight: 300">{{$info->nb_place}} place(s) restante(s)</span></span>
               </div>
            </div>
         </button>
         @endif
         
         <!-- Modal -->
         <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel"><strong>Location de vehicule</strong></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form action="{{route('traitement.reservation')}}" enctype="multipart/form-data" method="POST">
                     @csrf
                     <!-- nom_complet_client -->
                     <div>
                        <label for="nom_complet_client">Nom complet</label>
                        <input id="nom_complet_client" class="block mt-1 w-full form-control" type="text" name="nom_complet_client" required autofocus autocomplete="nom_complet_client" />
                     </div>
                     <br>
                     {{-- telephone --}}
                     <div>
                        <label for="telephone">Telephone</label>
                        <input id="telephone" class="block mt-1 w-full form-control" type="number" name="telephone" required autofocus autocomplete="telephone" />
                     </div>
                     <br>
                     {{-- pointDepart --}}
                     <div>
                        <label for="pointDepart">Point de depart</label>
                        <input id="pointDepart" class="block mt-1 w-full form-control" type="text" name="pointDepart" required autofocus autocomplete="pointDepart" />
                     </div>
                     <br>
                     {{-- pointArrivee --}}
                     <div>
                        <label for="pointArrivee">Point d'arrivee</label>
                        <input id="pointArrivee" class="block mt-1 w-full form-control" type="text" name="pointArrivee" required autofocus autocomplete="pointArrivee" />
                     </div>
                     <br>
                        {{-- Date voyage --}}
                        <div>
                           <label for="dateVoyage">Date Voyage</label>
                           <input id="dateVoyage" class="block mt-1 w-full form-control" type="date" name="dateVoyage" required autofocus autocomplete="dateVoyage" />
                        </div>
                     <br>
                     {{-- heureDepart --}}
                     <div>
                        <label for="heureDepart">Heure de depart</label>
                        <input id="heureDepart" class="block mt-1 w-full form-control" type="number" name="heureDepart"  required autofocus autocomplete="heureDepart" />
                  </div>
                  <br>
                  {{-- id_vehicule --}}
                  <div>
                     <input hidden value="{{$info->id_vehicule}}" id="id_vehicule" class="block mt-1 w-full form-control" type="text" name="id_vehicule" required autofocus autocomplete="id_vehicule"/>
                  </div>
                  <br>
                  <button class="btn btn-dark" type="submit">
                     Louer
                  </button>
               </form>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
            </div>
            </div>
         </div>
      @endforeach
      </div>
      <script>
       function setVehicleId(id) {
           document.getElementById('id_vehicule').value = id; // Mettre l'ID dans le champ d'entrée caché
       }
      </script>
   </div>
   @include('layouts.footer');
</body>
</html>
