<?php

/**
  * Classe abstraite Model.
  *
  * Permet de se connecter facilement à la base de donnée en implémentant des classes
  * filles.
  * Définie par:
  * - la table initialisée par les classes filles.
  * @author julien
**/

abstract class Model
{
  /**
    * La table définie par les classes filles. Permet de les identifier dans la base de données et ne sera pas modifiable.
  **/
  protected $table;

  /**
    * Exécute une requête SQL et retourne le résultat.
    *
    * @param sql La requête SQL
    * @param parametres Les paramètres de la requête (optionnels)
    * @return req Le résultat de la requête
  **/
  public function executerRequete($sql, $parametres = null) {
    if ($parametres == null) {
      $req = $this->dbConnect()->query($sql);
    }
    else {
      $req = $this->dbConnect()->prepare($sql);
      $req->execute($parametres);
    }
    return $req;
  }

  /**
    * Vérifie si une entrée existe selon un attribut et sa valeur.
    *
    * @param attribut L'attribut à parcourir
    * @param parametre La valeur à chercher
    * @return boolean Renvoie true si l'entrée existe et false sinon
  **/
  public function existeEntree($attribut, $parametre) {
    $sql = "SELECT $attribut FROM $this->table WHERE $attribut = :parametre";
    $parametres = array('parametre' => $parametre);
    $req = $this->executerRequete($sql, $parametres);
    if($req->rowCount() >= 1) return true;
    else return false;
  }

  /**
    * Connecte à la base de données.
    *
    * @return bdd La base de données
  **/
  private function dbConnect(){
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=Condorcet;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // à modifier quand on aura un hôte
    }
    catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
  }
}
