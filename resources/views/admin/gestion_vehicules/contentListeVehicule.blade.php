<main style="margin-left: 0px; margin-top: 90px">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="{{route('vehicule.creer')}}">
                <button style="margin-left: 195px" class="btn btn-dark">
                    Ajouter un véhicule
                </button>
            </a>
        </div>
    </div>
    <br>
   <div class="container-fluid px-4">
       <div class="card mb-4">
            <div class="card-header bg-dark">
                <i class="fas fa-table me-1 bg-light"></i>
                <span style="color:aliceblue">Liste des véhicules</span>
            </div>
           <div class="card-body">
               <table id="datatablesSimple">
                   <thead>
                       <tr>
                         <th>Date achat</th>
                         <th>Km par défaut</th>
                         <th>Matricule</th>
                         <th>Marque</th>
                         <th>Statut</th>
                         <th>Poids</th>
                         <th>Photo</th>
                         <th>Nombre de places</th>
                         <th>Actions</th>
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                            <th>Date achat</th>
                            <th>Km par défaut</th>
                            <th>Matricule</th>
                            <th>Marque</th>
                            <th>Statut</th>
                            <th>Poids</th>
                            <th>Photo</th>
                            <th>Nombre de places</th>
                            <th>Actions</th>
                       </tr>
                   </tfoot>
                   <tbody>
                       @foreach ($liste as $vehicule)
                       <tr>
                           <td>{{$vehicule->dateAchat}}</td>
                           <td>{{$vehicule->kmDefaut}}</td>
                           <td>{{$vehicule->matricule}}</td>
                           <td>{{$vehicule->marque}}</td>
                           <td>{{$vehicule->statut}}</td>
                           <td>{{$vehicule->poids}}</td>
                           <td>
                                <img style="border-radius: 5%" width="100" height="100" src="../build/assets/images/vehicules/{{$vehicule->photo}}" alt="vehicule">
                            </td>
                           <td>{{$vehicule->nb_place}}</td>
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