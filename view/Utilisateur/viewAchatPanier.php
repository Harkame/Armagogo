<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
        <?php
			setcookie('id_produits', NULL, -1);
			setcookie('types_produits', NULL, -1);
			setcookie('noms_produits', NULL, -1);
			setcookie('prix_produits', NULL, -1);
          echo '<p> Merci de votre achat.</p>'
        ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
