<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php") ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php") ?>
        <?php
        foreach ($tab_v as $v)
		
		   
          echo '<p><a href="index.php?menu=munitions&action=read&id='.$v->getid().'">'.$v->getNom().' '.$v->getPrix().' euros</a></p>';
		  
		  if (isset($_SESSION['admin'])){
	if($_SESSION['admin'] == 0){
	
	}
	else {     
	echo '<p><a href="index.php?menu=munitions&action=create">Ajouter nouvel munition</a></p>';
	
		  }
		  }
		  
        ?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php") ?>
</html>
