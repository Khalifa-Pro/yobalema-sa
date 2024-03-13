<main style="margin-left: 0px; margin-top: 90px">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="{{route('chauffeur.creer')}}">
                <button style="margin-left: 195px" class="btn btn-dark">
                    Ajouter un chauffeur
                </button>
            </a>
        </div>
    </div>
    <br>
   <div class="container-fluid px-4">
       <div class="card mb-4">
           <div class="card-header bg-dark">
               <i class="fas fa-table me-1 bg-light"></i>
               <span style="color:aliceblue">Liste des chauffeurs</span>
           </div>
           <div class="card-body">
               <table id="datatablesSimple">
                   <thead>
                       <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Expérience</th>
                        <th>N° permis </th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Date émission</th>
                        <th>Date expiration</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                           <th>Prénom</th>
                           <th>Nom</th>
                           <th>Expérience</th>
                           <th>N° permis </th>
                           <th>Adresse</th>
                           <th>Téléphone</th>
                           <th>Date émission</th>
                           <th>Date expiration</th>
                           <th>Catégorie</th>
                           <th>Actions</th>
                       </tr>
                   </tfoot>
                   <tbody>
                       @foreach ($liste as $chauffeur)
                       <tr>
                           <td> {{ $chauffeur->firstName}} </td>
                           <td> {{ $chauffeur->lastName}} </td>
                           <td> {{ $chauffeur->experience}} </td>
                           <td> {{ $chauffeur->numero_permis}} </td>
                           <td> {{ $chauffeur->address}} </td>
                           <td> {{ $chauffeur->telephone}} </td>
                           <td> {{ $chauffeur->date_emission}} </td>
                           <td> {{ $chauffeur->date_expiration}} </td>
                           <td> {{ $chauffeur->categorie}} </td>
                           <td>
                               {{-- <a style="text-decoration: none" href="{{ route('modifier.candidat',['id' => $candidat->id_candidat])}}"> --}}
                               <a style="text-decoration: none" href="#">
                                   <button class="btn btn-outline-info"><i style="width: 10px;height: 10px;" class="fas fa-edit"></i></button>
                               </a>
                               {{-- <a style="text-decoration: none" href="{{ route('supprimer.candidat',['id' => $candidat->id_candidat])}}"> --}}
                               <a style="text-decoration: none" href="#">
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