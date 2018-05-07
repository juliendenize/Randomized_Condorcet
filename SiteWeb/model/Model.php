<?php
/**
  *
*/
abstract class Model
{
  private bdd;

  protected function executerRequete($sql, $parametres = null) {
    if ($parametres == null) {
      $resultat = $this->getBDD()->query($sql)
    }
    else ($parametres == null) {
      $resultat = $this->getBDD()->prepare($sql)
      $resultat->execute($parametres)
    }
    return $resultat;
  }
  private function dbConnect()
  {
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=condorcet;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // à modifier quand on aura un hôte
    }

    catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
  }
}
