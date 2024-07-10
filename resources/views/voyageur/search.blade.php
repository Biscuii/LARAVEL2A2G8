<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Rechercher un Bien Immobilier</h1>

        <form method="POST" action="{{ route('voyageur.handleSearch') }}" class="mb-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de début</label>
                    <input type="date" name="date_debut" id="date_debut" value="{{ old('date_debut') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div>
                    <label for="date_fin" class="block text-sm font-medium text-gray-700">Date de fin</label>
                    <input type="date" name="date_fin" id="date_fin" value="{{ old('date_fin') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="col-span-1 md:col-span-2 flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">Rechercher</button>
                </div>

            </div>
        </form>
    </div>
</x-app-layout>
