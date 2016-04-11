<!DOCTYPE html>
<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
		<form method="post" action="index.php?menu=accessoires&action=created">
			<fieldset>
				<legend>Mon formulaire :</legend> <p>
				<label for="nom">Nom</label> :
				<input type="text" placeholder="Ex : chargeur" name="nom" id="nom" required/>
				</p> <p>
				<label for="poids">poids</label> :
				<input type="text" placeholder="Ex : 500" name="poids" id="poids" required/>
				</p> <p>
				<label for="description">Description</label> :
				<input type="text" placeholder="Ex : Les patates du lance patate" name="description" id="description" required/>
				</p> <p>
				<label for="prix">Prix</label> :
				<input type="text" placeholder="Ex : 50" name="prix" id="prix" required/>
				</p> <p>
				<label for="type">Type</label> :
				<input type="text" placeholder="Ex : poignée" name="type" id="type" required/>
				</p> <p>
				<label for="couleur">Couleur</label> :
				<input type="text" placeholder="Ex : rouge" name="couleur" id="couleur" required/>
				</p> <p>
				<input type="submit" value="Envoyer" /> </p>
			</fieldset>
		</form>
	<?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
