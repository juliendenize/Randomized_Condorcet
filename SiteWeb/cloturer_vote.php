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
			$dateFin = DateTime(($bdd->query('SELECT dateFin FROM Votes WHERE id='.$idVote))->fetch());
			$aujourdhui= new DateTime();
			$statut = ($bdd->query('SELECT dateFin FROM Votes WHERE id='.'$idVote'))->fetch();
			if ($aujourdhui->diff($dateFin)>0 && $statut = 'ouvert')
			{	
				exec(java -jar Algo.jar, 'jdbc:mysql://localhost:3306/Condorcet' 'root' '' $idVote);
				try
				{
					$bdd->exec('UPDATE Votes SET statut=ferme WHERE id='.$idVote);
				}

				catch(Exception $e)
				{
					die('Erreur : ' .$e->getMessage());
				}
			}
			elseif ( $statut = 'ferme')
			{
				echo 'Le Vote '.$idVote.' est déjà clôturé.';
			}
			else
			{
				echo $aujourdhui->diff($dateFin)->format('Vous pourrez clôturer le vote dans %d jours');
			}
			
		}
	}
?>
