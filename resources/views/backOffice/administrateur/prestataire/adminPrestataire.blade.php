<x-app-layout>
    @include('include.sidebar')
    <div class="p-6 bg-gray-100">
        <h1 class="text-3xl font-semibold mb-6">Prestataires</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-gray-200 border-b-2 border-gray-300">
                    <tr>
                        <th class="text-left p-3">Utilisateur</th>
                        <th class="text-left p-3">Description</th>
                        <th class="text-left p-3">Domaine</th>
                        <th class="text-left p-3">Profil Validé</th>
                        <th class="text-left p-3">Adresse</th>
                        <th class="text-left p-3">Ville</th>
                        <th class="text-left p-3">Code Postal</th>
                        <th class="text-left p-3">Pays</th>
                        <th class="text-left p-3">Années d'Expérience</th>
                        <th class="text-left p-3">Certifications</th>
                        <th class="text-left p-3">Spécialités</th>
                        <th class="text-left p-3">Taux Horaire</th>
                        <th class="text-left p-3">Disponibilité</th>
                        <th class="text-left p-3">Évaluation</th>
                        <th class="text-left p-3">Avis</th>
                        <th class="text-left p-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($prestataires as $prestataire)
                        <tr>
                            <td class="p-3">{{ $prestataire->user ? $prestataire->user->lastname . ' ' . $prestataire->user->firstname : 'N/A' }}</td>
                            <td class="p-3">{{ $prestataire->description }}</td>
                            <td class="p-3">{{ $prestataire->domaine }}</td>
                            <td class="p-3">
                                @switch($prestataire->valide_profile)
                                    @case(0)En attente @break
                                    @case(1)Accepté @break
                                    @case(2)Refusé @break
                                    @default Inconnu
                                @endswitch
                            </td>
                            <td class="p-3">{{ $prestataire->address ?? 'N/A' }}</td>
                            <td class="p-3">{{ $prestataire->city ?? 'N/A' }}</td>
                            <td class="p-3">{{ $prestataire->postal_code ?? 'N/A' }}</td>
                            <td class="p-3">{{ $prestataire->country }}</td>
                            <td class="p-3">{{ $prestataire->experience_years ?? 'N/A' }}</td>
                            <td class="p-3">{{ $prestataire->certifications ?? 'N/A' }}</td>
                            <td class="p-3">{{ $prestataire->specialties ?? 'N/A' }}</td>
                            <td class="p-3">{{ $prestataire->hourly_rate ? $prestataire->hourly_rate . ' €' : 'N/A' }}</td>
                            <td class="p-3">{{ $prestataire->availability ? 'Oui' : 'Non' }}</td>
                            <td class="p-3">{{ $prestataire->rating ?? 'N/A' }}</td>
                            <td class="p-3">{{ $prestataire->reviews }}</td>
                            <td class="p-3 flex space-x-4">
                                <a href="{{ route('prestataires.edit', ['id' => $prestataire->id_prestataire]) }}" class="text-blue-500 hover:underline">Modifier</a>
                                <a href="{{ route('prestataires.delete', ['id' => $prestataire->id_prestataire]) }}" class="text-red-500 hover:underline">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <a href="{{ route('prestataires.create') }}" class="text-green-500 hover:underline">Ajouter</a>
    </div>
</x-app-layout>
