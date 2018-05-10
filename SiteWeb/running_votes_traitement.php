<!DOCTYPE html>
<html>
	<head>
		<title>Traitement nouveau vote</title>
	</head>
	<body>
		<?php
			// Connexion à la table
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=condorcet;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // à modifier quand on aura un hôte
			}
		
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}

			$req = $bdd->prepare('SELECT * FROM votes WHERE type_vote = "public" AND ((SELECT (DATE_FORMAT(NOW(), %d, %m, %Y))) BETWEEN ? AND ?)');



				//* FROM votes WHERE type_vote = "public" AND ((SELECT CONVERT (date, GETDATE())) BETWEEN ? AND ?)');

			$req->execute(array($_GET['date_begin'], $_GET['date_end']));

			if(!$req)
			{
				echo "Aucun vote à afficher pour le moment. </br>
				N'hésitez pas à créer un vote.";
				echo '<a href="new_vote_nb.php" class="btn btn-default" title="Créer un nouveau vote">Nouveau vote</a>';
			}
			else
			{
				while ($donnees = $req->fetch())
				{
					echo $donnees['title'];
					echo $donnees['date_begin'];
					echo $donnees['date_end'];
				}

			}			

			$req->closeCursor();

		?>