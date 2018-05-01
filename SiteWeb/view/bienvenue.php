<?php $title = 'Accueil' ?>

<?php ob_start(); ?>
	<header>
	<h1>Plateforme de vote selon la méthode de Condorcet randomisé</h1>
		<a href="inscription.php" class="btn btn-default">Inscription</a>
		<a href="connexion.php">Se connecter</a>
	</header>

	<nav>
		<a href="new_vote_nb.php" title="Créer un nouveau vote">Nouveau vote</a>
		<a href="running_votes.php" title="Votes en cours">Votes en cours</a>
	</nav>

	<section>
		<h2>La méthode de Condorcet, qu'est-ce que c'est ?</h2>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/wKimU8jy2a8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</section>

	<footer>
		<a href="mailto:estelle.canovas@telecom-sudparis.eu">Nous contacter</a>
	</footer>
<?php ob_get_clean(); ?>

<?php require('template.php'); ?>
