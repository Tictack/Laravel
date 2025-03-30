<h2> Infos Membre </h2>
<h3>
{{ $un_membre->prenom }} {{ $un_membre->nom }}
</h3>
<div class='h2'>
{{ $un_membre->adresse }}
</div>
<h4>Biographie :</h4>
<p>{{ $membre->biographie->texte ?? 'Aucune biographie disponible' }}</p>
@if(auth()->check() && auth()->user()->email == $un_membre->adresse)
    <a href="{{ url('edition', $un_membre->id) }}" class="btn btn-warning">Modifier mes informations</a>
@endif
