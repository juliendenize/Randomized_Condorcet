<?php

require_once('Model');
/**
 *
 */
class Inscrit extends Model
{

  private $pseudo;
  private $email;
  private $motDePasse

  public function __construct($pseudo, $email, $motDePasse)
  {
    this->$pseudo = $pseudo;
    this->$email = $email;
    this->$motDePasse = $motDePasse;
  }

  public function inscrire() {
    $sql = 'SELECT email FROM Inscrits WHERE email = :email';
    $parametres = array('email' => this->email);
    $req = this->executerRequete($sql, $parametres);
    if($requete -> fetch()) {
      return 'email';
    }
    else {
      $req->closeCursor();
      $sql = 'SELECT pseudo FROM Inscrits WHERE pseudo = :pseudo'
      $parametres = array('pseudo' => this->pseudo)
      $req = this->executerRequete($sql, $parametres)
      if($requete -> fetch()) {
        return 'pseudo';
      }
      else {
        $req = $bdd->prepare('INSERT INTO Inscrits (pseudo, email, motDePasse) VALUES (:pseudo, :email, :motDePasse)');
        $req->execute(array(
          'pseudo' => this->pseudo,
          'email' => this->email,
          'password' => this->password));
        return 'inscrit';
      }
    }
  }
}
