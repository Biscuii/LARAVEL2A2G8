<x-app-layout>
    @include('include.sidebar')
    <div class="p-6 bg-gray-100">
         <?php //var_dump($users); // Ajoutez cette ligne pour voir la structure des données ?>
        <div id="app" class="p-6 bg-gray-100" data-users='json($users)'>
            {{-- <search-component @search="handleSearch"></search-component> --}}
            <h1 class="text-3xl font-semibold mb-6">Utilisateurs</h1>
            <div class="overflow-x-auto">
                <table id="userTable" class="min-w-full bg-white rounded-lg shadow-md">
                    <thead class="bg-gray-200 border-b-2 border-gray-300">
                        <tr class="sort">
                            <th class="text-left p-3 sortable">Nom</th>
                            <th class="text-left p-3 sortable">Prénom</th>
                            <th class="text-left p-3 sortable">Âge</th>
                            <th class="text-left p-3 sortable">Genre</th>
                            <th class="text-left p-3 sortable">Téléphone</th>
                            <th class="text-left p-3 sortable">Pays</th>
                            <th class="text-left p-3 sortable">Note</th>
                            <th class="text-left p-3 sortable">Email</th>
                            <th class="text-left p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                                <td class="p-3">{{ $user->lastname }}</td>
                                <td class="p-3">{{ $user->firstname }}</td>
                                <td class="p-3">{{ $user->age }}</td>
                                <td class="p-3">{{ $user->genre }}</td>
                                <td class="p-3">{{ $user->phone }}</td>
                                <td class="p-3">{{ $user->country }}</td>
                                <td class="p-3">{{ $user->note_eval }}</td>
                                <td class="p-3">{{ $user->email }}</td>
                                <td class="p-3 flex space-x-4">
                                    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="text-blue-500 hover:underline">Modifier</a>
                                    <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="text-red-500 hover:underline">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <a href="{{ route('user.add') }}" class="text-green-500 hover:underline">Ajouter</a>
        </div>
    </div>
    <script src="{{ asset('js/filterForTab.js') }}"></script>
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</x-app-layout>



