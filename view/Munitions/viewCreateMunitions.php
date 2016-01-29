<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
		<form method="post" action="index.php?menu=munitions&action=created">
			<fieldset>
				<legend>Mon formulaire :</legend> <p>
				<label for="nom">Nom</label> :
				<input type="text" placeholder="Ex : Colt 6" name="nom" id="nom" required/>
				</p> <p>
				<label for="calibre">Calibre</label> :
				<input type="text" placeholder="Ex : 4.5" name="calibre" id="calibre" required/>
				</p> <p>
				<label for="quantite">Quantité</label> :
				<input type="text" placeholder="Ex : 500" name="quantite" id="quantite" required/>
				</p> <p>
				<label for="description">Description</label> :
				<input type="text" placeholder="Ex : Les patates du lance patate" name="description" id="description" required/>
				</p> <p>
				<label for="prix">Prix</label> :
				<input type="text" placeholder="Ex : 50" name="prix" id="prix" required/>
				</p> <p>
				<input type="submit" value="Envoyer" /> </p>
			</fieldset>
		</form>
	<?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
