<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

         <!-- firstName -->
         <div>
            <x-input-label for="firstName" :value="__('Prenom')" />
            <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="firstName" />
            <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
        </div>
        <br>
        {{-- lastName --}}
        <div>
            <x-input-label for="lastName" :value="__('Nom')" />
            <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>
        <br>
        {{-- experience --}}
        <div>
            <x-input-label for="experience" :value="__('Experience')" />
            <x-text-input id="experience" class="block mt-1 w-full" type="text" name="experience" :value="old('experience')" required autofocus autocomplete="experience" />
            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
        </div>
        <br>
        {{-- numero permi --}}
        <div>
            <x-input-label for="numero_permis" :value="__('Numero permis')" />
            <x-text-input id="numero_permis" class="block mt-1 w-full" type="text" name="numero_permis" :value="old('numero_permis')" required autofocus autocomplete="numero_permis" />
            <x-input-error :messages="$errors->get('numero_permis')" class="mt-2" />
        </div>
        <br>
        {{-- address --}}
        <div>
            <x-input-label for="address" :value="__('Adresse')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <br>
        {{-- telephone --}}
        <div>
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autofocus autocomplete="telephone" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>
        <br>
         {{-- date emission --}}
         <div>
            <x-input-label for="date_emission" :value="__('Date emission')" />
            <x-text-input id="date_emission" class="block mt-1 w-full" type="text" name="date_emission" :value="old('date_emission')" required autofocus autocomplete="date_emission" />
            <x-input-error :messages="$errors->get('date_emission')" class="mt-2" />
        </div>
        <br>
        {{-- date expiration --}}
        <div>
            <x-input-label for="date_expiration" :value="__('Date expiration')" />
            <x-text-input id="date_expiration" class="block mt-1 w-full" type="text" name="date_expiration" :value="old('date_expiration')" required autofocus autocomplete="date_expiration" />
            <x-input-error :messages="$errors->get('date_expiration')" class="mt-2" />
        </div>
        <br>
        {{-- categorie --}}
        <div>
            <x-input-label for="categorie" :value="__('Catégorie')" />
            <select id="categorie" class="block mt-1 w-full" name="categorie" required autofocus autocomplete="categorie">
                <option value="A" {{ old('categorie') == 'A' ? 'selected' : '' }}>Catégorie A</option>
                <option value="B" {{ old('categorie') == 'B' ? 'selected' : '' }}>Catégorie B</option>
                <option value="C" {{ old('categorie') == 'C' ? 'selected' : '' }}>Catégorie C</option>
            </select>
            <x-input-error :messages="$errors->get('categorie')" class="mt-2" />
        </div>

        <br>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <br>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
