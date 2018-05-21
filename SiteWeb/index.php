<?php
/**
  * Routeur du site web.
  *
  * La variable $_GET['action'] permet de trouver le bon controller à inclure afin de
  * traiter correctement la requête du client.
  * @author julien
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
    else header("Location: index.php?erreur=donnerVote");
  }

  //redirige vers le routeur sans action pour afficher la page d'accueil.
  else header('Location: index.php?erreur=action');
}

elseif (isset($_GET['erreur'])) {
  $erreur = $_GET['erreur'];
  echo 'Erreur: ';
  switch ($erreur) {
    case 'donnerVote':
      echo 'Donnez un ID de vote.';
      break;
    case 'voteInexistant':
      echo 'Ce vote n\'existe pas.';
      break;
    case 'action':
      echo 'Donnez une action valide.';
      break;
    case 'connexion':
      echo 'Mail ou mot de passe invalide.';
      break;
    case 'pseudo':
      echo 'Pseudo déjà pris';
      break;
    case 'email':
      echo 'Email déjà pris';
      break;
    case 'connecteVote':
      echo 'Il faut être connecté pour créer un vote.';
      break;
    case 'connecteVoter':
      echo 'Il faut être connecté pour voter sur ce vote.';
      break;
    case 'titre':
      echo 'Titre du vote déjà pris.';
      break;
    case 'cloture':
      echo 'Ce vote était déjà clôturé.';
      break;
    case 'pasCloture':
      echo 'Vous ne pouvez pas encore clôturer le vote, attendez encore un peu';
      break;
    case 'aVote':
      echo 'Vous avez déjà voté.';
      break;
    default:
      echo 'Nous ne savons pas quelle est l\'erreur';
      break;
    }
    require('./view/bienvenue.php');
}

//inclut la page d'accueil.
else require('./view/bienvenue.php');
