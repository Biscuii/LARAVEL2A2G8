<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-lg font-semibold">Liste des biens immobiliers</h1>
                    <button onclick="window.location='{{ route('client_bailleur.create') }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter
                    </button>
                </div>

                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Succès!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Adresse</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Prix/Nuit</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Capacité Max</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($biens as $bien)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-200">{{ $bien->titre }}</td>
                        <td class="px-6 py-4 border-b border-gray-200">{{ $bien->adresse }}</td>
                        <td class="px-6 py-4 border-b border-gray-200">{{ $bien->prix }} €</td>
                        <td class="px-6 py-4 border-b border-gray-200">{{ $bien->type_de_bien }}</td>
                        <td class="px-6 py-4 border-b border-gray-200">{{ $bien->capacite_max }}</td>
                        <td class="px-6 py-4 border-b border-gray-200">{{ $bien->statut }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('client_bailleur.show', $bien->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Voir</a>
                            <a href="{{ route('client_bailleur.edit', $bien->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Modifier</a>
                            <form action="{{ route('client_bailleur.destroy', $bien->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien immobilier ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
