<?php

namespace App\Http\Controllers;

use App\Models\BienImmobilier;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VoyageurController extends Controller
{
    public function search()
    {
        return view('voyageur.search');
    }

    public function handleSearch(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        Session::put('date_debut', $request->date_debut);
        Session::put('date_fin', $request->date_fin);

        return redirect()->route('voyageur.results');
    }

    public function results(Request $request)
    {

        if (!Session::has('date_debut') || !Session::has('date_fin')) {
            return redirect()->route('voyageur.search')->with('error', 'Veuillez effectuer une recherche d\'abord.');
        }

        $date_debut = Session::get('date_debut');
        $date_fin = Session::get('date_fin');

        $query = BienImmobilier::query();

        $query->whereDoesntHave('reservations', function ($q) use ($date_debut, $date_fin) {
            $q->whereBetween('date_debut', [$date_debut, $date_fin])
                ->orWhereBetween('date_fin', [$date_debut, $date_fin])
                ->orWhere(function ($query) use ($date_debut, $date_fin) {
                    $query->where('date_debut', '<', $date_debut)
                        ->where('date_fin', '>', $date_fin);
                });
        });

        if ($request->filled('prix_min')) {
            $query->where('prix', '>=', $request->prix_min);
        }

        if ($request->filled('prix_max')) {
            $query->where('prix', '<=', $request->prix_max);
        }

        if ($request->filled('nombre_de_chambres')) {
            $query->where('nombre_de_chambres', '>=', $request->nombre_de_chambres);
        }

        if ($request->filled('nombre_de_salles_de_bain')) {
            $query->where('nombre_de_salles_de_bain', '>=', $request->nombre_de_salles_de_bain);
        }

        if ($request->filled('type_de_bien')) {
            $query->where('type_de_bien', $request->type_de_bien);
        }

        if ($request->filled('nombre_de_lits')) {
            $query->where('nombre_de_lits', '>=', $request->nombre_de_lits);
        }

        if ($request->filled('capacite_max')) {
            $query->where('capacite_max', '>=', $request->capacite_max);
        }

        if ($request->has('wifi')) {
            $query->where('wifi', true);
        }

        if ($request->has('parking')) {
            $query->where('parking', true);
        }

        if ($request->has('climatisation')) {
            $query->where('climatisation', true);
        }

        if ($request->has('chauffage')) {
            $query->where('chauffage', true);
        }

        if ($request->has('cuisine')) {
            $query->where('cuisine', true);
        }

        if ($request->has('animaux_acceptes')) {
            $query->where('animaux_acceptes', true);
        }

        $biens = $query->where('statut', 'Validé')->get();

        return view('voyageur.results', compact('biens', 'request', 'date_debut', 'date_fin'));
    }

    public function show($id)
    {
        $bien = BienImmobilier::findOrFail($id);
        return view('voyageur.show', compact('bien'));
    }

    public function reserve(Request $request, $id)
    {
        $request->validate([
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        $bien = BienImmobilier::findOrFail($id);
        $voyageur = Auth::user()->voyageur;

        $reservation = new Reservation([
            'bien_immobilier_id' => $bien->id,
            'voyageur_id' => $voyageur->id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ]);

        $reservation->save();

        return redirect()->route('voyageur.reservations')->with('success', 'Réservation effectuée avec succès.');
    }

    public function reservations()
    {
        $voyageur = Auth::user()->voyageur;
        $reservations = $voyageur->reservations;

        return view('voyageur.reservations', compact('reservations'));
    }

}
