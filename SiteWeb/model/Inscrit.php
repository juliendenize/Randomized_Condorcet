<?php

require_once('./model/Model.php');

class Inscrit extends Model
{

  public $pseudo;
  public $email;
  private $motDePasse;

  public function __construct($email, $motDePasse, $pseudo = null)
  {
    $this->pseudo = $pseudo;
    $this->email = $email;
    $this->motDePasse = $motDePasse;
  }

  public function inscrire() {
    $sql = 'INSERT INTO Inscrits (pseudo, email, motDePasse) VALUES (:pseudo, :email, :motDePasse)';
    $parametres = array(
        'pseudo' => $this->pseudo,
        'email' => $this->email,
        'motDePasse' => $this->motDePasse);
    $req = $this->executerRequete($sql, $parametres);
    }

  public function existeCompte() {
    $sql = 'SELECT pseudo, email, motDePasse FROM Inscrits
            WHERE email = :email AND motDePasse = :motDePasse';
    $parametres = array('email' => $this->email, 'motDePasse' => $this->motDePasse);
    $req = $this->executerRequete($sql, $parametres);
    if($req->rowCount() == 1) {
      $this->pseudo = $req->fetch()['pseudo'];
      return $this->pseudo;
    }
    else return false;
  }

  public function connecter() {
    $_SESSION['connexion'] = true;
    $_SESSION['pseudo'] = $this->pseudo;
  }

  public static function deconnecter() {
    session_unregister('connexion');
    session_unregister('pseudo');
  }
}
