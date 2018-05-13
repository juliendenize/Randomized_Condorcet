<?php

function getConnexion() {
  require('./view/connexion.php');
}

function postConnexion() {
  require('./model/Inscrit.php');
  $utilisateur = new Inscrit($_POST['email'], $_POST['motDePasse']);
  if ($utilisateur->existeCompte() == false) {
    echo 'Erreur mail ou mot de passe';
  }
  else {
    echo 'utilisateur connecté';
    $utilisateur->connecter();
  }
}
