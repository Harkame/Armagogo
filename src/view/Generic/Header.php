	<head>
		<meta charset="utf-8">
        <link  rel="stylesheet" href="view/Generic/site.css" >
		<title><?php echo $titre; ?></title>

    </head>
	<body>
<header>
<div>
<?php


if (!empty($_SESSION['prenom'])) {
	echo 'Bonjour '.$_SESSION['prenom'].'';
	echo '<p><a href="index.php?menu=utilisateur&action=deconnecter"> Déconnexion</a></p>';
	echo '<p> <a href="index.php?menu=utilisateur&action=panier"> Mon panier </a></p>';
	echo '<p><a href=index.php?menu=utilisateur&action=historique>Historique</a></p>';
	if($_SESSION['admin'] == 1){
	echo '<p><a href="index.php?menu=utilisateur&action=mettre_admin"> Ajouter Utilisateur</a></p>';

	}
}
else {
		echo '<p> <a href="index.php?menu=utilisateur&action=panier"> Mon panier </a></p>';
		echo '<p><a href="index.php?menu=utilisateur&action=connect">Se connecter</a>   </p>';
 
		echo '<p><a href="index.php?menu=utilisateur&action=create">Créer un compte</a>   </p>';	
}
?>
</div>
<br/>
        <h1><a href="http://infolimon.iutmontp.univ-montp2.fr//~massebiauv/projet/">ArmaGogo </a></h1>
</header>
