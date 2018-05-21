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
    header('Location: index.php?erreur=pseudo');
  }
  elseif($utilisateur->existeEntree('email', $utilisateur->email)) {
    header('Location: index.php?erreur=email');
  }
  else $utilisateur->inscrire();

  // Redirection de l'utilisateur vers la page d'accueil.
  header('Location: index.php');
}
