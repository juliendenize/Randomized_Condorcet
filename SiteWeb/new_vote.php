<!DOCTYPE html>
<html>
<head>
	<title>Nouveau vote</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<h2>Nouveau vote</h2>
	<form method="post" action="new_vote_traitement.php">

		<p>
			<label for="title">Titre du vote : </label>
			<input type="text" name="title" required autofocus>
		</p>	
		<p>
			Type de vote : 
			<input type="radio" name="type_vote" value="private" id="private" required/>
			<label for="private">Vote privé</label>
			<input type="radio" name="type_vote" value="public" id="public"/>
			<label for="public">Vote public</label>
		</p>
		<p>
			<label for="date_begin">Date de début du vote : </label>
			<input type="date" name="date_begin" id="date_begin">
		</p>
		<p>
			<label for="date_end">Date de fin du vote : </label>
			<input type="date" name="date_end" id="date_end">
		</p>
		<p>
			Alternatives : <br />
			<?php
			$nb_vote = $_GET['nb_vote'];
			$nb = 1;
			while ($nb <= $nb_vote)
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

</body>
</html>