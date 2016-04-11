<?php
require_once "{$ROOT}{$DS}model{$DS}modelAccessoire.php"; // chargement du modèle
if (isset ( $_GET ['action'] )) {
	$action = $_GET ['action']; // recupère l'action passée dans l'URL
} else {
	$action = 'readAll';
}
switch ($action) {
	case "readAll" :
		$titre = 'Liste des Accessoires';
		$tab_v = modelAccessoire::getAllAccessoire (); // appel au modèle pour gerer la BD
		require ("{$ROOT}{$DS}view{$DS}Accessoire{$DS}viewAllAccessoire.php"); // "redirige" vers la vue
		break;
	case "read" :
		$id = $_GET ['id'];
		$v = ModelAccessoire::getAccessoireById ( $id );
		if (empty ( $v )) {
			$titre = '404 Accessoire not Found';
			require ("{$ROOT}{$DS}view{$DS}Accessoire{$DS}viewErrorAccessoire.php"); // "redirige" vers la vue
		} else {
			$titre = 'Détail Accessoire ' . $v->getnom () . ' ';
			require ("{$ROOT}{$DS}view{$DS}Accessoire{$DS}viewAccessoire.php"); // "redirige" vers la vue
		}
		break;
	case "create" :
	if (isset ( $_SESSION ['admin'] )) {
			if ($_SESSION ['admin'] == 1) {
		$titre = 'Création Accessoire';
		require ("{$ROOT}{$DS}view{$DS}Accessoire{$DS}viewCreateAccessoire.php");
		}
	else {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewInterditacces.php");
			}
		} 
		
		else 
		{
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewConnectUtilisateur.php");
		}
		
		break;
	case "created" :
		$nom = $_POST ['nom'];
		$type = $_POST ['type'];
		$poids = $_POST ['poids'];
		$couleur = $_POST ['couleur'];
		$description = $_POST ['description'];
		$prix = $_POST ['prix'];
		$titre = 'Arme ' . $nom . ' créée';
		$v = new ModelAccessoire ( $nom, $type, $poids, $couleur, $description, $prix );
		$v->save ();
		$tab_v = ModelAccessoire::getAllAccessoire ();
		require ("{$ROOT}{$DS}view{$DS}Accessoire{$DS}viewCreatedAccessoire.php");
		break;
	case "delete" :
	if (isset ( $_SESSION ['admin'] )) {
			if ($_SESSION ['admin'] == 1) {
		$titre = 'Accessoire supprimé';
		$id = $_GET ['id'];
		ModelAccessoire::delete ( $id );
		require ("{$ROOT}{$DS}view{$DS}Accessoire{$DS}viewDeletedAccessoire.php");
		}
	else {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewInterditacces.php");
			}
		} 
		
		else 
		{
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewConnectUtilisateur.php");
		}
		break;
	case "add" :
		$id = $_GET ['id'];
		$v = modelAccessoire::getAccessoireByid ( $id );
		$titre = 'Detail Accessoire : '.$v->getnom().' ';
		$nom = $v->getnom ();
		$prix = $v->getprix ();
		if (isset ( $_COOKIE ['id_produits'] ) && isset ( $_COOKIE ['types_produits'] ) && isset ( $_COOKIE ['noms_produits'] ) && isset ( $_COOKIE ['prix_produits'] )) {
			$id_produits = unserialize ( $_COOKIE ['id_produits'] );
			$types_produits = unserialize ( $_COOKIE ['types_produits'] );
			$noms_produits = unserialize ( $_COOKIE ['noms_produits'] );
			$prix_produits = unserialize ( $_COOKIE ['prix_produits'] );
			array_push ( $id_produits, $id );
			array_push ( $types_produits, 'accessoire' );
			array_push ( $noms_produits, $nom );
			array_push ( $prix_produits, $prix );
			setcookie ( 'id_produits', serialize ( $id_produits ) );
			setcookie ( 'types_produits', serialize ( $types_produits ) );
			setcookie ( 'noms_produits', serialize ( $noms_produits ) );
			setcookie ( 'prix_produits', serialize ( $prix_produits ) );
		} else {
			$id_produits = array ();
			$types_produits = array ();
			$noms_produits = array ();
			$prix_produits = array ();
			array_push ( $id_produits, $id );
			array_push ( $types_produits, 'munition' );
			array_push ( $noms_produits, $nom );
			array_push ( $prix_produits, $prix );
			setcookie ( 'id_produits', serialize ( $id_produits ) );
			setcookie ( 'types_produits', serialize ( $types_produits ) );
			setcookie ( 'noms_produits', serialize ( $noms_produits ) );
			setcookie ( 'prix_produits', serialize ( $prix_produits ) );
		}
		require ("{$ROOT}{$DS}view{$DS}Accessoire{$DS}viewAccessoire.php");
		break;
}
?>
