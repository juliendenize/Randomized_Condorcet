<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=condorcet;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // à modifier quand on aura un hôte
	}
		
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	$idVote = $_POST['idVote'];
	if (!empty($_POST['idVote']))
	{
		try
		{
			$resultat = ($bdd->query('SELECT nomAlternative FROM Votes WHERE idVote='.$idVote))->fetch();
			if ($resultat != null)
			{
				return  $resultat;
			}
			else
			{
			echo 'Le vote '.$idVote.'n\'est pas encore clôturé';
		}
		catch(Exception $e)
		{
			die('Erreur : ' .$e->getMessage());
		}
	}
?>
