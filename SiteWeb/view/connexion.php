<?php
/**
	* @author Estelle
**/
$titre = 'Se connecter' ?>

<?php ob_start(); ?>
<div class="container">
	<h2>Se connecter</h2>
	<form method="post" action="/SiteWeb/index.php?action=connexion">
		<p>
			<label for="email">Votre adresse email : </label>
			<input type="email" name="email" id="email" placeholder="Email" autofocus required>
		</p>
		<p>
			<label for="motDePasse">Votre mot de passe : </label>
			<input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe" required>
		</p>
		<p>
			<label for="check"></label>
			<input type="submit" name="check" value="Valider">
		</p>
	</form>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
