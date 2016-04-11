<?php
require_once "{$ROOT}{$DS}model{$DS}modelMunition.php"; // chargement du modèle
if (isset ( $_GET ['action'] )) {
	$action = $_GET ['action']; // recupère l'action passée dans l'URL
} else {
	$action = 'readAll';
}
switch ($action) {
	case "readAll" :
		$titre = 'Liste des Munitions';
		$tab_v = modelMunition::getAllMunitions (); // appel au modèle pour gerer la BD
		require ("{$ROOT}{$DS}view{$DS}Munitions{$DS}viewAllMunitions.php"); // "redirige" vers la vue
		break;
	case "read" :
		$id = $_GET ['id'];
		$v = modelMunition::getMunitionById ( $id );
		if (empty ( $v )) {
			$titre = '404 munitions not Found';
			require ("{$ROOT}{$DS}view{$DS}Munitions{$DS}viewErrorMunitions.php"); // "redirige" vers la vue
		} else {
			$titre = 'Détail Munitions '.$v->getnom().' ';
			require ("{$ROOT}{$DS}view{$DS}Munitions{$DS}viewMunitions.php"); // "redirige" vers la vue
		}
		break;
	case "create" :
	if (isset ( $_SESSION ['admin'] )) {
			if ($_SESSION ['admin'] == 1) {
		$titre = 'Création Munitions';
		require ("{$ROOT}{$DS}view{$DS}Munitions{$DS}viewCreateMunitions.php");
	}
		else
			 {
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
		$calibre = $_POST ['calibre'];
		$quantite = $_POST ['quantite'];
		$description = $_POST ['description'];
		$prix = $_POST ['prix'];
		$munition = new modelMunition($nom, $calibre,$quantite, $description, $prix);
		$munition->save();
		$titre = 'Munitions '.$nom.' créées';
		require ("{$ROOT}{$DS}view{$DS}Munitions{$DS}viewCreatedMunitions.php");
		break;
	case "delete" :
	if (isset ( $_SESSION ['admin'] )) {
			if ($_SESSION ['admin'] == 1) {
		$titre = 'Munitions supprimés';
		$id = $_GET ['id'];
		ModelMunition::delete ( $id );
		require ("{$ROOT}{$DS}view{$DS}Munitions{$DS}viewDeletedMunitions.php");
	}
		else
			 {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewInterditacces.php");
			}
		} 
		else 
		{
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewConnectUtilisateur.php");
		}
		break;
	case "add":
			$id = $_GET['id'];
			$v = modelMunition::getMunitionByid ( $id );
			$titre = 'Detail munition : '.$v->getnom().' ';
			$nom = $v->getnom();
			$prix = $v->getprix();
			if (isset($_COOKIE['id_produits']) && isset($_COOKIE['types_produits']) && isset($_COOKIE['noms_produits']) && isset($_COOKIE['prix_produits'])){
				$id_produits = unserialize($_COOKIE['id_produits']);
				$types_produits = unserialize($_COOKIE['types_produits']);
				$noms_produits = unserialize($_COOKIE['noms_produits']);
				$prix_produits = unserialize($_COOKIE['prix_produits']);
				array_push($id_produits, $id);
				array_push($types_produits, 'munition');
				array_push($noms_produits, $nom);
				array_push($prix_produits, $prix);
				setcookie('id_produits', serialize($id_produits));
				setcookie('types_produits', serialize($types_produits));
				setcookie('noms_produits', serialize($noms_produits));
				setcookie('prix_produits', serialize($prix_produits));
			}else {
				$id_produits = array();
				$types_produits = array();
				$noms_produits = array();
				$prix_produits = array();
				array_push($id_produits, $id);
				array_push($types_produits, 'munition');
				array_push($noms_produits, $nom);
				array_push($prix_produits, $prix);
				setcookie('id_produits', serialize($id_produits));
				setcookie('types_produits', serialize($types_produits));
				setcookie('noms_produits', serialize($noms_produits));
				setcookie('prix_produits', serialize($prix_produits));
			}
			require ("{$ROOT}{$DS}view{$DS}Munitions{$DS}viewMunitions.php");
		break;
	case "historique":
	
	break;
}
?>
