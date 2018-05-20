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
  $utilisateur = new Inscrit(null, null, $email, $_POST['motDePasse']);
  if ($utilisateur->existeCompte()) {
    echo 'utilisateur connecté';
    $utilisateur->connecter();
  }
  else {
    echo 'Erreur mail ou mot de passe';
  }
}
