<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php")?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php")?>
        <?php
								echo '<br></br>';
								echo 'L historique de vos commandes';
								foreach ( $v as $produit ) {
										echo '<br></br>';
									echo $produit->getnomproduit();;
								}
								?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php")?>
</html>
