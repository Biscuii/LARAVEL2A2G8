<x-app-layout>
    <table>
        <thead>
            <th>Nom</th>
            <th>Email</th>
            <th>Mot de passe</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                        <a href="{{route('user.edit', ['id' => $user->id])}}">Modifier</a>
                        <a href="{{route('user.delete', ['id' => $user->id])}}">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{route('user.add', ['id' => $user->id])}}">Ajouter</a>
</x-app-layout>
