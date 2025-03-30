@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
Liste des membres
@stop
@section('contenu')
    <nav class="bg-gray-800 p-4 text-white">
        <ul class="flex space-x-4">
            <li><a href="{{ route('register') }}" class="hover:underline">S'enregistrer</a></li>
            <li><a href="{{ route('login') }}" class="hover:underline">Se connecter</a></li>
            <li><a href="{{ url('membre/{numero}') }}" class="hover:underline">Consulter les membres</a></li>
            <li><a href="{{ url('creer') }}" class="hover:underline">Ajouter un membre</a></li>
            <li><a href="{{ url('modifier/' . auth()->user()->id) }}" class="hover:underline">Modifier détails</a></li>
        </ul>
    </nav>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @foreach ($les_membres as $membre)
<h3>
<a href="/modifier/{{ $membre->id }}"> {{ $membre->prenom }} {{ $membre->nom }}</a>
</h3>
@if(auth()->check())
    <div class='h2'>
        {{ $membre->adresse }}
    </div>
    <div class="h2">
        @if($membre->biographie)
            {{ $membre->biographie->texte }}
        @else
            Aucune biographie disponible
        @endif
    </div>
@endif
@endforeach
<a href="{{ url('/creer') }}"> Créer nouveau membre </a>
@stop
@section('pied_page')
LP3MI 2025
@stop
