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

  elseif($action == 'connexion') {
    //appelle le controller pour se connecter.
    require('./controller/controllerConnexion.php');
    if(isset($_POST['email']) && isset($_POST['motDePasse'])){
      postConnexion();
    }
    else {
      getConnexion();
    }
  }

  elseif($action == 'nouveauVote') {
    //appelle le controlleur pour créer un nouveau vote.
    require('./controller/controllerNouveauVote.php');
    if(isset($_POST['nbAlternatives'])){
       getNouveauVote();
    }
    elseif(isset($_POST['type']) && isset($_POST['dateDebut']) && isset($_POST['dateFin']) &&
           isset($_POST['titre']) && isset($_POST['statut']) && isset($_POST['admin']) &&
           isset($_SESSION['nbAlternatives'])) {
      postNouveauVote();
    }
    else getNouveauVoteNb();
  }

  elseif($action == 'votesEnCours') {
    //appelle le controleur pour gérer les votes en cours.
    require('./controller/controllerVotesEnCours.php');
    getVotesEnCours();
  }

  elseif($action == 'vote') {
    if(isset($_GET['id'])) {
      //appelle le controlleur pour gérer un vote.
      require('./controller/controllerVote.php');
      getVote();
    }
    else header('Location: index.php');
  }
  //redirige vers le routeur sans action pour afficher la page d'accueil.
  else header('Location: index.php');
}

//inclut la page d'accueil.
else require('./view/bienvenue.php');
