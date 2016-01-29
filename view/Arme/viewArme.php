<!DOCTYPE html>
<html>  
<?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php")?>
 <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php")?>
  <?php
		echo '<p> ' . $v->getNom () . ' de calibre ' . $v->getCalibre () . ' </p>';
		echo '<p>' . $v->getPrix () . ' euros</p>';
		echo '<p> Description : ' . $v->getDescription () . '</p>';
		if (isset ( $_SESSION ['admin'] )) {
			if ($_SESSION ['admin'] == 0) {
			} else {
				echo '<p> Supprimer Arme <a href="index.php?menu=armes&action=delete&id=' . $v->getid () . '">' . $v->getNom () . '</a></p>';
			}
		}
		echo '<p><a href="index.php?menu=armes&action=add&id=' . $v->getid () . '"> Ajouter au panier  </a></p>';
		?>
 <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php")?>
</html>
