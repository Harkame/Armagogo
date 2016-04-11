<!DOCTYPE html>
<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
		<form method="post" action="index.php?menu=armes&action=created">
			<fieldset>
				<legend>Mon formulaire :</legend> <p>
				<label for="nom">Nom</label> :
				<input type="text" placeholder="Ex : Renault" name="nom" id="nom" required/>
				</p> <p>
				<label for="type">Type</label> :
				<input type="text" placeholder="Ex : Bleu" name="type" id="type" required/>
				</p> <p>
				<label for="categorie">Categorie</label> :
				<input type="text" placeholder="Ex : Bleu" name="categorie" id="categorie" required/>
				</p> <p>
				<label for="calibre">Calibre</label> :
				<input type="text" placeholder="Ex : Bleu" name="calibre" id="calibre" required/>
				</p> <p>
				<label for="capacite">Capacite</label> :
				<input type="text" placeholder="Ex : Bleu" name="capacite" id="capacite" required/>
				</p> <p>
				<label for="utilisation">Utilisation</label> :
				<input type="text" placeholder="Ex : Bleu" name="utilisation" id="utilisation" required/>
				</p> <p>
				<label for="poids">Poids</label> :
				<input type="text" placeholder="Ex : Bleu" name="poids" id="poids" required/>
				</p> <p>
				<label for="couleur">Couleur</label> :
				<input type="text" placeholder="Ex : Bleu" name="couleur" id="couleur" required/>
				</p> <p>
				<label for="description">Description</label> :
				<input type="text" placeholder="Ex : Bleu" name="description" id="description" required/>
				</p> <p>
				<label for="prix">Prix</label> :
				<input type="text" placeholder="Ex : Bleu" name="prix" id="prix" required/>
				</p> <p>
				<input type="submit" value="Envoyer" /> </p>
			</fieldset>
		</form>
	<?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
