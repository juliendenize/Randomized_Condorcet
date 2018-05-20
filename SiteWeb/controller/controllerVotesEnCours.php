<?php

/**
  * Controller pour gérer les votes en cours.
  *
  * Le client demande à voir les différents votes en cours.
  * @author julien
**/

require('./model/Vote.php');
require('./model/Inscrit.php');

/**
  * Envoie les différents votes en cours au client.
**/
function getVotesEnCours() {
  if(isset($_SESSION['connexion'])) {
    $votes = Vote::recupererVotes(new Inscrit($_SESSION['connexion']));
  }
  else $votes = Vote::recupererVotes();
  require('./view/votesEnCours.php');
}
