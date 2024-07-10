<div class="flex">
    <nav class="flex pr-72">
        <div class="h-screen bg-blue-400 text-black p-5 pt-8 w-72 fixed shadow-lg">
            <div class="mb-8">
                <x-nav-link :href="route('privateView')" class="flex items-center space-x-2 text-lg font-semibold hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    <span>{{ __('Quitter') }}</span>
                </x-nav-link>
            </div>

            <div class="space-y-4">
                <x-nav-link :href="route('adminPanel')" class="flex items-center space-x-2 text-lg font-semibold hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 6h18m-9 6v12"></path></svg>
                    <span>{{ __('Dashboard') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('user.show')" class="flex items-center space-x-2 text-lg font-semibold hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8.966 8.966 0 0112 15c2.225 0 4.295.836 5.879 2.197M9 7a4 4 0 118 0 4 4 0 01-8 0z"></path></svg>
                    <span>{{ __('Gestion des Utilisateurs') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('logementAdmin')" class="flex items-center space-x-2 text-lg text-black font-semibold hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v6a1 1 0 001 1h11l5 5V3H4a1 1 0 00-1 1z"></path></svg>
                    <span>{{ __('Gestion des Biens Immobiliers') }}</span>
                </x-nav-link>
            </div>
        </div>
    </nav>

