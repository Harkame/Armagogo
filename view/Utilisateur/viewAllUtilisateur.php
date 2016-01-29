<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des utilisateurs</title>
    </head>
    <body>
        <?php
		foreach ($tab_v as $v)
			echo '<p><a href="index.php?menu=utilisateur&action=read&id='.$v->getmail().'">'.$v->getnom().' '.$v->getprenom().'</p>';
        ?>
    </body>
</html>
