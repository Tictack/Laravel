@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
    Modification des infos du membre
@stop
@section('contenu')
    @if(!$un_membre)
        <p class="text-danger">Le membre demandé n'existe pas.</p>
        <nav class="bg-gray-800 p-4 text-white">
            <ul class="flex space-x-4">
                <li><a href="{{ route('register') }}" class="hover:underline">S'enregistrer</a></li>
                <li><a href="{{ route('login') }}" class="hover:underline">Se connecter</a></li>
                <li><a href="{{ url('membre/{numero}') }}" class="hover:underline">Consulter les membres</a></li>
                <li><a href="{{ url('creer') }}" class="hover:underline">Ajouter un membre</a></li>
                <li><a href="{{ url('modifier/' . auth()->user()->id) }}" class="hover:underline">Modifier détails</a></li>
            </ul>
        </nav>
    @elseif(auth()->check() && auth()->user()->id == $un_membre->id)
        <div class="formgroup">
            <!-- Ouvrir le formulaire avec la méthode PATCH -->
            <form action="{{ url('miseAJour', $un_membre->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="formgroup">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" value="{{ $un_membre->nom }}" class="form-control" required />
                </div>

                <div class="formgroup">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" value="{{ $un_membre->prenom }}" class="form-control" required />
                </div>

                <div class="formgroup">
                    <label for="adresse">Adresse électronique</label>
                    <input type="email" name="adresse" value="{{ $un_membre->adresse }}" class="form-control" required />
                </div>

                <div class="formgroup">
                    <label for="biographie">Biographie</label>
                    <textarea name="biographie" class="form-control">{{ $un_membre->biographie->texte ?? '' }}</textarea>
                </div>

                <p></p>
                <button type="submit" class="btn btn-info">Modifier membre</button>
            </form>
        </div>
    @else
        <p class="text-danger">Vous n'êtes pas autorisé à modifier ces informations.</p>
    @endif
@stop
@section('pied_page')
LP3MI 2025
@stop
