<!DOCTYPE html>
<html>
<head>
	<title>Se connecter</title>
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
					<li class="active"> <a href="connexion.php">Connexion</a></li>
					<li> <a href="inscription.php">Inscription</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<h1><?php echo $Vote->titre; ?></h1>

		<div class="text-center">
			<p><?php echo $Vote->dateDebut; ?></p>
			<p><?php echo $Vote->dateFin; ?></p>
			<p><?php echo $Vote->admin; ?></p>

		<?php
		if ($Vote->type == "public")
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

		<h4><?php echo $Vote->description; ?></h4>

		<h3>Alternatives : </h3>

		<?php
			foreach ($Alternatives as $Alternative)
			{
				echo $Alternatives->Alternative;
			}
		?>

	</div>
</body>
</html>