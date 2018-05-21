<?php $titre = 'Votes en cours' ?>

<?php ob_start(); ?>
	<div class="container">
		<h1>Votes en cours</h1>
		<p>
	<?php if ($votes != null){ ?>
		<table class="table table-striped">
			<thead>
				<th>Numéro</th>
				<th>Titre</th>
				<th>Type</th>
				<th>Date début</th>
				<th>Date fin</th>
				<th>Administrateur</th>
				<th>Statut</th>
				<th>Voter</th>
			</thead>
			<tbody>
				<?php
				foreach ($votes as $vote){
				?>
				<tr>
					<td><?php echo htmlspecialchars($vote->id); ?></td>
					<td><a href="/SiteWeb/index.php?action=consulterVote&amp;idVote=<?php echo $vote->id; ?>"><?php echo $vote->titre; ?></td>
					<td><?php echo htmlspecialchars($vote->type); ?></td>
					<td><?php echo htmlspecialchars($vote->dateDebut); ?></td>
					<td><?php echo htmlspecialchars($vote->dateFin); ?></td>
					<td><?php echo htmlspecialchars($vote->getAdmin()); ?></td>
					<td><?php echo htmlspecialchars($vote->statut); ?></td>
					<td>
				<?php
				if ($vote->statut == "ouvert" && isset($_SESSION['id']) && $_SESSION['id'] == $vote->idAdmin){
				?>
						<a class="btn btn-default" href="/SiteWeb/index.php?action=fermerVote&amp;idVote=<?php echo htmlspecialchars($vote->id); ?>" role="button">Clôturer</a>
						<a class="btn btn-default" href="/SiteWeb/index.php?action=voter&amp;idVote=<?php echo htmlspecialchars($vote->id); ?>" role="button">Voter</a>
				<?php
				}
				elseif ($vote->statut == "ouvert"){
				?>
					<a class="btn btn-default" href="/SiteWeb/index.php?action=voter&amp;idVote=<?php echo htmlspecialchars($vote->id); ?>" role="button">Voter</a>
				<?php
				}
				else{
				?>
					<a class="btn btn-default" href="/SiteWeb/index.php?action=resultat&amp;idVote=<?php echo htmlspecialchars($vote->id); ?>" role="button">Résultats</a>
				<?php
				}
				?>
				</td>
			</tbody>
		</table>
	<?php }
	}
	else  echo "Il n'y a aucun vote en cours.";?>
		</p>
	</div>
<?php $contenu = ob_get_clean(); ?>

 <?php require('./view/template.php'); ?>
