<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
        <?php
		foreach ($tab_v as $v)
			echo '<p><a href="index.php?menu=armes&action=read&id='.$v->getid().'">'.$v->getNom().' '.$v->getPrix().' euros</a></p>';
		
		echo '<p>L\'arme '.$nom.' a été ajouté à la base.</p>'
        ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
