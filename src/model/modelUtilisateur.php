<?php
$ROOT = "/home/ann2/massebiauv/public_html/projet";
$DS = DIRECTORY_SEPARATOR;
require_once "{$ROOT}{$DS}model{$DS}Model.php";
require_once "{$ROOT}{$DS}model{$DS}modelCommande.php";
require_once "{$ROOT}{$DS}Security.php";
class modelUtilisateur {
	private $mail;
	private $nom;
	private $prenom;
	private $password;
	private $adresse;
	private $admin;
	
	// getter
	public function getmail() {
		return $this->mail;
	}
	public function getnom() {
		return $this->nom;
	}
	public function getprenom() {
		return $this->prenom;
	}
	public function getpassword() {
		return $this->password;
	}
	public function getadmin() {
		return $this->admin;
	}
	// setter
	public function setmail($mail) {
		$this->mail = $mail;
	}
	public function setnom($nom) {
		$this->nom = $nom;
	}
	public function setprenom($prenom) {
		$this->prenom = $prenom;
	}
	public function setpassword($password) {
		$this->password = $password;
	}
	public function __construct($mail = NULL, $password = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $admin = NULL) {
		if (! is_null ( $mail ) && ! is_null ( $nom ) && ! is_null ( $prenom ) && ! is_null ( $password ) && ! is_null ( $adresse ) && ! is_null ( $admin )) {
			$this->mail = $mail;
			$this->nom = $nom;
			$this->password = $password;
			$this->prenom = $prenom;
			$this->adresse = $adresse;
			$this->admin = $admin;
		}
	}
	public function getUtilisateurByid($mail) {
		$sql = "SELECT * FROM utilisateur WHERE mail='$mail'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelUtilisateur' );
		return $rep->fetchAll ();
	}
	public function getUtilisateurByPassword($password) {
		$mot_passe_crypte = Security::chiffrer ( $password );
		$sql = "SELECT * FROM utilisateur WHERE password='$mot_passe_crypte'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelUtilisateur' );
		return $rep->fetchAll ();
	}
	public static function getAllUtilisateurs() {
		$sql = "SELECT * FROM utilisateur";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelUtilisateur' );
		return $rep->fetchAll ();
	}
	public function save() {
		modelUtilisateur::existe ( $this->mail );
		$pdo = Model::getPdo ();
		$mot_passe_crypte = Security::chiffrer ( $this->password );
		$sql = "INSERT INTO utilisateur(mail, password, nom, prenom, adresse,admin) VALUES ('$this->mail', '$mot_passe_crypte', '$this->nom', '$this->prenom', '$this->adresse', '$this->admin')";
		$req_prep = $pdo->prepare ( $sql );
		$req_prep->execute ();
	}
	public static function delete($mail) {
		$sql = "DELETE FROM arme WHERE id='$mail'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelUtilisateur' );
		return $rep->fetch ();
	}
	public static function existe($mail) {
		$tab = modelUtilisateur::getUtilisateurById ( $mail );
		$i = count ( $tab );
		if ($i > 0) {
			return true;
		} else {
			return false;
		}
	}
	public static function acheter() {
		if (isset ( $_COOKIE ['id_produits'] ) && isset ( $_COOKIE ['types_produits'] ) && isset ( $_COOKIE ['noms_produits'] ) && isset ( $_COOKIE ['prix_produits'] )) {
			$pdo = Model::getPdo ();
			$id_produits = unserialize ( $_COOKIE ['id_produits'] );
			$types_produits = unserialize ( $_COOKIE ['types_produits'] );
			$noms_produits = unserialize ( $_COOKIE ['noms_produits'] );
			$prix_produits = unserialize ( $_COOKIE ['prix_produits'] );
			for($i = 0; $i < count ( $noms_produits ); $i ++) {
				$mail = $_SESSION ['mail'];
				$commande = new modelCommande ( $mail, $noms_produits [$i] );
				$commande->save ();
			}
		}
	}
	public static function checkPassword($mail, $password) {
		// $ROOT = __DIR__;
		$DS = DIRECTORY_SEPARATOR;
		$tab = modelUtilisateur::getUtilisateurById ( $mail );
		$i = count ( $tab );
		if ($i == 0) {
			return 'mail';
		} else {
			$tab = modelUtilisateur::getUtilisateurByPassword ( $password );
			$i = count ( $tab );
			if ($i == 0) {
				return 'password';
			} else {
				return true;
			}
		}
	}
}
?>
