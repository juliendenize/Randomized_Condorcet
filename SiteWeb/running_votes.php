<!DOCTYPE html>
<html>
<head>
	<title>Votes en cours</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		body { padding-top: 70px; }
	</style>

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Vote à la Condorcet</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li> <a href="index.php">Accueil</a></li>
					<li> <a href="running_votes.php">Votes en cours</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li> <a href="connexion.php">Connexion</a></li>
					<li> <a href="inscription.php">Inscription</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<h1>Votes en cours</h1>
		<p>
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
				foreach ($Votes as $Vote)
				{
				?>
				<tr>
					<td><?php echo $Vote->id; ?></td>
					<td><a href="votes.php?foo=<?php echo $Vote->id; ?>"><?php echo $Vote->titre; ?></td>
					<td><?php echo $Vote->type; ?></td>
					<td><?php echo $Vote->dateDebut; ?></td>
					<td><?php echo $Vote->dateFin; ?></td>
					<td><?php echo $Vote->statut; ?></td>
					<td><?php echo $Vote->admin; ?></td>
					<td><a class="btn btn-default" href="voter?foo=<?php echo $Vote->id; ?>" role="button">Voter</a></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		</p>
	</div>

</body>
</html>