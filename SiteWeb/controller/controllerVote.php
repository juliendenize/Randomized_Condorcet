<?php

/**
  * Controller pour gérer un vote.
  *
  * Soit le client veut obtenir les informations d'un vote, soit il veut le clôturer.
  * @author julien
**/

/**
  * Charge la classe Vote
**/
require('./model/Vote.php');



/**
  * Récupère les informations d'un vote dont l'ID est donné par $_GET['id'] et l'affiche.
**/
function getVote() {
  $id = (int)$_GET['idVote'];
  $vote = new Vote($id, null, null, null, null, null, null, null, null);
  if($vote->existeVote($id)) {
    require('./model/Alternative.php');
    if($vote->type == 'public') {
      $alternatives = Alternative::recupererAlternatives($vote);
      require('./view/vote.php');
    }
    elseif (isset($_SESSION['pseudo'])) {

    }
    else {
      echo 'Pas connecté';
      //header('Location: index.php');
    }
  }
  else {
    echo 'Vote inexistant';
    //header('Location: index.php');
  }
}

/**
  * Clôture un vote et applique l'algorithme de Condorcet afin de calculer le résultat.
  * @author rémi
**/
function fermerVote() {
  $idVote = (int)$_GET['idVote'];
  $vote = new Vote($idVote, null, null, null, null, null, null, null , null);
  if($vote->existeVote() && $vote->statut='ouvert'){
		$aujourdhui= new DateTime();
		if ($aujourdhui->diff($vote->dateFin)>0) {
			//exec(java -jar Algo.jar, 'jdbc:mysql://localhost:3306/Condorcet' 'root' '' $vote->id);
			$sql = 'UPDATE Votes SET statut=ferme WHERE id=:id';
      $parametre = array('id' => $vote->id);
      $vote->executerRequete($sql, $parametre);
		}
		elseif ($vote->statut = 'ferme') {
			echo 'Le Vote '.$idVote.' est déjà clôturé.';
      //header('Location: index.php');
		}
		   else {
        echo $aujourdhui->diff($dateFin)->format('Vous pourrez clôturer le vote dans %d jours');
        //header('Location: Index.php');
		}
  }
}

/**
  * Affiche le résultat d'un vote s'il existe.
**/
function getResultat() {
  $idVote = (int)$_GET['idVote'];
  $vote = new Vote($idVote, null, null, null, null, null, null, null, null);
  if($vote->existeVote()) {
    require_once('./model/Resultat.php');
  }
}
