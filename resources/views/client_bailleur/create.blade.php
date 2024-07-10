<!-- resources/views/client_bailleur/create.blade.php -->

<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-lg font-semibold mb-4">Ajouter un nouveau bien immobilier</h2>

                @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erreur!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
                @endif

                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erreurs!</strong>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('client_bailleur.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
                        <input id="titre" type="text" class="form-input mt-1 block w-full" name="titre" value="{{ old('titre') }}" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" class="form-textarea mt-1 block w-full" name="description" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                        <input id="adresse" type="text" class="form-input mt-1 block w-full" name="adresse" value="{{ old('adresse') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="prix" class="block text-sm font-medium text-gray-700">Prix par nuit (en euros)</label>
                        <input id="prix" type="number" class="form-input mt-1 block w-full" name="prix" value="{{ old('prix') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="nombre_de_chambres" class="block text-sm font-medium text-gray-700">Nombre de chambres</label>
                        <input id="nombre_de_chambres" type="number" class="form-input mt-1 block w-full" name="nombre_de_chambres" value="{{ old('nombre_de_chambres') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="nombre_de_salles_de_bain" class="block text-sm font-medium text-gray-700">Nombre de salles de bain</label>
                        <input id="nombre_de_salles_de_bain" type="number" class="form-input mt-1 block w-full" name="nombre_de_salles_de_bain" value="{{ old('nombre_de_salles_de_bain') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="superficie" class="block text-sm font-medium text-gray-700">Superficie (m²)</label>
                        <input id="superficie" type="number" class="form-input mt-1 block w-full" name="superficie" value="{{ old('superficie') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="type_de_bien" class="block text-sm font-medium text-gray-700">Type de bien</label>
                        <select id="type_de_bien" name="type_de_bien" class="form-select mt-1 block w-full" required>
                            <option value="">Sélectionnez un type de bien</option>
                            <option value="Appartement" {{ old('type_de_bien') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                            <option value="Maison" {{ old('type_de_bien') == 'Maison' ? 'selected' : '' }}>Maison</option>
                            <option value="Gîte" {{ old('type_de_bien') == 'Gîte' ? 'selected' : '' }}>Gîte</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="nombre_de_lits" class="block text-sm font-medium text-gray-700">Nombre de lits</label>
                        <input id="nombre_de_lits" type="number" class="form-input mt-1 block w-full" name="nombre_de_lits" value="{{ old('nombre_de_lits') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="capacite_max" class="block text-sm font-medium text-gray-700">Capacité max</label>
                        <input id="capacite_max" type="number" class="form-input mt-1 block w-full" name="capacite_max" value="{{ old('capacite_max') }}" required>
                    </div>

                    <div class="flex flex-wrap space-x-8 mb-4">
                        <div class="flex items-center">
                            <input type="hidden" name="wifi" value="0">
                            <input id="wifi" type="checkbox" class="form-checkbox" name="wifi" value="1" {{ old('wifi') ? 'checked' : '' }}>
                            <label for="wifi" class="ml-2 block text-sm font-medium text-gray-700">WiFi</label>
                        </div>

                        <div class="flex items-center">
                            <input type="hidden" name="parking" value="0">
                            <input id="parking" type="checkbox" class="form-checkbox" name="parking" value="1" {{ old('parking') ? 'checked' : '' }}>
                            <label for="parking" class="ml-2 block text-sm font-medium text-gray-700">Parking</label>
                        </div>

                        <div class="flex items-center">
                            <input type="hidden" name="climatisation" value="0">
                            <input id="climatisation" type="checkbox" class="form-checkbox" name="climatisation" value="1" {{ old('climatisation') ? 'checked' : '' }}>
                            <label for="climatisation" class="ml-2 block text-sm font-medium text-gray-700">Climatisation</label>
                        </div>

                        <div class="flex items-center">
                            <input type="hidden" name="chauffage" value="0">
                            <input id="chauffage" type="checkbox" class="form-checkbox" name="chauffage" value="1" {{ old('chauffage') ? 'checked' : '' }}>
                            <label for="chauffage" class="ml-2 block text-sm font-medium text-gray-700">Chauffage</label>
                        </div>

                        <div class="flex items-center">
                            <input type="hidden" name="cuisine" value="0">
                            <input id="cuisine" type="checkbox" class="form-checkbox" name="cuisine" value="1" {{ old('cuisine') ? 'checked' : '' }}>
                            <label for="cuisine" class="ml-2 block text-sm font-medium text-gray-700">Cuisine</label>
                        </div>

                        <div class="flex items-center">
                            <input type="hidden" name="animaux_acceptes" value="0">
                            <input id="animaux_acceptes" type="checkbox" class="form-checkbox" name="animaux_acceptes" value="1" {{ old('animaux_acceptes') ? 'checked' : '' }}>
                            <label for="animaux_acceptes" class="ml-2 block text-sm font-medium text-gray-700">Animaux acceptés</label>
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
