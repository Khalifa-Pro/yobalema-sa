<x-guest-layout>
   <form method="POST" action="{{ route('conduire.traitement') }}">
       @csrf
       {{-- Chauffeurs --}}
         <div>
            <x-input-label for="id_chauffeur" :value="__('Chauffeur')" />
            <select id="id_chauffeur" class="block mt-1 w-full" name="id_chauffeur" required autofocus autocomplete="id_chauffeur">
               @foreach ($listeC as $chauffeur)
               <option value="{{$chauffeur->id}}" {{ old('id_chauffeur') == $chauffeur->id ? 'selected' : '' }}>{{$chauffeur->firstName}} {{$chauffeur->lastName}}</option>
               @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_chauffeur')" class="mt-2" />
         </div>
         <br>
         {{-- vehicules --}}
         <div>
            <x-input-label for="id_vehicule" :value="__('Véhicule')" />
            <select id="id_vehicule" class="block mt-1 w-full" name="id_vehicule" required autofocus autocomplete="id_vehicule">
               @foreach ($listeV as $vehicule)
               <option value="{{$vehicule->id_vehicule}}" {{ old('id_vehicule') == $vehicule->id_vehicule ? 'selected' : '' }}>{{$vehicule->marque}}</option>                   
               @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_vehicule')" class="mt-2" />
         </div>
         <br>
         <x-primary-button class="ms-0">
               {{ __('Effectuer') }}
         </x-primary-button>
   </form>
</x-guest-layout>
