<?php
/**
	* @author Estelle
**/
$titre = 'Accueil' ?>

<?php ob_start(); ?>
	<div class="container">
		<a href="/SiteWeb/index.php?action=nouveauVote" class="btn btn-default" title="Créer un nouveau vote">Nouveau vote</a>
		<a href="/SiteWeb/index.php?action=tousLesVotes" class="btn btn-default" title="Votes en cours">Votes en cours</a>

		<h2>La méthode de Condorcet, qu'est-ce que c'est ?</h2>
		<p>La méthode de Condorcet est un système de votes avec lequel le vote ne se fait pas en choisissant un gagnant mais en <strong>ordonnant</strong> les différentes alternatives possibles. Les opinions pris en compte sont donc plus larges, et le vote se veut plus représentatif, et plus <strong>démocratique</strong>.</p>
		<p>Pour plus de détails, regardez la vidéo ci-dessous : </p>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/wKimU8jy2a8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

		<footer>
			<a href="mailto:estelle.canovas@telecom-sudparis.eu">Nous contacter</a>
		</footer>
	</div>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
