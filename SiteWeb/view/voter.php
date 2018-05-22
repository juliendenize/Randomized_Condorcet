<?php
/**
	* @author Estelle
**/
$titre = 'Voter' ?>

<?php ob_start(); ?>
	<div class="container">
		<h1>Voter</h1>
		<h2>Titre: <?php echo htmlspecialchars($vote->titre); ?></h2>
		<h4>Description du vote: <?php echo htmlspecialchars($vote->description); ?></h4>
		<em>Pour voter, rien de plus simple ! Attribuez à chaque alternative un rang. Notez 1 pour votre premier choix.</em>
		<form method="post" class="form-group" action="/SiteWeb/index.php?action=voter&amp;idVote=<?php echo htmlspecialchars($vote->id); ?>">
			<table>
			<tbody>
				<?php
				foreach ($alternatives as $alternative)
				{
					?>
					<tr>
						<label for="alternative<?php echo htmlspecialchars($alternative->nom); ?>"><?php echo htmlspecialchars($alternative->nom); ?> : </label>
						<input type="number" min="1" max="<?php htmlspecialchars($vote->nbAlternatives);?>" class="form-control" name="alternative<?php echo htmlspecialchars($alternative->id); ?>" id="alternative<?php echo htmlspecialchars($alternative->id);?>" autofocus required>
					</tr>
					<?php
				}
				?>
			</tbody>
			<p>
				<label for="check"></label>
				<input type="submit" class="btn btn-default" name="check" value="Valider">
			</p>
		</table>
		</form>
	</div>
<?php $contenu = ob_get_clean(); ?>
<?php require('template.php'); ?>
