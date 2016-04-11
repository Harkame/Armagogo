<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
        <?php
        echo '<p> ' .$v->getNom(). '</p>';
        echo '<p> '.$v->getPrenom().'</p>';
        echo '<p> '.$v->getMail().'</p>';
		echo '<p> Supprimer utilisateur <a href="index.php?menu=utilisateur&action=delete&id='.$v->getid().'">'.$v->getNom().' '.$v->getPrenom().''.$v->getMail().' </p>';
        ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
