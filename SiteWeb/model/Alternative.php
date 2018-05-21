<?php

/**
  * Charge la classe Model.
**/
require_once('./model/Model.php');

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
    * L'ID de l'alternative. Consultable.
  **/
  public $id;

  /**
    * L'ID du vote dont l'alternative est issue. Non modifiable.
  **/
  private $idVote;

  /**
    * Le nom de l'alternative. Consultable.
  **/
  public $nom;

  /**
    * Constructeur de la classe Alternative.
    *
    * Chaque paramètre peut être nul car tous les champs ne sont pas nécessaires suivant les fonctions.
    * @param id L'ID de l'alternative
    * @param idVote L'ID du vote dont l'alternative est issue
    * @param nom Le nom de l'alternative
  */
  public function __construct($id = null, $idVote = null, $nom = null) {
    $this->id = $id;
    $this->idVote = $idVote;
    $this->nom = $nom;
    $this->table = 'Alternatives';
  }

  public function ajouterAlternative() {
    $sql = 'INSERT INTO Alternatives(id, idVote, nom) VALUES (:id, :idVote, :nom)';
    $parametres = array('id' => $this->id, 'idVote' => $this->idVote, 'nom' => $this->nom);
    $this->executerRequete($sql, $parametres);
  }

  /**
    * Vérifie si l'alternative représentée par l'instance existe dans la base de données.
    * Initialise les champs non connus auparavant si l'alternative existe.
    * @return boolean True si l'alternative existe, false sinon.
  **/
  public function existeAlternative() {
    $sql = 'SELECT nom FROM Alternatives WHERE id=:id AND idVote=:idVote';
    $parametres = array('id' => $this->id, 'idVote' => $this->idVote);
    $req = $this->executerRequete($sql, $parametre);
    if ($req->rowCount() == 1) {
      $this->nom = $req->fetch()['nom'];
      return true;
    }
    else return false;
  }

  /**
    * Récupère les alternatives dans la base de données du vote en paramètre.
  **/
  public static function recupererAlternatives(Vote $vote) {
    $sql = 'SELECT id, idVote, nom FROM Alternatives WHERE idVote = :idVote';
    $parametre = array('idVote' => $vote->id);
    $req = $vote->executerRequete($sql, $parametre);
    while($donnees = $req->fetch()) {
      $tableau[] = new Alternative($donnees['id'], $donnees['idVote'], $donnees['nom']);
    }
    return $tableau;
  }
}
