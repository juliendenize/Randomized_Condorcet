<?php

/**
  * Controller pour gérer la création d'un nouveau vote.
  *
  * Soit le client demande le premier formulaire pour créer un vote en donnant le nombre d'alternatives,
  * soit il demande le second pour enregistrer les autres options et les alternatives, soit il demande à ce
  * que le vote soit créé.
  * @author julien
**/

/**
  * Envoie le formulaire pour donner le nombre d'alternatives.
**/
function getNouveauVoteNb() {
  require('./view/nouveauVoteNb');
}

/**
  * Envoie le formulaire pour remplir les options de vote.
**/
function getNouveauVote() {
  require('./view/nouveauVote.php')
}

/**
  * Ajoute le nouveau vote en vérifiant que le titre n'est pas déjà pris.
**/
function postNouveauVote() {
  require('../model/Vote.php');
  $vote = new Vote(null,
                   $_POST['titre'],
                   $_POST['description'],
                   $_POST['type'],
                   $_SESSION['nbAlternatives']);
                   $_POST['dateDebut'],
                   $_POST['dateFin'],
                   $_POST['statut'],
                   $_POST['idAdmin'],
  if($vote->existeEntree('titre', $vote->titre)) {
    echo 'titre';
  }
  else {
    $vote->ajouterVote();
    echo 'ajoute';
  }
}
