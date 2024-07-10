<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Mes Réservations</h1>

        <div class="bg-white shadow-md rounded-lg p-4">
            @foreach ($reservations as $reservation)
            <div class="mb-4">
                <h2 class="text-xl font-semibold">{{ $reservation->bienImmobilier->titre }}</h2>
                <p>{{ $reservation->bienImmobilier->description }}</p>
                <p><strong>Adresse :</strong> {{ $reservation->bienImmobilier->adresse }}</p>
                <p><strong>Prix :</strong> {{ $reservation->bienImmobilier->prix }} €</p>
                <p><strong>Type de bien :</strong> {{ $reservation->bienImmobilier->type_de_bien }}</p>
                <p><strong>Nombre de chambres :</strong> {{ $reservation->bienImmobilier->nombre_de_chambres }}</p>
                <p><strong>Nombre de lits :</strong> {{ $reservation->bienImmobilier->nombre_de_lits }}</p>
                <p><strong>Capacité maximale :</strong> {{ $reservation->bienImmobilier->capacite_max }}</p>
                <p><strong>Nombre de salles de bain :</strong> {{ $reservation->bienImmobilier->nombre_de_salles_de_bain }}</p>

                @if($reservation->bienImmobilier->wifi)
                <p><strong>WiFi :</strong> Disponible</p>
                @endif
                @if($reservation->bienImmobilier->parking)
                <p><strong>Parking :</strong> Disponible</p>
                @endif
                @if($reservation->bienImmobilier->climatisation)
                <p><strong>Climatisation :</strong> Disponible</p>
                @endif
                @if($reservation->bienImmobilier->chauffage)
                <p><strong>Chauffage :</strong> Disponible</p>
                @endif
                @if($reservation->bienImmobilier->cuisine)
                <p><strong>Cuisine :</strong> Disponible</p>
                @endif
                @if($reservation->bienImmobilier->animaux_acceptes)
                <p><strong>Animaux acceptés :</strong> Oui</p>
                @endif

                <p><strong>Date de début :</strong> {{ $reservation->date_debut }}</p>
                <p><strong>Date de fin :</strong> {{ $reservation->date_fin }}</p>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
