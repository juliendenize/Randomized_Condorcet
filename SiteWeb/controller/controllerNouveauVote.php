<?php

function getNouveauVoteNb() {
  require('./view/nouveauVoteNb');
}

function getNouveauVote() {
  require('./view/nouveauVote.php')
}

function postNouveauVote() {
  require('../model/Vote.php');
  $vote = new Vote($_POST['type'],
                   $_POST['dateDebut'],
                   $_POST['dateFin'],
                   $_POST['titre'],
                   $_POST['statut'],
                   $_POST['admin'],
                   $_SESSION['nbAlternatives']);

  if($vote->existeEntree('Votes', 'titre', $vote->titre)) {
    echo 'titre';
  }
  else {
    $vote->ajouterVote();
    echo 'ajoute';
  }
}
