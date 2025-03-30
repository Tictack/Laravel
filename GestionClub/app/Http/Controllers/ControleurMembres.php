<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
// Obligatoire pour avoir accès au modèle
use App\Models\Membre;
//Pour accéder à l'authentification
use Illuminate\Support\Facades\Auth;
class ControleurMembres extends Controller
{
// des variables
protected $les_membres;
protected $soumissions;
public function __construct( Membre $membres, Request $requetes) {
$this->les_membres = $membres;
$this->soumissions = $requetes;
}
public function index() {
$les_membres = $this->les_membres->all();
return view('pages_site/consultation_edition', compact('les_membres'));
}
public function afficher($numero) {
    $un_membre = Membre::with('biographie')->findOrFail($numero);
return view('pages_site/membre', compact('un_membre'));
}
public function creer() {
return view('pages_site/creation');
}
public function enregistrer(Request $request) {
$membre = new membre();
$membre->nom = $request->nom;
$membre->adresse = $request->adresse;
$membre->prenom = $request->prenom;
$membre->save();
    // Retourne un message de succès ou redirection vers une autre page
    return redirect()->route('membres')->with('success', 'Membre créé');
}
public function editer($numero) {
$un_membre = $this->les_membres->find($numero);
return view('pages_site/edition', compact('un_membre'));
}
public function miseAJour($numero) {
        $un_membre = $this->les_membres->find($numero);
        $la_soumission = $this->soumissions;


        // Mise à jour des informations du membre
        $un_membre->nom = $la_soumission->nom;
        $un_membre->prenom = $la_soumission->prenom;
        $un_membre->adresse = $la_soumission->adresse;

        if (isset($la_soumission->biographie['texte'])) {
            $biographieTexte = $la_soumission->biographie['texte'];

            if ($un_membre->biographie) {
                // Si la biographie existe déjà, on la met à jour
                $un_membre->biographie->texte = $biographieTexte;
                $un_membre->biographie->save();  // Sauvegarde de la biographie modifiée
            } else {
                // Si la biographie n'existe pas, on en crée une nouvelle
                $un_membre->biographie()->create([
                    'texte' => $biographieTexte
                ]);
            }
        }

        $un_membre->save();

        // Rediriger après la modification
        return redirect()->route('membres')->with('success', 'Membre modifié');
}

public function identite() {
if (Auth::check())
{
$utilisateur = Auth::user();
$id = Auth::id();
return view('pages_site/identite',compact('utilisateur','id'));
}
else
echo "<h1>Accès non autorisé</h1>";
}
public function acces_protege() {
$infos_utilisateur = Auth::user();
$utilisateur = $infos_utilisateur->name;
echo "<h1>Utilisateur authentifié : ".$utilisateur."</h1>";
}

}
