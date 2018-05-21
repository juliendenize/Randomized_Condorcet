<?php

/**
  * Charge la classe Model.
**/
require_once('./model/Model.php');

/**
  * Classe Inscrit.
  *
  * Représente une entrée de la table Inscrits dans la base de données.
  * Hérite de la classe Model.
  * Définie par:
  * - L'ID de l'isncrit.
  * - Son pseudo.
  * - Son email.
  * - Son mot de passe.
  * @author julien
**/
class Inscrit extends Model
{
  /**
    * L'ID de l'inscrit. Consultable.
  **/
  public $id;

  /**
    * Le pseudo de l'inscrit. Consultable.
  **/
  public $pseudo;

  /**
    * Le mail de l'inscrit. Consultable.
  **/
  public $email;

  /**
    * Le mot de passe de l'inscrit. Non modifiable.
  **/
  private $motDePasse;

  /**
    * Constructeur de la classe Inscrit.
    *
    * Chaque paramètre peut être à nul car tous les champs ne sont pas nécessaires suivant les fonctions à utiliser.
    *
    * @param id L'ID de l'inscrit
    * @param pseudo Le pseudo de l'inscrit
    * @param email L'email de l'inscrit
    * @param motDePasse Mot de passe de l'inscrit
    * @author julien
  **/
  public function __construct($id = null, $pseudo = null, $email = null, $motDePasse = null)
  {
    $this->id=$id;
    $this->pseudo = $pseudo;
    $this->email = $email;
    $this->motDePasse = $motDePasse;
    $this->table = 'Inscrits';
  }

  /**
    * Ajoute l'utilisateur représenté par l'instance dans la base de données.
  **/
  public function inscrire() {
    $sql = 'INSERT INTO Inscrits (pseudo, email, motDePasse) VALUES (:pseudo, :email, :motDePasse)';
    $parametres = array(
        'pseudo' => $this->pseudo,
        'email' => $this->email,
        'motDePasse' => $this->motDePasse);
    $req = $this->executerRequete($sql, $parametres);
    }

  /**
    * Vérifie si le compte représenté par l'instance existe déjà dans la base de données par l'email et le mot de passe.
    * Initialise les autres champs si c'est le cas et renvoie true, sinon renvoei false.
    * @return boolean True si l'entrée avec l'email et le mot de passe sont dans la base de données et false sinon.
  **/
  public function existeCompte() {
    $sql = 'SELECT id, pseudo, email, motDePasse FROM Inscrits
            WHERE email = :email AND motDePasse = :motDePasse';
    $parametres = array('email' => $this->email, 'motDePasse' => $this->motDePasse);
    $req = $this->executerRequete($sql, $parametres);
    if($req->rowCount() == 1) {
      $donnees = $req->fetch();
      $this->pseudo = $donnees['pseudo'];
      $this->id = $donnees['id'];
      return true;
    }
    else return false;
  }

  /**
    * Connecte l'inscrit représenté par l'instance.
  **/
  public function connecter() {
    $_SESSION['pseudo'] = $this->pseudo;
    $_SESSION['email'] = $this->email;
    $_SESSION['id'] = $this->id;
  }

  /**
    * Déconnecte l'inscrit représenté par l'instance.
  **/
  public static function deconnecter() {
    unset($_SESSION['pseudo']);
    unset($_SESSION['email']);
    unset($_SESSION['id']);
  }
}
