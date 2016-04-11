<?php
require_once "{$ROOT}{$DS}model{$DS}modelArme.php"; // chargement du modèle
if (isset ( $_GET ['action'] )) {
	$action = $_GET ['action']; // recupère l'action passée dans l'URL
} else {
	$action = 'readAll';
}
switch ($action) {
	case "readAll" :
		$titre = 'Liste des Armes';
		$tab_v = ModelArme::getAllArmes (); // appel au modèle pour gerer la BD
		require ("{$ROOT}{$DS}view{$DS}Arme{$DS}viewAllArme.php"); // "redirige" vers la vue
		break;
	case "read" :
		$id = $_GET ['id'];
		$v = ModelArme::getArmeById ( $id );
		if (empty ( $v )) {
			$titre = '404 arme not Found';
			require ("{$ROOT}{$DS}view{$DS}Arme{$DS}viewErrorArme.php"); // "redirige" vers la vue
		} else {
			$titre = 'Détail Arme ' . $v->getnom () . ' ';
			require ("{$ROOT}{$DS}view{$DS}Arme{$DS}viewArme.php"); // "redirige" vers la vue
		}
		break;
	case "add" :
		$id = $_GET ['id'];
		$v = modelArme::getArmeByid ( $id );
		$nom = $v->getnom ();
		$prix = $v->getprix ();
		$titre = 'Detail arme : ' . $v->getnom () . ' ';
		if (isset ( $_COOKIE ['id_produits'] ) && isset ( $_COOKIE ['types_produits'] ) && isset ( $_COOKIE ['noms_produits'] ) && isset ( $_COOKIE ['prix_produits'] )) {
			$id_produits = unserialize ( $_COOKIE ['id_produits'] );
			$types_produits = unserialize ( $_COOKIE ['types_produits'] );
			$noms_produits = unserialize ( $_COOKIE ['noms_produits'] );
			$prix_produits = unserialize ( $_COOKIE ['prix_produits'] );
			array_push ( $id_produits, $id );
			array_push ( $types_produits, 'munition' );
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
			array_push ( $types_produits, 'arme' );
			array_push ( $noms_produits, $nom );
			array_push ( $prix_produits, $prix );
			setcookie ( 'id_produits', serialize ( $id_produits ) );
			setcookie ( 'types_produits', serialize ( $types_produits ) );
			setcookie ( 'noms_produits', serialize ( $noms_produits ) );
			setcookie ( 'prix_produits', serialize ( $prix_produits ) );
		}
		require ("{$ROOT}{$DS}view{$DS}Arme{$DS}viewArme.php");
		break;
	case "create" :
	if (isset ( $_SESSION ['admin'] )) {
			if ($_SESSION ['admin'] == 1) {
				$titre = 'Création Arme';
		require ("{$ROOT}{$DS}view{$DS}Arme{$DS}viewCreateArme.php");
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
		$categorie = $_POST ['categorie'];
		$calibre = $_POST ['calibre'];
		$capacite = $_POST ['capacite'];
		$utilisation = $_POST ['utilisation'];
		$poids = $_POST ['poids'];
		$couleur = $_POST ['couleur'];
		$description = $_POST ['description'];
		$prix = $_POST ['prix'];
		$titre = 'Arme ' . $nom . ' créée';
		$arme = new modelArme( $nom, $type, $categorie, $calibre, $capacite, $utilisation, $poids, $couleur, $description, $prix );
		$arme->save();
		$tab_v = ModelArme::getAllArmes ();
		require ("{$ROOT}{$DS}view{$DS}Arme{$DS}viewCreatedArme.php");
		break;
	case "delete" :
		if (isset ( $_SESSION ['admin'] )) {
			if ($_SESSION ['admin'] == 1) {
		$id = $_GET ['id'];
		ModelArme::delete ( $id );
		$titre = 'Arme supprimé';
		require ("{$ROOT}{$DS}view{$DS}Arme{$DS}viewDeletedArme.php");
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
}
?>
