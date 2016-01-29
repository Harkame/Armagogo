<?php
$ROOT = __DIR__;
$DS = DIRECTORY_SEPARATOR;

if(isset($_GET['menu'])){
	$menu = $_GET['menu'];
}
else{$menu = 'default';}
session_start();

switch ($menu) {
	case "default":
		$titre='Armagogo';
		require ("{$ROOT}{$DS}view{$DS}Generic{$DS}Accueil.php");
	break;
	case "armes":
		require ("{$ROOT}{$DS}controller{$DS}controllerArme.php");
	break;
	case "munitions":
		require ("{$ROOT}{$DS}controller{$DS}controllerMunition.php");
	break;
	case "accessoires":
		require ("{$ROOT}{$DS}controller{$DS}controllerAccessoire.php");
	break;
	case "utilisateur":
		require ("{$ROOT}{$DS}controller{$DS}controllerUtilisateur.php");
	break;
}
?>
