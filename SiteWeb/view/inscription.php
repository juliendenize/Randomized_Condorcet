<?php $titre = 'Inscription' ?>

<?php ob_start(); ?>
	<h2>Inscription</h2>
	<form method="post" action="index.php?action=inscription">
		<p>
			<label for="pseudo">Votre pseudo : </label>
			<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
		</p>
		<p>
			<label for="email">Votre adresse email : </label>
			<input type="email" name="email" id="email" placeholder="Email" autofocus required>
		</p>
		<p>
			<label for="motDePasse">Votre mot de passe : </label>
			<input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe" required>
		</p>
		<p>
			<label for="send"></label>
			<input type="submit" name="submit" value="Envoyer">
		</p>
	</form>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
