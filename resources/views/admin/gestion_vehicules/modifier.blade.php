<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<x-guest-layout>
   <form action="{{route('misajour.vehicule',['id' => $vehicule->id_vehicule])}}" enctype="multipart/form-data" method="POST">
      @csrf
       <!-- marque -->
       <div>
          <label for="marque">Marque</label>
          <input value="{{$vehicule->marque}}" id="marque" class="block mt-1 w-full form-control" type="text" name="marque" required autofocus autocomplete="marque" />
      </div>
      <br>
      {{-- dateAchat --}}
      <div>
          <label for="dateAchat">Date d'achat</label>
          <input value="{{$vehicule->dateAchat}}" id="dateAchat" class="block mt-1 w-full form-control" type="number" name="dateAchat" required autofocus autocomplete="dateAchat" />
      </div>
      <br>
      {{-- KmDefaut --}}
      <div>
          <label for="KmDefaut">Km par défaut</label>
          <input value="{{$vehicule->kmDefaut}}" id="kmDefaut" class="block mt-1 w-full form-control" type="number" name="kmDefaut" required autofocus autocomplete="kmDefaut" />
      </div>
      <br>
      {{-- matricule --}}
      <div>
          <label for="matricule">Matricule</label>
          <input value="{{$vehicule->matricule}}" id="matricule" class="block mt-1 w-full form-control" type="text" name="matricule" required autofocus autocomplete="matricule" />
      </div>
      <br>
      {{-- photo --}}
      <div>
         <label for="photo">Photo</label>
         <input value="{{$vehicule->photo}}" id="photo" class="block mt-1 w-full form-control" type="file" name="photo"  required autofocus autocomplete="photo" />
     </div>
     <br>
      {{-- poids --}}
      <div>
          <label for="poids">Poids</label>
          <select id="poids" class="block mt-1 w-full form-control" name="poids" required autofocus autocomplete="poids">
              <option value="A" {{ $vehicule->poids == 'A' ? 'selected' : '' }}>Leger</option>
              <option value="B" {{ $vehicule->poids == 'B' ? 'selected' : '' }}>Lourd B</option>
              <option value="C" {{ $vehicule->poids == 'C' ? 'selected' : '' }}>Lourd C</option>
          </select>
      </div>
      <br>
      <div>
         <label for="statut">Statut</label>
         <select id="statut" class="block mt-1 w-full form-control" name="statut" required autofocus autocomplete="statut">
             <option value="neuf" {{ $vehicule->statut == 'neuf' ? 'selected' : '' }}>Neuf</option>
             <option value="ancien" {{ $vehicule->statut == 'ancien' ? 'selected' : '' }}>Ancien</option>
         </select>
     </div>
     <br>
     {{-- nb_place --}}
     <div>
        <label for="nb_place">Nombre de places</label>
        <input value="{{$vehicule->nb_place}}" id="nb_place" class="block mt-1 w-full form-control" type="text" name="nb_place" required autofocus autocomplete="nb_place"/>
    </div>
    <br>
     <div>
        <x-primary-button class="ms-4">
            {{ __('Ajouter') }}
        </x-primary-button>
      </div>
  </form>
</x-guest-layout>
