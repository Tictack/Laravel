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
<div class="formgroup">
{!! Html::modelForm($un_membre,'PATCH', url('miseAJour',$un_membre->id)) !!}
<div class="formgroup">
{{ Html::label('nom', 'Nom') }}
{{ Html::text('nom') }}
</div>
<div class="formgroup">
{{ Html::label('prenom', 'Prenom :') }}
{{ Html::text('prenom') }}
</div>
<div class="formgroup">
{{ Html::label('adresse', 'Adresse électronique') }}
{{ Html::text('adresse') }}
</div>
<p>
</p>
{!! Html::submit("Modifier membre", array('class' => 'btn btn-info')) !!}
{!! Html::closeModelForm() !!}
</div>
@stop
@section('pied_page')
LP3MI 2025
@stop
