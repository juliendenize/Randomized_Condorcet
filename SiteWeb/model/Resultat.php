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
    * L'ID du vote dont c'est le résultat. Non modifiable.
  **/
  private $idVote;

  /**
    * Le nom de l'alternative gagnante. Non modifiable.
  **/
  private $nomAlternative;

  /**
    * Constructeur de la classe Resultat.
    *
    * Chaque paramètre peut être nul car tous les champs ne sont pas nécessaire suivant les fonctions.
    * @param idVote L'ID du vote dont c'est le résultat
    * @param nomAlternative Le nom de l'alternative gagnante
  **/
  public __construct($idVote = null, $nomAlternative = null) {
    $this->idVote = $idVote;
    $this->nomAlternative= $nomAlternative;
    $this->table='Resultats'
  }

  /**
    * Renvoie true et initialise le vainqueur du vote défini par son ID si le résultat existe.
    * @return boolean True si le résultat existe, false sinon.
  **/
  public existeVainqueur() {
    $sql = 'SELECT nomAlternative FROM Resultats WHERE idVote = :idVote';
    $parametre = array('idVote' => $idVote);
    $req = $this->executerRequete($sql, $parametre);
    if($req->rowCount() == 1) {
      $this->nomAlternative = $req->fetch()['nomAlternative'];
      return true;
    }
    else return false;
  }
}
