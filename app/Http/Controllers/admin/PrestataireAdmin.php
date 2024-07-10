<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Prestataire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Psy\VarDumper\Presenter;

class PrestataireAdmin extends Controller
{
    function show(){
        //$user = auth()->user();
        //$user = User::all();
        $prestataires = Prestataire::with('user')->get();
        //dd($prestataires);

        return view('backOffice/administrateur/prestataire/adminPrestataire', compact('prestataires'));
    }

    function create(){
        $users = User::all();
        $valideProfile = 0;
        //dd($prestataire);
        return view('backOffice/administrateur/prestataire/addPrestataire', compact('users', 'valideProfile'));
    }

    function edit($id){
        $prestataire = Prestataire::findOrFail($id);
        //dd($prestataire);
        return view('backOffice/administrateur/prestataire/updatePrestataire', compact('prestataire'));
    }

    function store(Request $request){
        // Valider les données du formulaire
        $request->validate([
            'description' => 'required|string|max:255',
            'domaine' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'valide_profile' => 'required|integer|in:0,1,2',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'required|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'certifications' => 'nullable|string|max:255',
            'specialties' => 'nullable|string|max:255',
            //'hourly_rate' => 'nullable|numeric|min:0',
            'availability' => 'boolean',
            // 'rating' => 'nullable|numeric|min:0|max:5',
            // 'reviews' => 'nullable|integer|min:0',

        ]);



        // Créer un nouveau prestataire
        Prestataire::create([
            'description' => $request->description,
            'domaine' => $request->domaine,
            'valide_profile' => $request->valide_profile,
            'user_id' => $request->user_id,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code'=> $request->postal_code,
            'country'=> $request->country,
            'experience_years'=> $request->experience_years,
            'certifications'=> $request->certifications,
            'specialties'=> $request->specialities,
            'availability'=> $request->availability,
        ]);

        // Rediriger vers la liste des prestataires avec un message de succès
        return redirect()->route('prestataireAdmin')->with('success', 'Prestataire ajouté avec succès.');
    }

    function update(Request $request, $id){
        $prestataires = Prestataire::findOrFail($id);

        //Valider les données du formulaire
        // $request->validate([
        //     'description' => 'required|string|max:255',
        //     'domaine' => 'required|string|max:255',
        //     'user_id' => 'required|exists:users,id',
        //     'valide_profile' => 'required|boolean',
        //     'address' => 'nullable|string|max:255',
        //     'city' => 'nullable|string|max:255',
        //     'postal_code' => 'nullable|string|max:20',
        //     'country' => 'required|string|max:255',
        //     'experience_years' => 'nullable|integer|min:0',
        //     'certifications' => 'nullable|string|max:255',
        //     'specialties' => 'nullable|string|max:255',
        //     'hourly_rate' => 'nullable|numeric|min:0',
        //     'availability' => 'required|boolean',
        //     'rating' => 'nullable|numeric|min:0|max:5',
        //     'reviews' => 'nullable|integer|min:0',
        // ]);


        $prestataires->update($request->all());
        //dd($prestataires);

        return redirect()->route('prestataireAdmin')->with('success', 'Prestataire mis à jour avec succès.');
    }

    function delete($id){
        $prestataires = Prestataire::findOrFail($id);

        $prestataires->delete();

        return redirect()->route('prestataireAdmin')->with('success', 'Prestataire supprimé avec succès.');
    }

}
