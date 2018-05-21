<?php
/**
  * Controller pour gérer la connexion des utilisateurs.
  *
  * Soit le client demande le formulaire de connection soit il demande à être connecté.
  * @author julien
**/

/**
  * Envoie le formulaire pour se connecter au client.
**/
function getConnexion() {
  require('./view/connexion.php');
}

/**
  * Traite le formulaire pour connecter le client en vérifiant que le compte existe.
**/
function postConnexion() {
  require('./model/Inscrit.php');
  $email = strtolower($_POST['email']);
  $motDePasse = sha1($_POST['motDePasse']);
  $utilisateur = new Inscrit(null, null, $email, $motDePasse);
  if ($utilisateur->existeCompte()) {
    $utilisateur->connecter();
    header('Location: index.php');
  }
  else {
    echo 'Erreur mail ou mot de passe';
  }
}

/**
  * Déconnecte l'utilisateur.
**/
function faireDeconnecter() {
  require('./model/Inscrit.php');
  Inscrit::deconnecter();
  header('Location: index.php');
}
