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
  if($vote->existeVote($id)) {
    require('./model/Alternative.php');
    $alternatives = Alternative::recupererAlternatives($vote);
    require('./view/voter.php');
  }
  else {
    echo 'Vote inexistant';
    //header('Location: index.php');
  }
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
      echo 'A déjà voté';
      //header('Location: index.php');
    }
  }
  else $utilisateur = null;
  $vote = new Vote($idVote, null, null, null, null, null, null, null, null);
  if($vote->existeVote()) {
    if($utilisateur == null) {
      $idVotant = ChoixPublic::retourneIdVotant();
    }
    for($i = 1; $i <= $vote->nbAlternatives; $i++) {
      echo 'For:'.$i;
      $rang = (int)$_POST['alternative'.$i];
      if($utilisateur == null) {
        echo'Utilisateur null';
        $choix = new ChoixPublic($idVotant, $idVote, $i, $rang);
        $choix->ajouterChoixPublic();
      }
      else {
        $choix = new ChoixPrive($utilisateur->id, $idVote, $i, $rang);
        $choix->ajouterChoixPrive();
      }
    }
    //header('Location: index.php');
  }
  else {
    echo 'vote inexistant';
    //header('Location: index.php');
  }
}
