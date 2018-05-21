<?php $titre = 'Nouveau vote' ?>

<?php ob_start(); ?>
	<h2>Nouveau vote</h2>
	<form method="post" action="/SiteWeb/index.php?action=nouveauVote">

		<p>
			<label for="titre">Titre du vote : </label>
			<input type="text" name="titre" required autofocus>
		</p>
		<p>
			<label for="description">Pouvez-vous décrire votre vote ?</label><br />
    	<textarea name="description" id="description" rows="5" cols="50"></textarea>
		</p>
		<p>
			Type de vote :
			<input type="radio" name="type" value="private" id="private" required/>
			<label for="private">Vote privé</label>
			<input type="radio" name="type" value="public" id="public"/>
			<label for="public">Vote public</label>
		</p>
		<p>
			<label for="dateDebut">Date de début du vote : </label>
			<input type="date" name="dateDebut" id="dateDebut">
		</p>
		<p>
			<label for="dateFin">Date de fin du vote : </label>
			<input type="date" name="dateFin" id="dateFin">
		</p>
		<p>
			Alternatives : <br />
			<?php
			$nb = 1;
			while ($nb <= $_SESSION['nbAlternatives'])
			{
				?>
				<label for="text">Choix <?php echo $nb; ?> : </label>
				<input type="text" name="choix<?php echo $nb; ?>" id="choix<?php echo $nb; ?>" required><br />
				<?php
				$nb++;
			}
			?>
		</p>
		<p>
			<label for="send"></label>
			<input type="submit" name="submit" value="Envoyer">
		</p>
	</form>
	<?php $contenu = ob_get_clean(); ?>

	<?php require('template.php'); ?>
