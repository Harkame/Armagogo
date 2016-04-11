<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php")?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php")?>
        <?php
								echo '<br></br>';
									echo 'Votre panier :';
									$total = 0;
									for($i = 0; $i < count ( $noms_produits ); $i ++) {
										echo '<br/>';
										if($types_produits[$i] == 'arme'){
										echo'<a href="index.php?menu=armes&action=read&id=' . $id_produits [$i] . '">' . $noms_produits [$i] . '</a>' . " <a href=index.php?menu=utilisateur&action=delete_produit&nom=$noms_produits[$i]>enlever du panier</a>";
										} else if ($types_produits[$i] == 'munition'){
		echo'<a href="index.php?menu=munitions&action=read&id=' . $id_produits [$i] . '">' . $noms_produits [$i] . '</a>' . " <a href=index.php?menu=utilisateur&action=delete_produit&nom=$noms_produits[$i]>enlever du panier</a>";
										}
										else{
echo'<a href="index.php?menu=accessoires&action=read&id=' . $id_produits [$i] . '">' . $noms_produits [$i] . '</a>' . " <a href=index.php?menu=utilisateur&action=delete_produit&nom=$noms_produits[$i]>enlever du panier</a>";
										}
										$total += $prix_produits [$i];
									}
									echo '<br></br>';
									echo 'Cout total du panier : ' . $total;
									echo '<br>';
									echo '<a href=index.php?menu=utilisateur&action=vider>Vider le panier</a> <a href=index.php?menu=utilisateur&action=acheter>Acheter</a>';									
								?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php")?>
</html>
