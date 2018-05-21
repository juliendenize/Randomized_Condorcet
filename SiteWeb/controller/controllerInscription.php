<?php

/**
  * Controller pour gérer l'inscription des utilisateurs.
  *
  * Soit le client demande le formulaire d'inscription soit il demande à être inscrit.
  * @author julien
*/

/**
  * Envoie le formulaire pour s'inscrire au client.
**/
function getInscrire() {
  require('./view/inscription.php');
}

/**
  * Traite le formulaire pour s'inscrire en vérifiant que le pseudo et l'email ne sont pas déjà pris.
**/
function postInscrire() {
  require('./model/Inscrit.php');
  $email = strtolower($_POST['email']);
  $motDePasse = sha1($_POST['motDePasse']);

  $utilisateur = new Inscrit(null, $_POST['pseudo'], $email, $motDePasse);

  if($utilisateur->existeEntree('pseudo', $utilisateur->pseudo)) {
    echo 'Pseudo déjà pris';
  }
  elseif($utilisateur->existeEntree('email', $utilisateur->email)) {
    echo 'Mail déjà pris';
  }
  else {
    $utilisateur->inscrire();
    echo 'Inscrit';
  }

  // Redirection de l'utilisateur vers la page d'accueil.
  header('Location: index.php');
}
