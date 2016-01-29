<!DOCTYPE html>
<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
		<form method="post" action="../controller/controllerUtilisateur.php?action=created">
			<fieldset>
				 <?php
						echo 'Mauvaise mot de passe';
				?>
			</fieldset>
		</form>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
