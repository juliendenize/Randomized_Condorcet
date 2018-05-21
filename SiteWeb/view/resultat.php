<?php
/**
	* @author Estelle
**/
$titre = 'Accueil'; ?>

<div class="container">

	<h1>Résultats du vote : <?php echo htmlspecialchars($vote->titre); ?></h1>
	<h3><?php echo htmlspecialchars($vote->description); ?></h3>
	<?php
		if ($vote->statut == "ferme"){ ?>
		<p>Après un grand suspense, le vainqueur de ce vote est : <?php echo htmlspecialchars($nomVainqueur); ?>.</p>

		<p>Les autres alternatives étaient :
		<?php foreach ($alternatives as $alternative) {
						if ($alternative->nom != $nomVainqueur){
							echo '<p><strong>'.htmlspecialchars($alternative->nom).'</strong>.</p>';
						}
				} ?>
			</p>

			<p>L'administrateur de ce vote <?php echo htmlspecialchars($vote->getAdmin()); ?> remercie tous les votants !</p>

			<p>Pour voir d'autres votes, c'est <a href="/SiteWeb/index.php?action=tousLesVotes">ici</a>.</p>
		<?php
		}
		else{
		?>
			<p>Le vote n'est pas encore terminé...</p>

			<p>Les différentes alternatives sont les suivantes : </p>
			<p><?php foreach ($alternatives as $alternative) {
					echo '<p><strong>'.htmlspecialchars($alternative->nom).'</strong></p>';
				} ?></p>

			<p>Mais vous pouvez voir d'autres votes <a href="/SiteWeb/index.php?action=tousLesVotes">ici</a>.</p>
		<?php
		}
		?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
