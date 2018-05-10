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

			// Création du vote à l'aide d'une requête préparée
			//$nb_vote = $_GET['nb_vote'];
			if(!empty($_POST['title']) && !empty($_POST['type_vote']) && !empty($_POST['date_begin']) && !empty($_POST['date_end']))
			{
				$title = $_POST['title'];
				$type_vote = $_POST['type_vote'];
				$date_begin = $_POST['date_begin'];
				$date_end = $_POST['date_end'];				

				if (date('d-m-Y') < $date_begin)
				{
					$statute = "Nom commencé";
				}
				elseif (date('d-m-Y') > $date_end) 
				{
					$statute = "Terminé";
				}
				else
				{
					$statute = "En cours" ;
				}

				try
				{
					$req = $bdd->prepare('INSERT INTO votes(title, nb_vote, type_vote, date_begin, date_end, statute) VALUES (:title, :nb_vote, :type_vote, :date_begin, :date_end, :statute)');
					$req->execute(array(
						'title' => $title,
						'nb_vote' => $nb_vote,
						'type_vote' => $type_vote,
						'date_begin' => $date_begin,
						'date_end' => $date_end,
						'statute' => $statute));
				}

				catch(Exception $e)
				{
					die('Erreur : ' .$e->getMessage());
				}
			}
			
			// Ajout des alternatives du vote
			$nb = 1;
			while ($nb <= $nb_vote)
			{
				$choix = $_POST['choix<?php echo $nb; ?>'];
				try
				{
					$req = $bdd->prepare('INSERT INTO alternatives(choix) VALUES (:choix)');
					$req->execute(array(
						'choix' => $choix));
				}

				catch(Exception $e)
				{
					die('Erreur : ' .$e->getMessage());
				}

				$nb++;
			}

			echo 'Votre vote a bien été ajouté !';
			// Redirection de l'utilisateur vers la page d'accueil
			header('Location: index.php');
		?>
			
	</body>
</html>
