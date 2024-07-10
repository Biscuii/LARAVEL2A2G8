<x-app-layout>
    @include('include.sidebar')
    <div class="p-6 bg-gray-100">
        <h1 class="text-3xl font-semibold mb-6">Ajouter un Bien Immobilier</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('adminBien.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="client_bailleur_id" class="block text-gray-700 font-bold mb-2">Bailleur:</label>
                    <select name="client_bailleur_id" id="client_bailleur_id" class="w-full p-2 border border-gray-300 rounded" required>
                        @foreach ($clientsBailleurs as $clientBailleur)
                        @if ($clientBailleur->utilisateur)
                        <option value="{{ $clientBailleur->id }}">{{ $clientBailleur->utilisateur->lastname }} {{ $clientBailleur->utilisateur->firstname }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 font-bold mb-2">Titre:</label>
                    <input type="text" name="titre" id="titre" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="adresse" class="block text-gray-700 font-bold mb-2">Adresse:</label>
                    <input type="text" name="adresse" id="adresse" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="prix" class="block text-gray-700 font-bold mb-2">Prix:</label>
                    <input type="number" name="prix" id="prix" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="nombre_de_chambres" class="block text-gray-700 font-bold mb-2">Nombre de Chambres:</label>
                    <input type="number" name="nombre_de_chambres" id="nombre_de_chambres" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="nombre_de_salles_de_bain" class="block text-gray-700 font-bold mb-2">Nombre de Salles de Bain:</label>
                    <input type="number" name="nombre_de_salles_de_bain" id="nombre_de_salles_de_bain" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="superficie" class="block text-gray-700 font-bold mb-2">Superficie (m²):</label>
                    <input type="number" name="superficie" id="superficie" class="w-full p-2 border border-gray-300 rounded" required>
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
                    <label for="nombre_de_lits" class="block text-gray-700 font-bold mb-2">Nombre de Lits:</label>
                    <input type="number" name="nombre_de_lits" id="nombre_de_lits" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="capacite_max" class="block text-gray-700 font-bold mb-2">Capacité Max:</label>
                    <input type="number" name="capacite_max" id="capacite_max" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="wifi" class="block text-gray-700 font-bold mb-2">Wifi:</label>
                    <select name="wifi" id="wifi" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="parking" class="block text-gray-700 font-bold mb-2">Parking:</label>
                    <select name="parking" id="parking" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="climatisation" class="block text-gray-700 font-bold mb-2">Climatisation:</label>
                    <select name="climatisation" id="climatisation" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="chauffage" class="block text-gray-700 font-bold mb-2">Chauffage:</label>
                    <select name="chauffage" id="chauffage" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="cuisine" class="block text-gray-700 font-bold mb-2">Cuisine:</label>
                    <select name="cuisine" id="cuisine" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="animaux_acceptes" class="block text-gray-700 font-bold mb-2">Animaux Acceptés:</label>
                    <select name="animaux_acceptes" id="animaux_acceptes" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="statut" class="block text-gray-700 font-bold mb-2">Statut:</label>
                    <select name="statut" id="statut" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="0">En Attente</option>
                        <option value="1">Accepté</option>
                        <option value="2">Refusé</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
