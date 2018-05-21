<?php

/**
  * Controller pour gérer les votes en cours.
  *
  * Le client demande à voir les différents votes en cours.
  * @author julien
**/

require_once('./model/Vote.php');
require_once('./model/Inscrit.php');

/**
  * Envoie les différents votes en cours au client.
**/
function getTousLesVotes() {
  if(isset($_SESSION['pseudo'])) {
    $votes = Vote::recupererVotes(new Inscrit($_SESSION['pseudo']));
  }
  else $votes = Vote::recupererVotes();
  require('./view/tousLesVotes.php');
}
