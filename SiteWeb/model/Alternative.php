<?php

/**
  * Charge la classe Model.
**/
require_once('./model/Model.php')

/**
  * Classe Alternative.
  *
  * Représente une entrée de la table Alternatives dans la base de données.
  * Definie par:
  * - L'ID du vote.
  * - L'ID de l'alternative.
  * - Le nom de l'alternative.
  * @author julien
**/
class Alternative extends Model {

  /**
    * L'ID de l'alternative. Non modifiable.
  **/
  private $id;

  /**
    * L'ID du vote dont l'alternative est issue. Non modifiable.
  **/
  private $idVote;

  /**
    * Le nom de l'alternative. Non modifiable.
  **/
  private $nom;

  /**
    * Constructeur de la classe Alternative.
    *
    * Chaque paramètre peut être nul car tous les champs ne sont pas nécessaires suivant les fonctions.
    * @param idVote L'ID du vote dont l'alternative est issue
    * @param id L'ID de l'alternative
    * @param nom Le nom de l'alternative
  */
  public __construct($id = null, $idVote = null, $nom = null) {
    $this->id = $id;
    $this->idVote = $idVote;
    $this->nom = $nom;
    $this->table = 'Alternatives';
  }

  public existeAlternative() {
    $sql = 'SELECT nom FROM Alternatives WHERE id=:id AND ';
    $parametres = array('id' => $this->id);
    $req = $this->executerRequete($sql, $parametre);
    if ($req->rowCount() == 1)
  }
}
