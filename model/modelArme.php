<?php
require_once "{$ROOT}{$DS}model{$DS}Model.php";
class modelArme {
	private $id;
	private $nom;
	private $type;
	private $categorie;
	private $calibre;
	private $capacite;
	private $utilisation;
	private $poids;
	private $couleur;
	private $description;
	private $prix;
	
	// getter
	
	public function getid(){
		return $this->id;
	}
	public function getnom() {
		return $this->nom;
	}
	public function gettype() {
		return $this->type;
	}
	public function getcategorie() {
		return $this->categorie;
	}
	public function getcalibre() {
		return $this->calibre;
	}
	public function getcapacite() {
		return $this->capacite;
	}
	public function getutilisation() {
		return $this->utilisation;
	}
	public function getpoids() {
		return $this->poids;
	}
	public function getcouleur() {
		return $this->couleur;
	}
	public function getdescription() {
		return $this->description;
	}
	public function getprix() {
		return $this->prix;
	}
	
	// setter
	public function setnom($nom) {
		$this->nom = $nom;
	}
	public function settype($type) {
		$this->type = $type;
	}
	public function setcategorie($categorie) {
		$this->categorie = $categorie;
	}
	public function setcalibre($calibre) {
		$this->calibre = $calibre;
	}
	public function setcapacite($capacite) {
		$this->capacite = $capacite;
	}
	public function setutilisation($utilisation) {
		$this->utilisation = $utilisation;
	}
	public function setpoids($poids) {
		$this->poids = $poids;
	}
	public function setcouleur($couleur) {
		$this->couleur = $couleur;
	}
	public function setdescription($description) {
		$this->description = $description;
	}
	public function setprix($prix) {
		$this->prix = $prix;
	}
	public function __construct($nom = NULL, $type = NULL, $categorie = NULL, $calibre = NULL, $capacite = NULL, $utilisation = NULL, $poids = NULL, $couleur = NULL, $description = NULL, $prix = NULL) {
		if (! is_null ( $nom ) && ! is_null ( $type )&& ! is_null ( $categorie ) && ! is_null ( $calibre )&& ! is_null ( $capacite ) && ! is_null ( $utilisation ) && ! is_null ( $poids ) && ! is_null ( $couleur ) && ! is_null ( $description ) && ! is_null ( $prix )) {
			$this->nom = $nom;
			$this->type = $type;
			$this->categorie = $categorie;
			$this->calibre = $calibre;
			$this->capacite = $capacite;
			$this->utilisation = $utilisation;
			$this->poids = $poids;
			$this->couleur = $couleur;
			$this->description = $description;
			$this->prix = $prix;
		}
	}

	public function getArmeByid($id) {
		$sql = "SELECT * FROM arme WHERE id='$id'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode(PDO::FETCH_CLASS, 'modelArme' );
		return $rep->fetch();
	}

	public static function getAllArmes() {
		$sql = "SELECT * FROM arme";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode(PDO::FETCH_CLASS, 'modelArme' );
		return $rep->fetchAll();
	}

	public function save() {
		$pdo = Model::getPdo ();
		$sql = "INSERT INTO arme(nom, type, categorie, calibre, couleur, poids, capacite, utilisation, description, prix) VALUES ('$this->nom', '$this->type', '$this->categorie', '$this->calibre', '$this->couleur', '$this->poids', '$this->capacite', '$this->utilisation', '$this->description', '$this->prix')";
		$req_prep = $pdo->prepare ( $sql );
		$req_prep->execute ();
	}

	public static function delete($id) {
		$sql = "DELETE FROM arme WHERE id='$id'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode(PDO::FETCH_CLASS, 'modelArme');
		return $rep->fetch();
	}
}
?>
