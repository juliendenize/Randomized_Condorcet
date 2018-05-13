<?php
/**
  *
*/
abstract class Model
{
  private $bdd;

  protected function executerRequete($sql, $parametres = null) {
    if ($parametres == null) {
      $req = $this->dbConnect()->query($sql);
    }
    else {
      $req = $this->dbConnect()->prepare($sql);
      $req->execute($parametres);
    }
    return $req;
  }

  public function existeEntree($table, $attribut, $parametre) {
    $sql = "SELECT $attribut FROM $table WHERE $attribut = :parametre";
    $parametres = array('parametre' => $parametre);
    $req = $this->executerRequete($sql, $parametres);
    if($req->rowCount() >= 1) return true;
    else return false;
  }

  private function dbConnect(){
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=Condorcet;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // à modifier quand on aura un hôte
    }
    catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
  }
}
