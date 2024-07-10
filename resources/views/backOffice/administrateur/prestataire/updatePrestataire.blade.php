<x-app-layout>
    @include('include.sidebar')
    <div class="flex justify-center items-start min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-6 text-center">Modifier un Prestataire</h1>
            <form action="{{ route('prestataires.update', $prestataire->id_prestataire) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
                        <input type="text" name="description" id="description" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('description', $prestataire->description) }}">
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="domaine" class="block text-gray-700 font-bold mb-2">Domaine :</label>
                        <input type="text" name="domaine" id="domaine" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('domaine', $prestataire->domaine) }}">
                        @error('domaine')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="valide_profile" class="block text-gray-700 font-bold mb-2">Profil Validé :</label>
                        <select name="valide_profile" id="valide_profile" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="0" {{ old('valide_profile', $prestataire->valide_profile) == 0 ? 'selected' : '' }}>En attente</option>
                            <option value="1" {{ old('valide_profile', $prestataire->valide_profile) == 1 ? 'selected' : '' }}>Acceptée</option>
                            <option value="2" {{ old('valide_profile', $prestataire->valide_profile) == 2 ? 'selected' : '' }}>Refusée</option>
                        </select>
                        @error('valide_profile')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-bold mb-2">Adresse :</label>
                        <input type="text" name="address" id="address" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('address', $prestataire->address) }}">
                        @error('address')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block text-gray-700 font-bold mb-2">Ville :</label>
                        <input type="text" name="city" id="city" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('city', $prestataire->city) }}">
                        @error('city')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="postal_code" class="block text-gray-700 font-bold mb-2">Code Postal :</label>
                        <input type="text" name="postal_code" id="postal_code" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('postal_code', $prestataire->postal_code) }}">
                        @error('postal_code')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="country" class="block text-gray-700 font-bold mb-2">Pays :</label>
                        <input type="text" name="country" id="country" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('country', $prestataire->country) }}">
                        @error('country')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="experience_years" class="block text-gray-700 font-bold mb-2">Années d'Expérience :</label>
                        <input type="number" name="experience_years" id="experience_years" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('experience_years', $prestataire->experience_years) }}">
                        @error('experience_years')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="certifications" class="block text-gray-700 font-bold mb-2">Certifications :</label>
                        <input type="text" name="certifications" id="certifications" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('certifications', $prestataire->certifications) }}">
                        @error('certifications')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="specialties" class="block text-gray-700 font-bold mb-2">Spécialités :</label>
                        <input type="text" name="specialties" id="specialties" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('specialties', $prestataire->specialties) }}">
                        @error('specialties')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="hourly_rate" class="block text-gray-700 font-bold mb-2">Taux Horaire (€) :</label>
                        <input type="number" step="0.01" name="hourly_rate" id="hourly_rate" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('hourly_rate', $prestataire->hourly_rate) }}">
                        @error('hourly_rate')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="availability" class="block text-gray-700 font-bold mb-2">Disponibilité :</label>
                        <input type="checkbox" name="availability" id="availability" class="shadow appearance-none border rounded w-6 h-6 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="1" {{ old('availability', $prestataire->availability) ? 'checked' : '' }}>
                        @error('availability')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="rating" class="block text-gray-700 font-bold mb-2">Évaluation :</label>
                        <input type="number" step="0.01" name="rating" id="rating" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('rating', $prestataire->rating) }}">
                        @error('rating')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="reviews" class="block text-gray-700 font-bold mb-2">Avis :</label>
                        <input type="number" name="reviews" id="reviews" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('reviews', $prestataire->reviews) }}">
                        @error('reviews')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 font-bold mb-2">Utilisateur :</label>
                        <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $prestataire->user_id) == $user->id ? 'selected' : '' }}>{{ $user->firstname }} {{ $user->lastname }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div> --}}
                </div>
                <div class="flex items-center justify-center mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline">Mettre à jour</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50" onclick="history.go(-1)">Retourner en arrière</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
