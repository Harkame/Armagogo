<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
        <?php
          echo '<p> L\'utilisateur '.$id.' a été supprimé.</p>'
		
        foreach ($tab_v as $v)
          echo '<p><a href="index.php?menu=utilisateur&action=read&id='.$v->getid().'">'.$v->getNom().' '.$v->getPrenom().' '.$v->getMail().'</p>';
        ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
