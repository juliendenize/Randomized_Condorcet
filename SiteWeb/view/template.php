<!DOCTYPE>
<html>
  <head>
    <title><?= $titre ?></title>

    <link rel="stylesheet" type="text/css" href="SiteWeb/public/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
            <li> <a href="/SiteWeb/index.php">Accueil</a></li>
            <li> <a href="/SiteWeb/index.php?action=tousLesVotes">Votes en cours</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
					<?php
					if (isset($_SESSION['pseudo'])){
					?>
						<li><a><?php echo htmlspecialchars($_SESSION['pseudo']);?></a></li>
						<li><a href="/SiteWeb/index.php?action=deconnexion">Déconnexion</a></li>
					<?php
					}
					else{
						?>
						<li> <a href="/SiteWeb/index.php?action=connexion">Connexion</a></li>
						<li> <a href="/SiteWeb/index.php?action=inscription">Inscription</a></li>
					<?php
					}
					?>
				</ul>
      </div>
    </div>
  </nav>
    <?= $contenu ?>
  </body>
</html>
