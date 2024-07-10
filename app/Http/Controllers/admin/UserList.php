<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Models\ClientBailleur;
use App\Models\Voyageur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserList extends Controller
{
    public function show(){
        $users = User::all();
        return view('backOffice/administrateur/user/list', ['users'=> $users]);
    }

    public function search(){
        return User::all();
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('backOffice/administrateur/user/update', compact('user'));
    }

    public function update(Request $request, $id){
        // Définir les messages de validation personnalisés
        $messages = [
            'lastname.required' => 'Le nom est obligatoire.',
            'lastname.string' => 'Le nom doit être une chaîne de caractères.',
            'lastname.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'firstname.required' => 'Le prénom est obligatoire.',
            'firstname.string' => 'Le prénom doit être une chaîne de caractères.',
            'firstname.max' => 'Le prénom ne doit pas dépasser 255 caractères.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
            'email.unique' => 'L\'adresse email est déjà utilisée.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 20 caractères.',
            'country.required' => 'Le pays est obligatoire.',
            'country.string' => 'Le pays doit être une chaîne de caractères.',
            'country.max' => 'Le pays ne doit pas dépasser 255 caractères.',
            'genre.required' => 'Le genre est obligatoire.',
            'genre.string' => 'Le genre doit être une chaîne de caractères.',
            'genre.in' => 'Le genre doit être soit "Homme" soit "Femme".',
            'age.required' => 'L\'âge est obligatoire.',
            'age.integer' => 'L\'âge doit être un nombre entier.',
            'age.min' => 'L\'âge doit être au moins de 0.',
            'age.max' => 'L\'âge ne doit pas dépasser 120.',
        ];

        // Validation des données de la requête avec messages personnalisés
        $validatedData = $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'genre' => 'required|string|in:male,female, other',
            'age' => 'required|integer|min:0|max:120',
            'password' => 'nullable|string|min:8',
        ], $messages);

        // Trouver l'utilisateur par ID
        $user = User::findOrFail($id);

        // Mettre à jour les champs sauf le mot de passe
        $user->update([
            'lastname' => $validatedData['lastname'],
            'firstname' => $validatedData['firstname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'country' => $validatedData['country'],
            'genre' => $validatedData['genre'],
            'age' => $validatedData['age'],
        ]);

        // Si le mot de passe est renseigné, le mettre à jour
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->route('user.show', $id)->with('success', 'Utilisateur mis à jour avec succès.');
    }


    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.show')->with('success','ohhhh');
    }

    public function add(){
        //$user = User::all();
        //dd($user);
        return view('backOffice/administrateur/user.add');
    }

    public function checkAdd(Request $request) {
        // Définir les messages de validation personnalisés
        $messages = [
            'lastname.required' => 'Le nom est obligatoire.',
            'lastname.string' => 'Le nom doit être une chaîne de caractères.',
            'lastname.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'firstname.required' => 'Le prénom est obligatoire.',
            'firstname.string' => 'Le prénom doit être une chaîne de caractères.',
            'firstname.max' => 'Le prénom ne doit pas dépasser 255 caractères.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
            'email.unique' => 'L\'adresse email est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 20 caractères.',
            'country.required' => 'Le pays est obligatoire.',
            'country.string' => 'Le pays doit être une chaîne de caractères.',
            'country.max' => 'Le pays ne doit pas dépasser 255 caractères.',
            'genre.required' => 'Le genre est obligatoire.',
            'genre.string' => 'Le genre doit être une chaîne de caractères.',
            'genre.in' => 'Le genre doit être soit "Homme" soit "Femme".',
            'age.required' => 'L\'âge est obligatoire.',
            'age.integer' => 'L\'âge doit être un nombre entier.',
            'age.min' => 'L\'âge doit être au moins de 0.',
            'age.max' => 'L\'âge ne doit pas dépasser 120.',
        ];

        // Validation des données de la requête avec messages personnalisés
        $validatedData = $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'genre' => 'required|string|in:male,female, other',
            'age' => 'required|integer|min:0|max:120',
        ], $messages);

        // Création de l'utilisateur après validation réussie
        $user = new User();
        $user->lastname = $validatedData['lastname'];
        $user->firstname = $validatedData['firstname'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->phone = $validatedData['phone'];
        $user->country = $validatedData['country'];
        $user->genre = $validatedData['genre'];
        $user->age = $validatedData['age'];
        $user->save();

        Voyageur::create([
            'user_id' => $user->id,

        ]);

        ClientBailleur::create([
            'user_id' => $user->id,

        ]);

        return redirect()->route('user.show')->with('success', 'Utilisateur ajouté avec succès.');
    }


}
