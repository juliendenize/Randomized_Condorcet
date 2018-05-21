<?php $titre = "Consultation Vote"; ?>

<?php ob_start(); ?>
	<div class="container">
		<h1><?php echo htmlspecialchars($vote->titre); ?></h1>

		<div class="text-center">
			<p><?php echo htmlspecialchars($vote->dateDebut); ?></p>
			<p><?php echo htmlspecialchars($vote->dateFin); ?></p>
			<p><?php echo htmlspecialchars($vote->idAdmin); ?></p>

		<?php
		if ($vote->type == "public")
		{
			?>
			<div class="text-right">Public</div>
			<?php
		}
		else
		{
			?>
			<div class="text-right">Privé</div>
			<?php
		}
		?>

		</div>

		<h4><?php echo htmlspecialchars($vote->description); ?></h4>

		<h3>Alternatives : </h3>

		<?php
			foreach ($alternatives as $alternative)
			{?>
				<p>
					<?php echo htmlspecialchars($alternative->nom); ?>
				</p>
		<?}?>

	</div>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>
