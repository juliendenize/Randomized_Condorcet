<!DOCTYPE html>
<html>
<head>
	<title>Nouveau vote</title>
</head>
<body>
	<h2>Nouveau vote</h2>
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
			Type de vote : 
			<input type="radio" name="type_vote" value="private" id="private"/>
			<label for="private">Vote privé</label>
			<input type="radio" name="type_vote" value="public" id="public"/>
			<label for="public">Vote public</label>
		</p>
		<p>
			Alternatives : <br />
			<label for="text">Choix 1 : </label>
			<input type="text" name="choix1" id="choix1"><br />
			<label for="text">Choix 2 : </label>
			<input type="text" name="choix2" id="choix2"><br />
			<label for="text">Choix 3 : </label>
			<input type="text" name="choix3" id="choix3"><br />
			<label for="text">Choix 4 : </label>
			<input type="text" name="choix4" id="choix4"><br />
			<label for="text">Choix 5 : </label>
			<input type="text" name="choix5" id="choix5"><br />
		</p>
		<p>
			<label for="send"></label>
			<input type="submit" name="submit" value="Envoyer">
		</p>
	</form>

</body>
</html>