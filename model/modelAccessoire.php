<?php
require_once "{$ROOT}{$DS}model{$DS}Model.php";
class modelAccessoire {
	private $id;
	private $nom;
	private $type;
	private $poids;
	private $couleur;
	private $description;
	private $prix;
	
	// un getter
	public function getid() {
		return $this->id;
	}
	public function getnom() {
		return $this->nom;
	}
	public function gettype() {
		return $this->type;
	}
	public function getpoids() {
		return $this->poids;
	}
	public function getcouleur() {
		return $this->couleur;
	}
	public function getDescription() {
		return $this->description;
	}
	public function getPrix() {
		return $this->prix;
	}
	// un setter
	public function setID($id2) {
		$this->id = $id2;
	}
	public function setNom($nom2) {
		$this->nom = $nom2;
	}
	public function setType($type2) {
		$this->type = $type2;
	}
	public function setPoids($Poids2) {
		$this->Poids = $Poids2;
	}
	public function setCouleur($Couleur2) {
		$this->Poids = $Poids2;
	}
	public function setDescription($description2) {
		$this->description = $description2;
	}
	public function setPrix($prix2) {
		$this->prix = $prix2;
	}
	// Un constructeur
	public function __construct($nom = NULL, $type = NULL, $poids = NULL, $couleur = NULL, $description = NULL, $prix = NULL) {
		if (! is_null ( $nom ) && ! is_null ( $type ) && ! is_null ( $poids ) && ! is_null ( $couleur ) && ! is_null ( $description ) && ! is_null ( $prix )) {
			$this->nom = $nom;
			$this->type = $type;
			$this->poids = $poids;
			$this->couleur = $couleur;
			$this->description = $description;
			$this->prix = $prix;
		}
	}
	public function getAllAccessoire() {
		$sql = "SELECT * FROM accessoires";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelAccessoire' );
		return $rep->fetchAll ();
	}
	public function getHistorique($mail) {
		$sql = "SELECT * FROM commandeAccessoires WHERE mail = '$mail'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelAccessoire' );
		return $rep->fetchAll ();
	}
	public function getaccessoireByid($id) {
		$sql = "SELECT * FROM accessoires WHERE id='$id'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelAccessoire' );
		return $rep->fetch ();
	}
	public function save() {
		$pdo = Model::getPdo ();
		$sql = "INSERT INTO accessoires(nom, type, poids, couleur, description, prix) VALUES ('$this->nom', '$this->type', '$this->poids', '$this->couleur', '$this->description', '$this->prix')";
		$req_prep = $pdo->prepare ( $sql );
		$req_prep->execute ();
	}
	public static function delete($id) {
		$sql = "DELETE FROM accessoires WHERE id='$id'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelAccessoire' );
		return $rep->fetch ();
	}
}
?>
