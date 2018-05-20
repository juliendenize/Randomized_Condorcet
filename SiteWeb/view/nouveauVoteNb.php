<?php $title = 'Nouveau vote' ?>

<?php ob_start(); ?>
	<title>Nouveau vote</title>
	<h2>Nouveau vote</h2>
	<form method="post" action="index.php?action=nouveauVote">
		<p>
			<label for="nb_vote">Entrez le nombre de choix que vous voulez ajouter au vote : </label>
			<input type="tel" name="nbVote" id="nbVote" placeholder="2" autofocus required>
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
