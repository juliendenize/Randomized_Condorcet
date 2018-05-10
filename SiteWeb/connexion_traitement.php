<!DOCTYPE html>
<html>
	<head>
		<title>Traitement connexion</title>
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
			if(!empty($_POST['email']) && !empty($_POST['password']))
			{
				$email = htmlentities($_POST['email'], ENT_QUOTES, "ISO-8859-1");
				$password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");

				try
				{
					$req = $bdd->prepare("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");

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
						
			// Redirection de l'utilisateur vers la page d'accueil
			header('Location: index.php');
		?>
			
	</body>
</html>
