<!DOCTYPE html>
<html>
	<?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
		<form method="post" action="index.php?menu=utilisateur&action=connected">
			<fieldset>
				<legend>Connexion</legend> <p>
				<label for="mail">Mail</label> :
				<input type="text" name="mail" id="mail" required/>
				</p> <p>
				<label for="password">Password</label> :
				<input type="password" name="password" id="password" required/>
				</p> <p>
				<input type="submit" value="Se connecter" /> </p>
			</fieldset>
		</form>
	<p><a href="index.php?menu=utilisateur&action=create">Pas encore de compte ?</a></p>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
