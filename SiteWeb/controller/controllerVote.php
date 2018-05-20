<?php

/**
  * Controller pour gérer un vote.
  *
  * Soit le client veut obtenir les informations d'un vote, soit il veut le clôturer.
  * @author julien
**/

/**
  * Récupère les informations d'un vote dont l'ID est donné par $_GET['id'].
**/
function getVote() {
  require('./model/Vote.php');
  $id = int($_GET['id']);
  $vote = new Vote($id, null, null, null, null, null, null, null, null)
  if($vote->existeVote($id)) {
    if($vote->type == 'public') {
      require('./view/vote.php');
    }
    elseif (isset($_SESSION['Connexion'])) {

    }
    else {
      echo 'Pas connecté';
      header('Location: index.php');
    }
  }
  else {
    header('Location: index.php');
  }
}

/**
  * Clôture un vote et applique l'algorithme de Condorcet afin de calculer le résultat.
**/
function fermerVote() {
  require('./model/Vote.php');

}
