<?php

/**
  * Charge la classe Model.
**/
require_once('./model/Model.php');

/**
  * Classe abstraite Choix.
  *
  * Hérite de la classe abstraite Model.
  *
  * Définie par:
  * - L'ID du vote pour lequel il y a le choix.
  * - L'ID de l'alternative choisie.
  * - Le rang de l'alternative.
  * - L'attribut qui change suivant la classe fille l'étendant.
  * @author julien
**/
abstract class Choix extends Model {

  /**
    * L'ID du vote. Non modifiable.
  **/
  private $idVote;

  /**
    * L'ID de l'alternative. Non modifiable.
  **/
  private $idAlternative;

  /**
    * Le rang de l'alternative. Non modifiable.
  **/
  private $rang;

  /**
    * L'attribut changeant suivant la classe fille.
  **/
  protected $attribut;

  /**
    * Constructeur de la classe Choix appelé par les classes filles.
    *
    * Chaque paramètre peut être nul car tous les champs ne sont pas nécessaires suivant la fonction.
    *
    * @param idVote L'ID du vote
    * @param idAlternative L'ID de l'alternative
    * @param rang Le rang de l'alternative
  **/
  protected function __construct($idVote = null, $idAlternative = null, $rang = null) {
    $this->idVote = $idVote;
    $this->idAlternative = $idAlternative;
    $this->rang = $rang;

  }

  /**
    * Ajoute le choix représenté par l'instance dans la base de données.
  **/
  protected function ajouterChoix($valeur) {
    $sql = "INSERT INTO $this->table ($this->attribut, idVote, idAlternative, rang)
            VALUES (:valeur, :idVote, :idAlternative, :rang)";
    $parametres = array('valeur' => $valeur, 'idVote' => $this->idVote,
                        'idAlternative' => $this->idAlternative, 'rang' => $this->rang);
    $this->executerRequete($sql, $parametres);
  }

  /**
    * Vérifie si le choix existe déjà dans la base de données.
    * @return boolean True si le choix existe et récupère son rang, false sinon
  **/
  protected function existeChoix($valeur) {
    $sql = "SELECT $this->attribut, idVote, idAlternative, rang FROM $this->table
            WHERE $this->attribut=:valeur AND idVote = :idVote AND
                  idAlternative = :idAlternative AND rang = :rang";
    $parametres = array('valeur' => $valeur, 'idVote' => $this->idVote,
                        'idAlternative' => $this->idAlternative, 'rang' => $this->rang);
    $req = $this->executerRequete($sql, $parametres);
    if($req->rowCount() == 1) {
      $this->rang = $req->fetch()['rang'];
      return true;
    }
    else return false;
  }
}
