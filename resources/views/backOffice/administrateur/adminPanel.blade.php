<x-app-layout>
    @include('include.sidebar')

    <div class="py-8 px-6 bg-gray-100 min-h-screen">
        <h1 class="text-3xl font-bold text-blue-600 mb-6">Dashboard - Panel Admin</h1>

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Statistiques Utilisateurs</h2>
            <div class="flex items-center">
                <span class="text-gray-500 text-lg mr-2">Nombre total d'utilisateurs :</span>
                <span class="text-blue-600 text-lg font-semibold">{{ $result }}</span>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Statistiques Biens Immobiliers</h2>
            <div class="flex items-center">
                <span class="text-gray-500 text-lg mr-2">Nombre actif de biens immmobiliers :</span>
                <span class="text-green-600 text-lg font-semibold">{{ $activeBienImmo }}</span>
            </div>
        </div>
    </div>


</x-app-layout>
