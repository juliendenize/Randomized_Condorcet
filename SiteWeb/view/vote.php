<?php
/**
	* @author Estelle
**/
$titre = "Consultation Vote"; ?>

<?php ob_start(); ?>
	<div class="container">
		<h1>Titre: <?php echo htmlspecialchars($vote->titre); ?></h1>

		<div class="text-center">
			<p>Date début: <?php echo htmlspecialchars($vote->dateDebut); ?></p>
			<p>Date fin: <?php echo htmlspecialchars($vote->dateFin); ?></p>
			<p>Nom administrateur: <?php echo htmlspecialchars($nomAdmin); ?></p>

		<?php
		if ($vote->type == "public")
		{
			?>
			<div class="text-center">Vote public</div>
			<?php
		}
		else
		{
			?>
			<div class="text-center">Vote privé</div>
			<?php
		}
		?>

		</div>

		<h4>Description du vote: <?php echo htmlspecialchars($vote->description); ?></h4>

		<h3>Alternatives : </h3>

		<?php
			foreach ($alternatives as $alternative)
			{?>
				<p>
					<?php echo htmlspecialchars($alternative->nom); ?>
				</p>
		<?}?>
		<a class="btn btn-default" href="/SiteWeb/index.php?action=voter&amp;idVote=<?php echo htmlspecialchars($vote->id); ?>" role="button">Voter</a>
	</div>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
