<?php

/**
  * Charge la classe Choix.
**/
require_once('./model/Choix.php')

/**
  * Classe ChoixPrive.
  *
  * Représente une entrée de la table ChoixPrivés dans la base de données.
  *
  * Hérite de la classe abstraite Choix.
  * Définie par:
  * - L'ID de l'inscrit qui fait un choix.
  * @author julien
**/
class ChoixPrive extends Choix {

  /**
    * L'ID de l'inscrit faisant le choix. Non modifiable.
  **/
  private $idInscrit;

  /**
    * Constructeur de la classe ChoixPrive.
    *
    * Chaque paramètre peut être nul car tous les champs ne sont pas nécessaires suivant la fonction.
    *
    * @param idInscrit L'ID de l'inscrit faisant le choix
    * @param idVote L'ID du vote dans lequel le choix se fait
    * @param idAlternative L'ID de l'alternative du choix
    * @param rang Le rang choisi de l'alternative
  **/
  public __construct($idInscrit = null, $idVote = null, $idAlternative = null, $rang = null, $idVotant = null) {
    parent::__construct($idVote, $idAlternative, $rang);
    $this->idInscrit = $idInscrit;
    $this->table = 'ChoixPrives';
    $this->attribut = 'idInscrit'
  }

  /**
    * Ajoute le choix représenté par l'instance dans la base de données.
  **/
  public ajouterChoixPrive() {
    $this->ajouterChoix('idInscrit', $this->idVotant);
  }
}
