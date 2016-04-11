<!DOCTYPE html>
<html>
	<?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
				 <?php
				 if (isset($_SESSION["prenom"])) {
					$prenom = $_SESSION["prenom"];
					echo 'Bienvenue '.$prenom;
				 }
			?>
		<p> <a href="index.php"> Retour au menu principal </a></p>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
