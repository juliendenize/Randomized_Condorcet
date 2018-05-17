<!DOCTYPE html>
<html>
	<head>
		<title>Traitement inscription</title>
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

			// Insertion de l'utilisateur à l'aide d'une requête préparée
			if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']))
			{
				$pseudo = $_POST['pseudo'];
				$email = $_POST['email'];
				$password = $_POST['password'];

				try
				{
					$req = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :password)');
					$req->execute(array(
						'pseudo' => $pseudo,
						'email' => $email,
						'password' => $password));
				}

				catch(Exception $e)
				{
					die('Erreur : ' .$e->getMessage());
				}
			}
			
			echo 'Tu as bien été ajouté à la base de données !';
			// Redirection de l'utilisateur vers la page d'accueil
			header('Location: index.php');
		?>
			
	</body>
</html>
