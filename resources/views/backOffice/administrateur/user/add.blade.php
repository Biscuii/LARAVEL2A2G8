<x-app-layout>
    @include('include.sidebar')
    <div class="pt-7 pl-5">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('user.check') }}" method="POST">
            @csrf
            <label for="lastname">Nom :</label>
            <input type="text" name="lastname" placeholder="Votre nom de famille" required><br><br>

            <label for="firstname">Prénom :</label>
            <input type="text" name="firstname" placeholder="Votre prénom" required><br><br>

            <label for="age">Âge :</label>
            <input type="number" name="age" placeholder="Votre âge" required><br><br>

            <label for="genre">Genre :</label>
            <select name="genre" required>
                <option value="male">Homme</option>
                <option value="female">Femme</option>
                <option value="other">Autre</option>
            </select><br><br>

            <label for="phone">Téléphone :</label>
            <input type="text" name="phone" placeholder="Votre téléphone"><br><br>

            <label for="country">Pays :</label>
            <input type="text" name="country" placeholder="Votre pays" required><br><br>

            <label for="email">Email :</label>
            <input type="email" name="email" placeholder="Votre email" required><br><br>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="Votre mot de passe" required><br><br>

            <input type="submit" name="submit" value="Envoyer">
        </form>
        <input type="button" value="Retourner en arrière" onclick="history.go(-1)">
    </div>
</x-app-layout>
