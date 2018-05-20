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
		<h1>Voter</h1>
		<h2><?php echo $Vote->titre; ?></h2>

		<em>Pour voter, rien de plus simple ! Attribuez à chaque alternative un rang. Notez 1 pour votre premier choix.</em>
		<form method="post" class="form-group" action="voter_traitement.php?foo=<?php echo $Vote; ?>">
			<table>
			<tbody>
				<?php
				$i=1;
				foreach ($Alternatives as $Alternative)
				{
					?>
					<tr>
						<label for=alternative<?php echo $i; ?> >Alternative <?php echo $i; ?> : </label>
						<input type="tel" class="form-control" name="alternative<?php echo $i; ?>" id="alternative<?php echo $i; ?>" autofocus>
					</tr>
					<?php
					$i++;
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

</body>
</html>