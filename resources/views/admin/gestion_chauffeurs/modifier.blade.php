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
<x-guest-layout>
   <form method="POST" action="{{ route('misajour.chauffeur',['id' => $user->id]) }}">
      @csrf
      <label for="firstName" class="form-label">Prénom</label>
      <div class="mb-3">
          <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $user->firstName }}" required autofocus>
      </div>
      <br>
      <label for="lastName" class="form-label">Nom</label>
      <div class="mb-3">
          <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $user->lastName }}" required autofocus>
      </div>
      <br>
      <label for="experience" class="form-label">Expérience</label>
      <div class="mb-3">
          <input type="number" class="form-control" id="experience" name="experience" value="{{ $user->experience }}" required autofocus>
      </div>
      <br>
      <label for="numero_permis" class="form-label">Numéro permis</label>
      <div class="mb-3">
          <input type="text" class="form-control" id="numero_permis" name="numero_permis" value="{{ $user->numero_permis }}" required autofocus>
      </div>
      <br>
      <label for="address" class="form-label">Adresse</label>
      <div class="mb-3">
          <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required autofocus>
      </div>
      <br>
      <label for="telephone" class="form-label">Téléphone</label>
      <div class="mb-3">
          <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $user->telephone }}" required autofocus>
      </div>
      <br>
      <label for="date_emission" class="form-label">Date émission</label>
      <div class="mb-3">
          <input type="text" class="form-control" id="date_emission" name="date_emission" value="{{ $user->date_emission }}" required autofocus>
      </div>
      <br>
      <label for="date_expiration" class="form-label">Date expiration</label>
      <div class="mb-3">
          <input type="text" class="form-control" id="date_expiration" name="date_expiration" value="{{ $user->date_expiration }}" required autofocus>
      </div>
      <br>
      <label for="categorie" class="form-label">Catégorie</label>
      <div class="mb-3">
          <select class="form-select" id="categorie" name="categorie" required autofocus>
              <option value="A" {{ $user->categorie == 'A' ? 'selected' : '' }}>Catégorie A</option>
              <option value="B" {{ $user->categorie == 'B' ? 'selected' : '' }}>Catégorie B</option>
              <option value="C" {{ $user->categorie == 'C' ? 'selected' : '' }}>Catégorie C</option>
          </select>
      </div>
      <br>
      <label for="email" class="form-label">Email</label>
      <div class="mb-3">
          <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required autofocus>
      </div>
      <br>
      <label for="password" class="form-label">Password</label>
      <div class="mb-3">
          <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <br>
      <label for="password_confirmation" class="form-label">Confirm Password</label>
      <div class="mb-3">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
      </div>
      <br>
      <button style="color: white; background-color: black" type="submit" class="btn btn-dark">Modifier</button>
   </form>
   
</x-guest-layout>
