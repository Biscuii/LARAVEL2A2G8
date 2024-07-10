<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\BienImmobilier;
use App\Models\ClientBailleur;
use Illuminate\Http\Request;

class BiensImmobilierAdmin extends Controller
{
    function show(){
        $bienImmo = BienImmobilier::with('clientBailleurOwner')->get();
        $biens = BienImmobilier::all();
        return view('backOffice/administrateur/biensImmobiliers/adminBiensImmo', compact('biens'));
    }

    public function updateStatut(Request $request, $id)
    {
        $bien = BienImmobilier::findOrFail($id);
        $request->validate([
            'statut' => 'required|string|in:En Attente,Validé,Refusé',
        ]);

        $bien->statut = $request->statut;
        $bien->save();

        return redirect()->route('logementAdmin')->with('success', 'Statut du bien immobilier mis à jour avec succès.');
    }

    function create(){
        $biens = BienImmobilier::all();
        //$valideProfile = 0;
        //dd($prestataire);
        return view('backOffice/administrateur/biensImmobiliers/addBiensImmo', compact('biens'));
    }

    public function add(){
        $clientsBailleurs = ClientBailleur::with('utilisateur')->get();

        return view('backOffice.administrateur.biensImmobiliers.addBiensImmo', compact('clientsBailleurs'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'client_bailleur_id' => 'required',
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'nombre_de_chambres' => 'required|integer',
            'nombre_de_salles_de_bain' => 'required|integer',
            'superficie' => 'required|numeric',
            'type_de_bien' => 'required|string|in:Appartement,Maison,Gîte',
            'nombre_de_lits' => 'required|integer',
            'capacite_max' => 'required|integer',
            'wifi' => 'required|boolean',
            'parking' => 'required|boolean',
            'climatisation' => 'required|boolean',
            'chauffage' => 'required|boolean',
            'cuisine' => 'required|boolean',
            'animaux_acceptes' => 'required|boolean',
            'statut' => 'required|integer',
        ]);

        BienImmobilier::create($validated);

        return redirect()->route('logementAdmin')->with('success', 'Bien immobilier ajouté avec succès.');
    }

    public function edit($id){
        $biens = BienImmobilier::findOrFail($id);
        return view('backOffice/administrateur/biensImmobiliers/updateBiensImmo', compact('biens'));
    }

    public function update(Request $request, $id){
        $biens = BienImmobilier::findOrFail($id);
        $biens->update($request->all());
        return view('backOffice.administrateur.biensImmobiliers.adminBiensImmo', compact('biens'));
    }

    public function delete($id){
        $user = BienImmobilier::findOrFail($id);
        $user->delete();
        return redirect()->route('logementAdmin')->with('success','Bien immobilier a été supprimé');
    }
}
