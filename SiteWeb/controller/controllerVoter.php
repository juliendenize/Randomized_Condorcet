<?php

/**
  * Controller pour voter.
  * @author julien
**/


/**
  * Charge la classe Vote.
**/
require('./model/Vote.php');

/**
  * Affiche le formulaire pour voter sur un vote passé en paramètre.
**/
function getVoter() {
  $id = (int)$_GET['idVote'];
  $vote = new Vote($id, null, null, null, null, null, null, null, null);
  if($vote->existeVote($id)){
    if(($vote->type == 'prive' && isset($_SESSION['pseudo'])) || $vote->type == 'public') {
      require('./model/Alternative.php');
      $alternatives = Alternative::recupererAlternatives($vote);
      require('./view/voter.php');
    }
    else header('Location: index.php?erreur=connecteVoter');
  }
  else header('Location: index.php?erreur=voteInexistant');
}

/**
  * Stocke les choix du votant.
**/
function postVoter() {
  require_once('./model/Alternative.php');
  require_once('./model/Inscrit.php');
  require_once('./model/ChoixPublic.php');
  require_once('./model/ChoixPrive.php');
  $idVote = (int)$_GET['idVote'];
  if(isset($_SESSION['id'])) {
    $utilisateur = new Inscrit($_SESSION['id'], null, null, null);
    $utilisateur->existeCompte();
    if(ChoixPrive::aVote($utilisateur->id, $idVote)){
      header('Location: index.php?erreur=aVote');
    }
  }
  else $utilisateur = null;
  $vote = new Vote($idVote, null, null, null, null, null, null, null, null);
  if($vote->existeVote()) {
    if($utilisateur == null) {
      $idVotant = ChoixPublic::retourneIdVotant();
    }
    for($i = 1; $i <= $vote->nbAlternatives; $i++) {
      $rang = (int)$_POST['alternative'.$i];
      if($utilisateur == null) {
        $choix = new ChoixPublic($idVotant, $idVote, $i, $rang);
        $choix->ajouterChoixPublic();
      }
      else {
        $choix = new ChoixPrive($utilisateur->id, $idVote, $i, $rang);
        $choix->ajouterChoixPrive();
      }
    }
    header('Location: index.php');
  }
  else {
    header('Location: index.php?erreur=voteInexistant');
  }
}
