<?php

abstract class Choix extends Model {
  private $idVote;
  private $idAlternative;
  private $rang;
  protected $attribut;

  public __construct($idVote = null, $idAlternative = null, $rang = null) {
    $this->id = $id;
    $this->idVote = $idVote;
    $this->idAlternative = $idAlternative;
    $this->rang = $rang;

    public ajouterChoix($valeur) {
      $sql = "INSERT INTO $this->table ($this->attribut, idVote, idAlternative, rang)
              VALUES (:valeur, :idVote, :idAlternative, :rang)";
      $parametres = array('idVote' => $this->idVote, 'idAlternative' => $this->idAlternative,
                          'valeur' => $valeur, 'rang' => $this->rang);
      $this->executerRequete($sql, $parametres);
    }

    public existeChoix($valeur) {
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
}
