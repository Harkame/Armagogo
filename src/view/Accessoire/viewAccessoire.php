<!DOCTYPE html>

<html>
    <?php include ("view/Generic/Header.php")?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php")?>
        <?php
								echo '<p> ' . $v->getnom () . '</p>';
								echo '<p>' . $v->getprix () . ' euros</p>';
								echo '<p> Description : ' . $v->getdescription () . '</p>';
								
								if (isset ( $_SESSION ['admin'] )) {
									if ($_SESSION ['admin'] == 0) {
									} else {
										echo '<p> Supprimer accessoire <a href="index.php?menu=accessoires&action=delete&id=' . $v->getid () . '">' . $v->getNom () . ' ' . $v->getPrix () . ' euros</a></p>';
									}
								}
								
								echo '<p><a href="index.php?menu=accessoires&action=add&id=' . $v->getid () . '"> Ajouter au panier  </a></p>';
								
								?>
    <?php include ("view/Generic/Footer.php")?>
</html>
