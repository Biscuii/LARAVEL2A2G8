<?php

namespace App\Http\Controllers;

use App\Models\DateIndisponible;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;
use App\Models\BienImmobilier;
use App\Models\ClientBailleur;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientBailleurController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $bailleur = $user->clientBailleur;

        $biens = $bailleur->biensImmobiliers;

        return view('client_bailleur.index', compact('biens'));

    }

    public function create()
    {
        return view('client_bailleur.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric|min:1',
            'nombre_de_chambres' => 'required|integer|min:0',
            'nombre_de_salles_de_bain' => 'required|integer|min:0',
            'superficie' => 'required|integer|min:0',
            'type_de_bien' => 'required|string|in:Appartement,Maison,Gîte',
            'nombre_de_lits' => 'required|integer|min:0',
            'capacite_max' => 'required|integer|min:1',
            'wifi' => 'required|boolean',
            'parking' => 'required|boolean',
            'climatisation' => 'required|boolean',
            'chauffage' => 'required|boolean',
            'cuisine' => 'required|boolean',
            'animaux_acceptes' => 'required|boolean'
        ], [
            'required' => 'Le champ :attribute est obligatoire.',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
            'max' => 'Le champ :attribute ne doit pas dépasser :max caractères.',
            'numeric' => 'Le champ :attribute doit être un nombre.',
            'integer' => 'Le champ :attribute doit être un entier.',
            'min' => 'Le champ :attribute doit être au moins de :min.',
            'boolean' => 'Le champ :attribute doit être vrai ou faux.',
            'in' => 'Le champ :attribute doit être l\'un des suivants : :values.',
        ], [
            'nombre_de_chambres' => 'nombre de chambres',
            'nombre_de_salles_de_bain' => 'nombre de salles de bain',
            'type_de_bien' => 'type de bien',
            'nombre_de_lits' => 'nombre de lits',
            'capacite_max' => 'capacité max',
            'wifi' => 'WiFi',
            'animaux_acceptes' => 'animaux acceptés',
        ]);

        try {
            $user = auth()->user();
            $clientBailleur = $user->clientBailleur;

            $bienImmobilier = BienImmobilier::create([
                'titre' => $validated['titre'],
                'description' => $validated['description'],
                'adresse' => $validated['adresse'],
                'prix' => $validated['prix'],
                'nombre_de_chambres' => $validated['nombre_de_chambres'],
                'nombre_de_salles_de_bain' => $validated['nombre_de_salles_de_bain'],
                'superficie' => $validated['superficie'],
                'type_de_bien' => $validated['type_de_bien'],
                'nombre_de_lits' => $validated['nombre_de_lits'],
                'capacite_max' => $validated['capacite_max'],
                'wifi' => $validated['wifi'],
                'parking' => $validated['parking'],
                'climatisation' => $validated['climatisation'],
                'chauffage' => $validated['chauffage'],
                'cuisine' => $validated['cuisine'],
                'animaux_acceptes' => $validated['animaux_acceptes'],
                'statut' => '0',
                'client_bailleur_id' => $clientBailleur->id
            ]);

            return redirect()->route('client_bailleur.index')
                ->with('success', 'Le bien immobilier "' . $bienImmobilier->titre . '" a été ajouté  avec succès.');
        }catch (\Exception $e) {
            Log::error('Erreur lors de l\'ajout du bien immobilier: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'ajout du bien immobilier "' . $bienImmobilier->titre . '".');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric|min:1',
            'nombre_de_chambres' => 'required|integer|min:0',
            'nombre_de_salles_de_bain' => 'required|integer|min:0',
            'superficie' => 'required|integer|min:0',
            'type_de_bien' => 'required|string|in:Appartement,Maison,Gîte',
            'nombre_de_lits' => 'required|integer|min:0',
            'capacite_max' => 'required|integer|min:1',
            'wifi' => 'required|boolean',
            'parking' => 'required|boolean',
            'climatisation' => 'required|boolean',
            'chauffage' => 'required|boolean',
            'cuisine' => 'required|boolean',
            'animaux_acceptes' => 'required|boolean'
        ], [
            'required' => 'Le champ :attribute est obligatoire.',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
            'max' => 'Le champ :attribute ne doit pas dépasser :max caractères.',
            'numeric' => 'Le champ :attribute doit être un nombre.',
            'integer' => 'Le champ :attribute doit être un entier.',
            'min' => 'Le champ :attribute doit être au moins de :min.',
            'boolean' => 'Le champ :attribute doit être vrai ou faux.',
            'in' => 'Le champ :attribute doit être l\'un des suivants : :values.',
        ], [
            'titre' => 'titre',
            'description' => 'description',
            'adresse' => 'adresse',
            'prix' => 'prix',
            'nombre_de_chambres' => 'nombre de chambres',
            'nombre_de_salles_de_bain' => 'nombre de salles de bain',
            'superficie' => 'superficie',
            'type_de_bien' => 'type de bien',
            'nombre_de_lits' => 'nombre de lits',
            'capacite_max' => 'capacité max',
            'wifi' => 'WiFi',
            'parking' => 'parking',
            'climatisation' => 'climatisation',
            'chauffage' => 'chauffage',
            'cuisine' => 'cuisine',
            'animaux_acceptes' => 'animaux acceptés',
        ]);

        try {
            $bienImmobilier = BienImmobilier::findOrFail($id);
            $bienImmobilier->update(array_merge($validated, ['status' => 'En Attente']));

            return redirect()->route('client_bailleur.index')
                ->with('success', 'Le bien immobilier "' . $bienImmobilier->titre . '" a été mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de la mise à jour du bien immobilier "' . $bienImmobilier->titre . '".');
        }
    }

    public function destroy($id)
    {
        $bienImmobilier = BienImmobilier::findOrFail($id);
        $bienImmobilier->delete();
        return redirect()->route('client_bailleur.index')
            ->with('success', 'Le bien immobilier "' . $bienImmobilier->titre . '" a été supprimé avec succès.');
    }

    public function show($id)
    {
        $bien = BienImmobilier::with('datesIndisponibles')->findOrFail($id);
        return view('client_bailleur.show', compact('bien'));
    }

    public function edit($id)
    {
        $bienImmobilier = BienImmobilier::findOrFail($id);
        return view('client_bailleur.edit', compact('bienImmobilier'));
    }

    public function addUnavailableDate(Request $request, $id)
    {
        $validated = $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ], [
            'date_debut.required' => 'La date de début est obligatoire.',
            'date_debut.date' => 'La date de début doit être une date valide.',
            'date_fin.required' => 'La date de fin est obligatoire.',
            'date_fin.date' => 'La date de fin doit être une date valide.',
            'date_fin.after_or_equal' => 'La date de fin doit être après ou égale à la date de début.',
        ]);

        try {
            $bienImmobilier = BienImmobilier::findOrFail($id);
            DateIndisponible::create([
                'bien_immobilier_id' => $bienImmobilier->id,
                'date_debut' => $validated['date_debut'],
                'date_fin' => $validated['date_fin'],
            ]);

            return redirect()->route('client_bailleur.show', $bienImmobilier->id)
                ->with('success', 'La disponibilité a été ajoutée avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'ajout de la disponibilité: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'ajout de la disponibilité.');
        }
    }

    public function removeBlockedDate($id)
    {
        try {
            $blockedDate = DateIndisponible::findOrFail($id);
            $blockedDate->delete();

            return redirect()->back()
                ->with('success', 'La disponibilité a été supprimée avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de la disponibilité: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de la suppression de la disponibilité.');
        }

    }

    public function updateBlockedDates(Request $request, $id)
    {
        $validated = $request->validate([
            'blocked_dates' => 'required|json',
            'unblocked_dates' => 'required|json',
        ]);

        $blockedDates = json_decode($validated['blocked_dates'], true);
        $unblockedDates = json_decode($validated['unblocked_dates'], true);

        try {
            $bienImmobilier = BienImmobilier::findOrFail($id);


            foreach ($blockedDates as $date) {
                $existingBlockedDate = BlockedDate::where('bien_immobilier_id', $bienImmobilier->id)
                    ->where('date_fin', date('Y-m-d', strtotime($date['date_debut'] . ' -1 day')))
                    ->first();

                if ($existingBlockedDate) {
                    $existingBlockedDate->date_fin = $date['date_fin'];
                    $existingBlockedDate->save();
                } else {
                    BlockedDate::create([
                        'bien_immobilier_id' => $bienImmobilier->id,
                        'date_debut' => $date['date_debut'],
                        'date_fin' => $date['date_fin'],
                    ]);
                }
            }

            foreach ($unblockedDates as $date) {
                $blockedDate = DateIndisponible::where('bien_immobilier_id', $bienImmobilier->id)
                    ->where('date_debut', '<=', $date['date_debut'])
                    ->where('date_fin', '>=', $date['date_fin'])
                    ->first();

                if ($blockedDate) {
                    if ($blockedDate->date_debut == $date['date_debut'] && $blockedDate->date_fin == $date['date_fin']) {
                        $blockedDate->delete();
                    } elseif ($blockedDate->date_debut == $date['date_debut']) {
                        $blockedDate->date_debut = date('Y-m-d', strtotime($date['date_fin'] . ' +1 day'));
                        $blockedDate->save();
                    } elseif ($blockedDate->date_fin == $date['date_fin']) {
                        $blockedDate->date_fin = date('Y-m-d', strtotime($date['date_debut'] . ' -1 day'));
                        $blockedDate->save();
                    } else {
                        DateIndisponible::create([
                            'bien_immobilier_id' => $bienImmobilier->id,
                            'date_debut' => $blockedDate->date_debut,
                            'date_fin' => date('Y-m-d', strtotime($date['date_debut'] . ' -1 day')),
                        ]);

                        $blockedDate->date_debut = date('Y-m-d', strtotime($date['date_fin'] . ' +1 day'));
                        $blockedDate->save();
                    }
                }
            }

            return redirect()->route('client_bailleur.show', $bienImmobilier->id)
                ->with('success', 'Les disponibilités ont été mises à jour avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour des disponibilités: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de la mise à jour des disponibilités.');
        }
    }


    public function futureReservations()
    {

        $user = Auth::user();

        $biensAvecReservations = $user->clientBailleur->biensImmobilier->load(['reservations' => function ($query) {
            $query->whereDate('date_fin', '>', now())->with(['voyageur.utilisateur' => function ($query) {
                $query->select('id', 'name', 'email');
            }]);
        }]);

        $reservationsFutures = collect();

        foreach ($biensAvecReservations as $bien) {
            $reservationsFutures = $reservationsFutures->merge($bien->reservations);
        }

        $reservationsFutures = $reservationsFutures->sortBy('date_debut');


        return view('client_bailleur.future_reservations', ['reservations' => $reservationsFutures]);
    }

    public function pastReservations()
    {

        $user = Auth::user();

        $biensAvecReservations = $user->clientBailleur->biensImmobilier->load(['reservations' => function ($query) {
            $query->whereDate('date_fin', '<', now())->with(['voyageur.utilisateur' => function ($query) {
                $query->select('id', 'name', 'email');
            }]);
        }]);

        $reservationsPassees = collect();


        foreach ($biensAvecReservations as $bien) {
            $reservationsPassees = $reservationsPassees->merge($bien->reservations);
        }


        $reservationsPassees = $reservationsPassees->sortByDesc('date_fin');

        return view('client_bailleur.past_reservations', ['reservations' => $reservationsPassees]);
    }

}
