<?php $titre = 'Nouveau vote' ?>

<?php ob_start();?>
	<title>Nouveau vote</title>
	<h2>Nouveau vote</h2>
	<form method="post" action="/SiteWeb/index.php?action=nouveauVote">
		<p>
			<label for="nbAlternatives">Entrez le nombre de choix que vous voulez ajouter au vote : </label>
			<input type="number" min="0" max="10" name="nbAlternatives" id="nbAlternatives" placeholder="2" autofocus required>
		</p>

		<p>
			<label for="send"></label>
			<input type="submit" name="submit" value="Continuer">
		</p>

	</form>
</body>
</html>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
