<?php

function getInscrire() {
  require('./view/inscription.php');
}

function postInscrire() {
  require('./model/Inscrit.php');

  $utilisateur = new Inscrit($_POST['email'], $_POST['motDePasse'], $_POST['pseudo']);

  if($utilisateur->existeEntree('Inscrits', 'pseudo', $utilisateur->pseudo)) {
    echo 'Pseudo déjà pris';
  }
  elseif($utilisateur->existeEntree('Inscrits', 'email', $utilisateur->email)) {
    echo 'Mail déjà pris';
  }
  else {
    $utilisateur->inscrire();
    echo 'Inscrit';
  }

  // Redirection de l'utilisateur vers la page d'accueil
  header('Location: index.php');
}
