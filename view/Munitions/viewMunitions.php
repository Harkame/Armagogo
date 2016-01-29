<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php")?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php")?>
        <?php
								 echo '<p> '.$v->getquantite().' munitions : '.$v->getnom().' </p>';
								echo '<p>' . $v->getprix () . ' euros</p>';
								echo '<p> Description : ' . $v->getDescription () . '</p>';
								
								if (isset ( $_SESSION ['admin'] )) {
									if ($_SESSION ['admin'] == 0) {
									} else {
										echo '<p> Supprimer munition <a href="index.php?menu=munitions&action=delete&id=' . $v->getid () . '">' . $v->getNom () . ' ' . $v->getPrix () . ' euros</a></p>';
									}
								}
								echo '<p><a href="index.php?menu=munitions&action=add&id=' . $v->getid () . '"> Ajouter au panier  </a></p>';
								
								?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php")?>
</html>
