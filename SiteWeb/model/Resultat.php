<?php

/**
  * Charge la classe Model.
**/
require_once('./model/Model.php');

/**
  * Classe Resultat.
  *
  * Représente une entrée de la table Resultats dans la base de données.
  *
  * Hérite de la classe abstraite Model.
  * Définie par:
  * - L'ID du vote dont c'est le résultat.
  * - Le nom de l'alternative gagnante.
  * @author julien
**/
class Resultat extends Model {
  /**
    * L'ID du vote dont c'est le résultat. Consultable.
  **/
  public $idVote;

  /**
    * L'ID de l'alternative gagnante. Consultable.
  **/
  public $idAlternative;

  /**
    * Constructeur de la classe Resultat.
    *
    * Chaque paramètre peut être nul car tous les champs ne sont pas nécessaire suivant les fonctions.
    * @param idVote L'ID du vote dont c'est le résultat
    * @param nomAlternative Le nom de l'alternative gagnante
  **/
  public function __construct($idVote = null, $nomAlternative = null) {
    $this->idVote = $idVote;
    $this->nomAlternative= $nomAlternative;
    $this->table='Resultats';
  }

  /**
    * Renvoie true et initialise le vainqueur du vote défini par son ID si le résultat existe.
    * @return boolean True si le résultat existe, false sinon.
  **/
  public function existeVainqueur() {
    $sql = 'SELECT idAlternative FROM Resultats WHERE idVote = :idVote';
    $parametre = array('idVote' => $this->idVote);
    $req = $this->executerRequete($sql, $parametre);
    if($req->rowCount() == 1) {
      $this->idAlternative = $req->fetch()['idAlternative'];
      return true;
    }
    else return false;
  }
}
