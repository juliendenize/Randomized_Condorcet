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
  if(isset($_SESSION['pseudo'])) {
    require('./view/nouveauVoteNb.php');
  }
  else header('Location: index.php?erreur=connecteVote');
}

/**
  * Envoie le formulaire pour remplir les options de vote.
**/
function getNouveauVote() {
  $_SESSION['nbAlternatives'] = $_POST['nbAlternatives'];
  require('./view/nouveauVote.php');
}

/**
  * Ajoute le nouveau vote en vérifiant que le titre n'est pas déjà pris.
**/
function postNouveauVote() {
  require('./model/Vote.php');
  $vote = new Vote(null,
                   $_POST['titre'],
                   $_POST['description'],
                   $_POST['type'],
                   $_SESSION['nbAlternatives'],
                   $_POST['dateDebut'],
                   $_POST['dateFin'],
                   'ouvert',
                   $_SESSION['id']);
  if($vote->existeEntree('titre', $vote->titre)) {
    header('Location: index.php?erreur=titre');
  }
  else {
    echo $vote->type;
    require('./model/Alternative.php');
    $vote->ajouterVote();
    $vote->initialiseIdVote();
    for($i = 1; $i <= $_SESSION['nbAlternatives']; $i++) {
      $alternative = new Alternative($i, $vote->id, $_POST["choix".$i]);
      $alternative->ajouterAlternative();
    }
    unset($_SESSION['nbAlternatives']);
    header('Location: index.php');
  }
}
