<?php

/**
  * Charge la classe Model.
**/
require_once('./model/Model.php');

/**
  * Classe VotantPrive.
  *
  * Représente une entrée de la table VotantsPrivés dans la base de données.
  *
  * Hérite de la classe abstraite Model.
  * Définie par:
  * - L'ID du vote.
  * - L'ID de l'inscrit autorisé à participer au vote.
  * @author julien
**/
class VotantPrive extends Model {
  /**
    * L'ID du vote. Non modifiable.
  **/
  private $idVote;

  /**
    * L'ID de l'inscrit autorisé à participer au vote.
  **/
  private $idInscrit;

  /**
    * Constructeur de la classe VotantPrive.
    *
    * Chaque paramètre peut être nul car tous les champs ne sont pas nécessaires suivant la fonction.
    *
    * @param idVote L'ID du vote
    * @param idInscrit L'ID de l'inscrit
  **/
  public function __construct($idVote = null, $idInscrit = null) {
    $this->idVote = $idVote;
    $this->idInscrit = $idInscrit;
    $thos->table='VotantsPrives';
  }

}
