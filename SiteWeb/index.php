<?php
session_start();

if(isset($_GET['action'])) {
  $action = $_GET['action'];

  if($action == 'inscription') {
		require('./controller/controllerInscription.php');
    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['motDePasse'])) {
      postInscrire();
    }
    else getInscrire();
  }

  elseif($action = 'connexion') {
    require('./controller/controllerConnexion.php');
    if(isset($_POST['email']) && isset($_POST['motDePasse'])){
      postConnexion();
    }
    else getConnexion();
  }

  elseif($action = 'nouveauVote') {
    require('./controller/controllerNouveauVote.php');
    if(isset($_POST['nbAlternatives'])){
       getNouveauVote()
    }
    elseif(isset($_POST['type'], isset($_POST['dateDebut'], isset($_POST['dateFin'],
            isset($_POST['titre'], isset($_POST['statut'], isset($_POST['admin'],
            isset($_SESSION['nbAlternatives'])) {
      postNouveauVote();
    }
    else getNouveauVoteNb();
  }

  elseif($action = 'votesEnCours') {
    if (isset($_SESSION['connexion'])) {
      getVotesEnCoursConnecte();
    }
    else {
      getVotesEnCoursDeconnecte();
    }
  }

  else require('./view/bienvenue.php');
}

else require('./view/bienvenue.php');
