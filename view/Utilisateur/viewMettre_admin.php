<!DOCTYPE html>
	<?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
		<form method="post" action="index.php?menu=utilisateur&action=admin_mis">
			<fieldset>
				<legend>Formulaire :</legend> <p>
				<label for="mail">Mail</label> :
				<input type="text" placeholder="Ex :jeanestpasla@perdu.com" name="mail" id="mail" required/>
				</p> <p>
				<label for="password">Mot de passe</label> :
				<input type="password" name="password" id="password" required/>
				</p> <p>
				<label for="confirmpassword">Confirmation du mot de passe</label> :
				<input type="password" name="confirmpassword" id="confirmpassword" required/>
				</p> <p>
				<label for="nom">Nom</label> :
				<input type="text" name="nom" id="nom" required/>
				</p> <p>
				<label for="prenom">Prenom</label> :
				<input type="text" name="prenom" id="prenom" required/>
				</p> <p>
				<label for="adresse">Adresse</label> :
				<input type="text" name="adresse" id="adresse" required/>
				</p> <p>
				<label for="admin">Admin</label> :
				<input type="text" name="admin" id="admin" required/>
				</p> <p>
				<input type="submit" value="Envoyer" /> </p>
			</fieldset>
		</form>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
