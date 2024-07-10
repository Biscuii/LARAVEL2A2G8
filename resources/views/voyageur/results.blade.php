<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="flex">
            <!-- Sidebar pour les filtres -->
            <div class="w-1/4 p-4 bg-gray-100 rounded-lg">
                <h1 class="text-2xl font-bold mb-4"><Logements></Logements></h1>
                <!-- Formulaire pour changer les dates de recherche -->
                <form method="GET" action="{{ route('voyageur.results') }}" class="mb-6">
                    <div class="mb-4">
                        <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de début</label>
                        <input type="date" name="date_debut" id="date_debut" value="{{ session('date_debut') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="date_fin" class="block text-sm font-medium text-gray-700">Date de fin</label>
                        <input type="date" name="date_fin" id="date_fin" value="{{ session('date_fin') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rechercher</button>
                    </div>
                </form>

                <!-- Formulaire pour filtrer les résultats -->
                <form method="GET" action="{{ route('voyageur.results') }}">
                    <input type="hidden" name="date_debut" value="{{ session('date_debut') }}">
                    <input type="hidden" name="date_fin" value="{{ session('date_fin') }}">
                    <div class="mb-4">
                        <label for="prix_min" class="block text-sm font-medium text-gray-700">Prix minimum</label>
                        <input type="number" name="prix_min" id="prix_min" value="{{ request('prix_min') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="prix_max" class="block text-sm font-medium text-gray-700">Prix maximum</label>
                        <input type="number" name="prix_max" id="prix_max" value="{{ request('prix_max') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="nombre_de_chambres" class="block text-sm font-medium text-gray-700">Nombre de chambres</label>
                        <input type="number" name="nombre_de_chambres" id="nombre_de_chambres" value="{{ request('nombre_de_chambres') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="nombre_de_salles_de_bain" class="block text-sm font-medium text-gray-700">Nombre de salles de bain</label>
                        <input type="number" name="nombre_de_salles_de_bain" id="nombre_de_salles_de_bain" value="{{ request('nombre_de_salles_de_bain') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="type_de_bien" class="block text-sm font-medium text-gray-700">Type de bien</label>
                        <select name="type_de_bien" id="type_de_bien" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                            <option value="">Tous les types</option>
                            <option value="Appartement" {{ request('type_de_bien') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                            <option value="Maison" {{ request('type_de_bien') == 'Maison' ? 'selected' : '' }}>Maison</option>
                            <option value="Gîte" {{ request('type_de_bien') == 'Gîte' ? 'selected' : '' }}>Gîte</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="nombre_de_lits" class="block text-sm font-medium text-gray-700">Nombre de lits</label>
                        <input type="number" name="nombre_de_lits" id="nombre_de_lits" value="{{ request('nombre_de_lits') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="capacite_max" class="block text-sm font-medium text-gray-700">Capacité maximale</label>
                        <input type="number" name="capacite_max" id="capacite_max" value="{{ request('capacite_max') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="wifi" id="wifi" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ request('wifi') ? 'checked' : '' }}>
                        <label for="wifi" class="ml-2 block text-sm font-medium text-gray-700">WiFi</label>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="parking" id="parking" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ request('parking') ? 'checked' : '' }}>
                        <label for="parking" class="ml-2 block text-sm font-medium text-gray-700">Parking</label>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="climatisation" id="climatisation" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ request('climatisation') ? 'checked' : '' }}>
                        <label for="climatisation" class="ml-2 block text-sm font-medium text-gray-700">Climatisation</label>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="chauffage" id="chauffage" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ request('chauffage') ? 'checked' : '' }}>
                        <label for="chauffage" class="ml-2 block text-sm font-medium text-gray-700">Chauffage</label>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="cuisine" id="cuisine" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ request('cuisine') ? 'checked' : '' }}>
                        <label for="cuisine" class="ml-2 block text-sm font-medium text-gray-700">Cuisine</label>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="animaux_acceptes" id="animaux_acceptes" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ request('animaux_acceptes') ? 'checked' : '' }}>
                        <label for="animaux_acceptes" class="ml-2 block text-sm font-medium text-gray-700">Animaux acceptés</label>
                    </div>
                    <div class="col-span-1 flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filtrer</button>
                    </div>
                </form>
            </div>

            <!-- Résultats -->
            <div class="w-3/4 p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($biens as $bien)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h2 class="text-xl font-semibold">{{ $bien->titre }}</h2>
                        <p>{{ $bien->description }}</p>
                        <p><strong>Prix :</strong> {{ $bien->prix }} €</p>
                        <a href="{{ route('voyageur.show', $bien->id) }}" class="text-indigo-600 hover:text-indigo-900">Voir les détails</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
