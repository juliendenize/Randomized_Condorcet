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
    elseif(isset($_SESSION['pseudo'])) {
      $alternatives = Alternative::recupererAlternatives($vote);
      require('./view/vote.php');
    }
    else {
      header('Location: index.php?erreur=connecteVoter');
    }
  }
  else {
    header('Location: index.php?erreur=voteInexistant');
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
		//$aujourdhui= new DateTime();
		//if ($aujourdhui->diff($vote->dateFin)>0) {
		shell_exec("java -jar condorcet.jar 'jdbc:mysql://localhost:3306/Condorcet' 'root' 'root' $vote->id");
    $sql = 'UPDATE Votes SET statut=\'ferme\' WHERE id=:id';
    $parametre = array('id' => $vote->id);
    $vote->executerRequete($sql, $parametre);
    header('Location: index.php');
	}
	elseif ($vote->statut = 'ferme') {
    header('Location: index.php?erreur=cloture');
		}
  else {
    //$valeur = $aujourdhui->diff($dateFin)->format('Vous pourrez clôturer le vote dans %d jours');
    header('Location: index.php?erreur=pasCloture');
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
