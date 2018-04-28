<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<h2>Inscription</h2>
	<form method="post" action="inscription_traitement.php">
		<p>
			<label for="pseudo">Votre pseudo : </label>
			<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
		</p>
		<p>
			<label for="email">Votre adresse email : </label>
			<input type="email" name="email" id="email" placeholder="Email" autofocus required>
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