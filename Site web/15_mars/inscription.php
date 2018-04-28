<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
</head>
<body>
	<h2>Inscription</h2>
	<form method="post" action="traitement.php">
		<p>
			<label for="email">Votre adresse email : </label>
			<input type="email" name="email" id="email" placeholder="Email" autofocus required>
		</p>
		<p>
			<label for="pseudo">Votre pseudo : </label>
			<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
		</p>
		<p>	
			<label for="password">Votre mot de passe : </label>
			<input type="password" name="password" id="password" placeholder="Mot de passe" required>
		</p>
		<p>	
			<label for="send"></label>
			<input type="submit" name="submit" value="Envoyer">
		</p>
	</form>

</body>
</html>