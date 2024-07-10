<x-app-layout>
    <div class="max-w-lg mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-lg font-semibold">{{ $bien->titre }}</h1>
                    <div class="flex space-x-2">
                        <a href="{{ route('client_bailleur.edit', $bien->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Modifier</a>
                        <form action="{{ route('client_bailleur.destroy', $bien->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien immobilier ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 mr-2">
                                Supprimer
                            </button>
                        </form>
                        <a href="{{ route('client_bailleur.index') }}" class="text-gray-600 hover:text-gray-900 mr-2">
                            Retour
                        </a>
                    </div>
                </div>

                <div class="mb-4">
                    <p><strong>Adresse:</strong> {{ $bien->adresse }}</p>
                    <p><strong>Prix par nuit:</strong> {{ $bien->prix }} €</p>
                    <p><strong>Type:</strong> {{ $bien->type_de_bien }}</p>
                    <p><strong>Capacité max:</strong> {{ $bien->capacite_max }}</p>
                    <p><strong>Nombre de chambres:</strong> {{ $bien->nombre_de_chambres }}</p>
                    <p><strong>Nombre de salles de bain:</strong> {{ $bien->nombre_de_salles_de_bain }}</p>
                    <p><strong>Superficie:</strong> {{ $bien->superficie }} m²</p>
                    <p><strong>Description:</strong> {{ $bien->description }}</p>
                    <p><strong>WiFi:</strong> {{ $bien->wifi ? 'Oui' : 'Non' }}</p>
                    <p><strong>Parking:</strong> {{ $bien->parking ? 'Oui' : 'Non' }}</p>
                    <p><strong>Climatisation:</strong> {{ $bien->climatisation ? 'Oui' : 'Non' }}</p>
                    <p><strong>Chauffage:</strong> {{ $bien->chauffage ? 'Oui' : 'Non' }}</p>
                    <p><strong>Cuisine:</strong> {{ $bien->cuisine ? 'Oui' : 'Non' }}</p>
                    <p><strong>Animaux acceptés:</strong> {{ $bien->animaux_acceptes ? 'Oui' : 'Non' }}</p>
                    <p><strong>Statut:</strong> {{ $bien->statut }}</p>
                    @if ($bien->statut == 'Refusé')
                    <p><strong>Message de refus:</strong> {{ $bien->message_refus }}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-medium">Gérer les disponibilités</h3>
                    <div id="calendar"></div>
                </div>

                <div id="calendar-component">
                    <calendar-component :initial-dates="{{ json_encode($bien->datesIndisponibles) }}"></calendar-component>
                </div>

                <form method="POST" action="{{ route('client_bailleur.updateBlockedDates', $bien->id) }}" id="blocked-dates-form">
                    @csrf
                    <input type="hidden" name="blocked_dates" id="blocked-dates-input">
                    <input type="hidden" name="unblocked_dates" id="unblocked-dates-input">

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Appliquer
                    </button>
                </form>



            </div>
        </div>
    </div>
</x-app-layout>
