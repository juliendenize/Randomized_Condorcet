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
    $alternatives = Alternative::recupererAlternatives($vote);
    $resultat = new Resultat($id, null);
    $resultat->existeVainqueur;
    require('./view/resultat.php');
  }
  else {
    header('Location: header.php?action=erreur&amp;amperreur=Ce vote n\'existe pas.');
  }
}
