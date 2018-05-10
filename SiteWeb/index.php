<?php
session_start();

if(isset($_GET['action'])) {
  $vue = $_GET['action'];
  if($vue == 'inscription') {
		require('./controller/controllerInscription.php');
    if(isset($_POST['pseudo']) || isset($_POST['email']) || isset($_POST['motDePasse'])) {
      postInscrire();
    }
    else {
      getInscrire();
    }
  }
  else require('./view/bienvenue.php');
}
else require('./view/bienvenue.php');
