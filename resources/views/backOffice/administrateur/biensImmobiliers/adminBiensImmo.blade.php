<x-app-layout>
    @include('include.sidebar')
    <div class="p-6 bg-gray-100">
        <h1 class="text-3xl font-semibold mb-6">Gestion des Biens Immobiliers</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('adminBien.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</a>
        </div>

        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Succès!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-gray-200 border-b-2 border-gray-300">
                    <tr>
                        <th class="text-left p-3">Titre</th>
                        <th class="text-left p-3">Type</th>
                        <th class="text-left p-3">Prix</th>
                        <th class="text-left p-3">Adresse</th>
                        <th class="text-left p-3">Bailleur</th>
                        <th class="text-left p-3">Statut</th>
                        <th class="text-left p-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($biens as $bien)
                        <tr>
                            <td class="p-3">{{ $bien->titre }}</td>
                            <td class="p-3">{{ $bien->type_de_bien }}</td>
                            <td class="p-3">{{ $bien->prix }}</td>
                            <td class="p-3">{{ $bien->adresse }}</td>
                            <td class="p-3">{{ $bien->clientBailleurOwner->name }}</td>
                            <td class="p-3">{{ $bien->statut }}</td>
                            <td class="p-3 flex space-x-4">
                                <a href="{{ route('adminBien.edit', $bien->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Modifier</a>
                                <form action="{{ route('adminBien.delete', $bien->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                                </form>
                                <form action="{{ route('adminBien.updateStatut', $bien->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="statut" value="Validé">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Accepter</button>
                                </form>
                                <form action="{{ route('adminBien.updateStatut', $bien->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="statut" value="Refusé">
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Refuser</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
