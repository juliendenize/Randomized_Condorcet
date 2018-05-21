<?php

/**
  * Controller pour afficher un résultat.
  * @author julien
**/

require_once('./model/Vote.php');
require_once('./model/Alternative.php');
require_once('./model/Resultat.php');
require_once('./model/Inscrit.php');

function getResultat() {
  $id = (int)$_GET['idVote'];
  $vote = new Vote($id, null, null, null, null, null, null, null, null);
  if($vote->existeVote()) {
    $administrateur = new Inscrit($vote->idAdmin, null, null, null);
    $administrateur->existeCompte();
    $resultat = new Resultat($id, null);
    $resultat->existeVainqueur();
    $alternatives = Alternative::recupererAlternatives($vote);
    $nomVainqueur = Alternative::recupererNom($resultat->idVote, $resultat->idAlternative);
    require('./view/resultat.php');
  }
  else {
    header('Location: header.php?erreur=voteInexistant');
  }
}
