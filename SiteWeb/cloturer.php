<?php 
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=condorcet;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // à modifier quand on aura un hôte
	}

	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	$idVote = $_GET[$vote->id];
	try
	{
		$fermeture = $bdd->exec('UPDATE votes SET statut = "fermé" WHERE id = <?php echo $idVote; ?>');
	}

	catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
?>