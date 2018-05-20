<?php

/**
  * Charge la classe Choix.
**/
require_once('./model/Choix.php');

/**
  * Classe ChoixPublic.
  *
  * Représente une entrée de la table ChoixPublics dans la base de données.
  *
  * Hérite de la classe abstraite Choix.
  * Définie par:
  * - L'ID du votant.
  * @author julien
**/
class ChoixPublic extends Choix {

  /**
    * L'ID du votant faisant le choix. Ce nombre n'est pas modifiable.
  **/
  private $idVotant;

  /**
    * Constructeur de la classe ChoixPublic.
    *
    * Chaque paramètre peut être nul car tous les champs ne sont pas nécessaires suivant les fonctions.
    *
    * @param idVotant L'ID du votant faisant le choix
    * @param idVote L'ID du vote dans lequel le choix se fait
    * @param idAlternative L'ID de l'alternative du choix
    * @param rang Le rang choisi de l'alternative
  **/
  public __construct($idVotant = null, $idVote = null, $idAlternative = null, $rang = null, $idVotant = null) {
    parent::__construct($idVote, $idAlternative, $rang);
    $this->idVotant = $idVotant;
    $this->table = 'ChoixPublics';
    $this->attribut = 'idVotant';
  }

  /**
    * Ajoute le choix représenté par l'instance dans la base de données.
  **/
  public ajouterChoixPublic() {
    $this->ajouterChoix('idVotant', $this->idVotant);
  }
}
