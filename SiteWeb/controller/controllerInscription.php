<?php

require_once('Inscrits');

function getInscrire() {
  require('inscription.php')
}

function postInscrire() {
  if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['motDePasse'])) {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];

    $utilisateur = new Inscrit($pseudo, $email, $motDePasse);
    $resultatInscription = $utilisateur->inscrire();

    switch($resultatInscription) {
      case 'email':
        echo 'Mail déjà utilisé';
        break;
      case 'pseudo':
        echo 'Pseudo déjà pris';
        break;
      case 'inscrit':
        echo 'Tu as bien été ajouté à la base de données';
        break;
    }
    else {
      echo 'Il manque un élément à remplir'
    }
  // Redirection de l'utilisateur vers la page d'accueil
  header('Location: index.php');
}
