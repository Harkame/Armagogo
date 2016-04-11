<?php
$ROOT = "/home/ann2/massebiauv/public_html/projet";
$DS = DIRECTORY_SEPARATOR;
error_reporting ( 0 );
require_once "{$ROOT}{$DS}model{$DS}modelUtilisateur.php"; // chargement du modèle
require_once "{$ROOT}{$DS}model{$DS}modelCommande.php";
if (isset ( $_GET ['action'] )) {
	$action = $_GET ['action']; // recupère l'action passée dans l'URL
} else {
	$action = 'readAll';
}
switch ($action) {
	case "readAll" :
		if (isset ( $_SESSION ['admin'] )) {
			if ($_SESSION ['admin'] == 1) {
				$tab_v = modelUtilisateur::getAllUtilisateurs (); // appel au modèle pour gerer la BD
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewAllUtilisateur.php"); // "redirige" vers la vue
			} else {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewInterditacces.php");
			}
		} else {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewInterditacces.php");
		}
		break;
	case "read" :
		$id = $_GET ['mail'];
		$v = modelUtilisateur::getUtilisateurById ( $id );
		if (empty ( $v )) {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewErrorUtilisateur.php"); // "redirige" vers la vue
		} else {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewUtilisateur.php"); // "redirige" vers la vue
		}
		break;
	case "panier" :
		if (isset ( $_COOKIE ['id_produits'] ) && isset ( $_COOKIE ['types_produits'] ) && isset ( $_COOKIE ['noms_produits'] ) && isset ( $_COOKIE ['prix_produits'] )) {
			$id_produits = unserialize ( $_COOKIE ['id_produits'] );
			$types_produits = unserialize ( $_COOKIE ['types_produits'] );
			$noms_produits = unserialize ( $_COOKIE ['noms_produits'] );
			$prix_produits = unserialize ( $_COOKIE ['prix_produits'] );
			if (count ( $noms_produits ) > 0) {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewPanier.php");
			} else {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewPanierVide.php"); // "redirige" vers la vue
			}
		} else {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewPanierVide.php"); // "redirige" vers la vue
		}
		break;
	case "create" :
		require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewCreateUtilisateur.php");
		break;
	case "created" :
		$mail = $_POST ['mail'];
		$password = $_POST ['password'];
		$confirmpassword = $_POST ['confirmpassword'];
		$nom = $_POST ['nom'];
		$prenom = $_POST ['prenom'];
		$adresse = $_POST ['adresse'];
		if ($password != $confirmpassword) {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewPasswordDifferent.php");
		} else {
			$utilisateur = new modelUtilisateur ( $mail, $password, $nom, $prenom, $adresse, 0 );
			$existe = modelUtilisateur::existe ( $mail );
			if ($existe == true) {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewMailDejaPris.php");
			} else {
				$utilisateur->save ();
				$subject = 'Confirmation d\'adresse Mail';
				$headers = "From: louisr.daviaud@gmail.com\r\nReturn-Path: louisr.daviaud@gmail.com\r\n";
				$message = 'test';
				mail ( 'louisr.daviaud@gmail.com', $subject, $message, $headers );
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewCreatedUtilisateur.php");
			}
		}
		break;
	case "delete_produit" :
		$nom = $_GET ['nom'];
		$noms_produits = unserialize ( $_COOKIE ['noms_produits'] );
		$prix_produits = unserialize ( $_COOKIE ['prix_produits'] );
		for($i = 0; $i < count ( $noms_produits ); $i ++) {
			if ($noms_produits [$i] == $nom) {
				unset ( $noms_produits [$i] );
				unset ( $prix_produits [$i] );
				$nnoms_produits = array_values ( $noms_produits );
				$pprix_produits = array_values ( $prix_produits );
				setcookie ( 'noms_produits', serialize ( $nnoms_produits ) );
				setcookie ( 'prix_produits', serialize ( $pprix_produits ) );
				break;
			}
		}
		// $noms_produits = unserialize($_COOKIE['noms_produits']);
		// $prix_produits = unserialize($_COOKIE['prix_produits']);
		require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewPanier.php");
		break;
	case "inscription" :
		require ("{$ROOT}{$DS}session{$DS}enregistrement{$DS}register.php");
		break;
	case "connect" :
		require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewConnectUtilisateur.php");
		break;
	case "connected" :
		session_destroy ();
		session_start ();
		$mail = $_POST ['mail'];
		$pass = $_POST ['password'];
		$valide = modelUtilisateur::checkPassword ( $mail, $pass );
		if ($valide == "true") {
			$utilisateur = modelUtilisateur::getUtilisateurByid ( $mail );
			$_SESSION ["mail"] = $utilisateur [0]->getmail ();
			$_SESSION ["prenom"] = $utilisateur [0]->getprenom ();
			$_SESSION ["admin"] = $utilisateur [0]->getadmin ();
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewConnexionOK.php");
		} else if ($valide == "mail") {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewMauvaisMail.php");
		} else {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewMauvaisPassword.php");
		}
		break;
	case "mettre_admin" :
		if (isset ( $_SESSION ['admin'] )) {
			if ($_SESSION ['admin'] == 1) {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewMettre_admin.php");
			} else {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewInterditacces.php");
			}
		} else {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewConnectUtilisateur.php");
		}
		
		break;
	case "admin_mis" :
		$mail = $_POST ['mail'];
		$password = $_POST ['password'];
		$confirmpassword = $_POST ['confirmpassword'];
		$nom = $_POST ['nom'];
		$prenom = $_POST ['prenom'];
		$adresse = $_POST ['adresse'];
		$admin = $_POST ['admin'];
		if ($password != $confirmpassword) {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewPasswordDifferent.php");
		} else {
			$utilisateur = new modelUtilisateur ( $mail, $password, $nom, $prenom, $adresse, $admin );
			$existe = modelUtilisateur::existe ( $mail );
			if ($existe == true) {
				require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewMailDejaPris.php");
			} else {
				if ($admin == 1 or $admin == 0) {
					$utilisateur->save ();
					require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewCreatedUtilisateur.php");
				} else {
					require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewMauvaisadmin.php");
				}
			}
		}
		break;
	case "vider" :
		setcookie ( 'id_produits', NULL, - 1 );
		setcookie ( 'types_produits', NULL, - 1 );
		setcookie ( 'noms_produits', NULL, - 1 );
		setcookie ( 'prix_produits', NULL, - 1 );
		require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewPanierVide.php"); // "redirige" vers la vue
		break;
	default :
		require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewConnectUtilisateur.php");
		break;
	case "acheter" :
		modelUtilisateur::acheter ();
		if (isset ( $_SESSION ['mail'] )) {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewAchatPanier.php");
		} else {
			require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewPasCo.php");
		}
		break;
	case "deconnecter" :
		session_destroy ();
		require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewDeconnecter.php");
		break;
	case "confirmation" :
		$subject = 'Confirmation d\'adresse Mail';
		$headers = "From: louisr.daviaud@gmail.com\r\nReturn-Path: louisr.daviaud@gmail.com\r\n";
		$message = 'test';
		if (mail ( 'louisr.daviaud@gmail.com', $subject, $message, $headers )) {
			$reponse = "<p>Un mail vous a été envoyer veuillez le confirmer afin de vous connecter</p>";
			echo $reponse;
		} else {
			$reponse = "Le mail de confirmation de mot de passe n'a pas été envoyé, veuillez contacter le webmaster";
			echo $reponse;
		}
		break;
	case "historique" :
		$mail = $_SESSION ['mail'];
		$v = modelCommande::getCommandeBymail ( $mail );
		require ("{$ROOT}{$DS}view{$DS}Utilisateur{$DS}viewHistorique.php");
		break;
}
?>
