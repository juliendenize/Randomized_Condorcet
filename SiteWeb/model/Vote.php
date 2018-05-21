<?php

/**
  * Charge la classe Model.
**/
require_once('./model/Model.php');

/**
  * Charge la classe Inscrit.
**/
require_once('./model/Inscrit.php');

/**
  * Classe Vote.
  *
  * Représente une entrée de la table Vote dans la base de données.
  *
  * Hérite de la classe abstraite Model.
  * Définie par:
  * - L'ID du vote.
  * - La description du vote.
  * - Le type de vote.
  * - La date de début.
  * - La date de fin.
  * - Le statut du vote.
  * - L'administrateur du vote.
  * - Le nombre d'alternatives.
  * @author julien
**/
class Vote extends Model {
  /**
    * L'id du vote. Consultable.
  **/
  public $id;

  /**
    * Le titre du vote. Consultable.
  **/
  public $titre;

  /**
    * La description du vote.
  **/
  public $description;

  /**
    * Le type de vote. Consultable.
  **/
  public $type;

  /**
    * Le nombre d'alternatives. Consultable.
  **/
  public $nbAlternatives;

  /**
    * La date de début du vote. Consultable.
  **/
  public $dateDebut;

  /**
    * La date de fin du vote. Consultable.
   **/
  public $dateFin;

  /**
    * Le statut du vote c'est à dire pas commencé, en cours ou fermé. Consultable.
  **/
  public $statut;

  /**
    * L'ID du créateur et administrateur du vote. Consultable.
  **/
  public $idAdmin;

  /**
    * Constructeur de la classe Vote.
    *
    * Chaque paramètre peut être nul car tous les champs ne sont pas nécessaires suivant la fonction.
    *
    * @param id L'ID du vote
    * @param titre Le titre du vote
    * @param description La description du vote
    * @param type L'option de Vote
    * @param nbAlternatives Le nombre d'alternatives du vote
    * @param dateDebut La date de début du vote
    * @param dateFIn La date de fin du vote
    * @param statut Le statut du vote
    * @param idAdmin L'ID de l'administrateur du vote
  **/
  public function __construct($id = null, $titre = null, $description = null, $type = null, $nbAlternatives = null, $dateDebut = null, $dateFin = null,$statut = null, $idAdmin = null){
    $this->id = $id;
    $this->titre= $titre;
    $this->description = $description;
    $this->type = $type;
    $this->nbAlternatives = $nbAlternatives;
    $this->dateDebut = $dateDebut;
    $this->dateFin = $dateFin;
    $this->statut= $statut;
    $this->idAdmin = $idAdmin;
    $this->table = 'Votes';
  }

  /**
    * Ajoute le vote représenté par l'instance dans la base de données.
  **/
  public function ajouterVote() {
    $sql = 'INSERT INTO Votes(titre, description, type, nbAlternatives, dateDebut, dateFin, statut, idAdmin)
            VALUES (:titre, :description, :type, :nbAlternatives, :dateDebut, :dateFin, :statut, :idAdmin)';
    $parametres = array('titre' => $this->titre,
                        'description' => $this->description,
                        'type' => $this->type,
                        'nbAlternatives' => $this->nbAlternatives,
                        'dateDebut'=> $this->dateDebut,
                        'dateFin' => $this->dateFin,
                        'statut' => $this->statut,
                        'idAdmin' => $this->idAdmin,
                        );
    $this->executerRequete($sql, $parametres);
  }

  /**
    * Vérifie si l'ID d'un vote existe dans la base de données.
    * Initialise les champs du vote si c'est le cas et renvoie true, sinon renvoie false.
    * @return boolean True Si l'ID du vote est dans la base de données, false sinon.
  **/
  public function existeVote() {
    $sql = "SELECT titre, description, type, nbAlternatives, dateDebut, dateFin, statut, idAdmin
            FROM Votes WHERE id = $this->id";
    $req = $this->executerRequete($sql);
    if($req->rowCount() == 1) {
      $donnees = $req->fetch();
      $this->titre = $donnees['titre'];
      $this->description = $donnees['description'];
      $this->type = $donnees['type'];
      $this->nbAlternatives = $donnees['nbAlternatives'];
      $this->dateDebut = $donnees['dateDebut'];
      $this->dateFin = $donnees['dateFin'];
      $this->statut = $donnees['statut'];
      $this->idAdmin = $donnees['idAdmin'];
      return true;
    }
    else return false;
  }

  /**
    * Initialise l'ID du vote dont c'est l'instance. On ne teste pas l'existence car on la connait.
    *
    * @return idVote L'ID du vote
  **/
  public function initialiseIdVote() {
    $sql = "SELECT id FROM Votes WHERE titre = :titre";
    $parametre = array('titre' => $this->titre);
    $req = $this->executerRequete($sql, $parametre);
    $this->id = $req->fetch()['id'];
  }
  /**
    * Récupère les votes dans la base de données dont l'utilisateur a accès.
    *
    * @param utilisateur null si il n'y a pas d'utilisateur connecté, sinon utilisateur connecté
    * @return array Tableau contenant les votes.
  **/
  public static function recupererVotes(Inscrit $utilisateur = null) {
    if($utilisateur == null) {
      //Pour pouvoir accéder à la méthode executerRequete
      $utilisateur = new Inscrit(null, null);
      $sql = 'SELECT id, titre, description, type, nbAlternatives, dateDebut, dateFin, statut, idAdmin
              FROM Votes
              WHERE type=\'public\'';
      $req = $utilisateur->executerRequete($sql);
    }
    else{
      //Le OR type='prive' devra être supprimé lorsque les votants pourront être sélectionnés.
      $sql = 'SELECT V.id as id, titre, description, type, nbAlternatives, dateDebut, dateFin, statut, idAdmin
              FROM Votes V JOIN VotantsPrives ON V.id = idVote JOIN Inscrits I ON idInscrit = I.id
              WHERE pseudo = :pseudo
              UNION
              SELECT id, titre, description, type, nbAlternatives, dateDebut, dateFin, statut, idAdmin
              FROM Votes
              WHERE type=\'public\' or type =\'prive\'';
      $parametres = array('pseudo' => $utilisateur->pseudo);
      $req = $utilisateur->executerRequete($sql, $parametres);
    }
    if($req->rowCount() == 0) return null;
    while($donnees = $req->fetch()) {
      $tableau[] = new Vote($donnees['id'], $donnees['titre'], $donnees['description'], $donnees['type'],
                            $donnees['nbAlternatives'], $donnees['dateDebut'], $donnees['dateFin'],
                            $donnees['statut'],$donnees['idAdmin']);
    }
    return $tableau;
  }

  /**
    * Récupère le pseudo de l'administrateur du vote représenté par l'instance.
  **/
  public function getAdmin() {
    $sql = 'SELECT pseudo FROM Inscrits WHERE id=:idAdmin';
    $parametre = array('idAdmin' => $this->idAdmin);
    return $this->executerRequete($sql, $parametre)->fetch()['pseudo'];
  }
}
