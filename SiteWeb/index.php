<?php
/**
  * Routeur du site web.
  *
  * La variable $_GET['action'] permet de trouver le bon controller à inclure afin de
  * traiter correctement la requête du client.
**/

session_start();

if(isset($_GET['action'])) {
  $action = $_GET['action'];

  if($action == 'inscription') {
    //appelle le controller pour s'inscrire
    require('./controller/controllerInscription.php');
    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['motDePasse'])) {
      postInscrire();
    }
    else getInscrire();
  }

  elseif($action == 'connexion' || $action == 'deconnexion') {
    //appelle le controller pour se connecter.
    require('./controller/controllerConnexion.php');
    if($action == 'deconnexion'){
      faireDeconnecter();
    }
    else {
      if(isset($_POST['email']) && isset($_POST['motDePasse'])){
        postConnexion();
      }
      else {
        getConnexion();
      }
    }
  }

  elseif($action == 'nouveauVote') {
    //appelle le controlleur pour créer un nouveau vote.
    require('./controller/controllerNouveauVote.php');
    if(isset($_POST['nbAlternatives'])){
       getNouveauVote();
    }
    elseif(isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['type']) &&
           isset($_SESSION['nbAlternatives']) && isset($_POST['dateDebut']) &&
           isset($_POST['dateFin'])) {
      postNouveauVote();
    }
    else getNouveauVoteNb();
  }

  elseif($action == 'tousLesVotes') {
    //appelle le controleur pour gérer les votes en cours.
    require('./controller/controllerTousLesVotes.php');
    getTousLesVotes();
  }

  elseif($action == 'consulterVote' || $action == 'voter' || $action == "fermerVote" || $action == "resultat") {
    if(isset($_GET['idVote'])) {
      //appelle le controlleur pour gérer un vote.
      if($action == 'consulterVote') {
        require('./controller/controllerVote.php');
        getVote();
      }
      elseif($action == 'voter') {
        require('./controller/controllerVoter.php');
        if(isset($_POST['alternative1'])) postVoter();
        else getVoter();
      }
      elseif($action == 'resultat') {
        require('./controller/controllerResultat.php');
        getResultat();
      }
      else {
        require('./controller/controllerVote.php');
        fermerVote();
      }
    }
    else header("Location: index.php?action=erreur&erreur=donnerVote");
  }

  elseif($action == 'erreur') {
    if(isset($_GET['erreur'])){
      if('erreur' == 'donnerVote') {
        echo 'Donner un ID de vote.';
      }
    }
    else echo 'Il y a eu une erreur.';
    require('./view/bienvenue.php');
  }

  //redirige vers le routeur sans action pour afficher la page d'accueil.
  else header('Location: index.php');
}

//inclut la page d'accueil.
else require('./view/bienvenue.php');
