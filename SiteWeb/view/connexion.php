<?php $title = 'Se connecter' ?>

<?php ob_start(); ?>
	<h2>Se connecter</h2>
	<form method="post" action="traitement.php">
		<p>
			<label for="email">Votre adresse email : </label>
			<input type="email" name="email" id="email" placeholder="Email" autofocus required>
		</p>
		<p>
			<label for="password">Votre mot de passe : </label>
			<input type="password" name="password" id="password" placeholder="Mot de passe" required>
		</p>
		<p>
			<label for="check"></label>
			<input type="submit" name="check" value="Valider">
		</p>
	</form>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
