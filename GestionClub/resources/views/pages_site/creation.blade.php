@extends('pages_site/fond')

@section('entete')
@stop

@section('titre')
    Club des Usagers de l'Espace galactique
@stop

@section('titre_contenu')
    Création d'un nouveau membre
@stop

@section('contenu')
    <div class="formgroup">
        <!-- Utilisation de la syntaxe de Laravel pour ouvrir un formulaire -->
        <form method="POST" action="{{ url('creation/membre') }}">
            @csrf  <!-- CSRF pour la sécurité -->

            <div class="formgroup">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="formcontrol" required>
            </div>

            <div class="formgroup">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="formcontrol" required>
            </div>

            <div class="formgroup">
                <label for="adresse">Adresse électronique</label>
                <input type="email" name="adresse" class="formcontrol" required>
            </div>

            <p></p>

            <button type="submit">Créer le membre</button>
        </form>
    </div>
@stop

@section('pied_page')
    LP3MI 2025
@stop
