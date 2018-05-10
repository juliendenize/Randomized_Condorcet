<?php $title = 'Accueil' ?>

<?php ob_start(); ?>
	<div class="container">
		<a href="new_vote_nb.php" class="btn btn-default" title="Créer un nouveau vote">Nouveau vote</a>
		<a href="running_votes.php" class="btn btn-default" title="Votes en cours">Votes en cours</a>

		<h2>La méthode de Condorcet, qu'est-ce que c'est ?</h2>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/wKimU8jy2a8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

		<footer>
			<a href="mailto:estelle.canovas@telecom-sudparis.eu">Nous contacter</a>
		</footer>
	</div>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
