<?php

require_once('./model/Model.php');

class Vote extends Model {
  public $type;
  public $dateDebut;
  public $dateFin;
  public $titre;
  public $statut:
  public $admin;
  public $nbAlternatives;

  public function __construct($option, $dateDebut, $dateFin, $titre, $statut, $admin, $nbAlternatives){
    $this->type = $type;
    $this->dateDebut = $dateDebut;
    $this->dateFin = $dateFin;
    $this->titre= $titre;
    $this->statut= $statut;
    $this->admin = $admin;
    $this->nbAlternatives = $nbAlternatives;
  }

  public function ajouterVote() {
    $sql = 'INSERT INTO Votes(type, dateDebut, dateFin, titre, statut, admin, nbAlternatives) VALUES (:option, :dateDebut, :dateFin, :titre, :statut, :admin, :nbAlternatives)'
    $parametres = array('type' => $this->type,
                        'dateDebut'=> $this->dateDebut,
                        'dateFin' => $this->dateFin,
                        'titre' => $this->titre,
                        'statut' => $this->statut,
                        'admin' => $this->admin,
                        'nbAlternatives' => $this->nbAlternatives);
    $this->executerRequete($sql, $parametres);
    return 'ajoute';
  }
}
