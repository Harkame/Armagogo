<?php
require_once "{$ROOT}{$DS}model{$DS}Model.php";
class modelMunition {
	private $id;
	private $nom;
	private $calibre;
	private $quantite;
	private $description;
	private $prix;
	
	// un getter
	public function getid() {
		return $this->id;
	}
	public function getnom() {
		return $this->nom;
	}
	public function getcalibre() {
		return $this->calibre;
	}
	public function getquantite() {
		return $this->quantite;
	}
	public function getdescription() {
		return $this->description;
	}
	public function getprix() {
		return $this->prix;
	}

	// Un constructeur
	public function __construct($n = NULL, $c = NULL, $q = NULL, $d = NULL, $p = NULL) {
		if (! is_null ( $n ) && ! is_null ( $c ) && ! is_null ( $q ) && ! is_null ( $d ) && ! is_null ( $p )) {
			$this->nom = $n;
			$this->calibre = $c;
			$this->quantite = $q;
			$this->description = $d;
			$this->prix = $p;
		}
		$this->options = array ();
	}
	public function getAllMunitions() {
		$sql = "SELECT * FROM munition";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelMunition' );
		return $rep->fetchAll ();
	}
	public function getMunitionByid($id) {
		$sql = "SELECT * FROM munition WHERE id='$id'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelMunition' );
		return $rep->fetch ();
	}
	public function save() {
		$sql = "INSERT INTO munition(nom, calibre, quantite, description, prix) VALUES ('$this->nom', '$this->calibre', '$this->quantite', '$this->description', '$this->prix')";
		$pdo = Model::getPdo ();
		$req_prep = $pdo->prepare ( $sql );
		$req_prep->execute ();
	}
	public static function delete($id) {
		$sql = "DELETE FROM munition WHERE id='$id'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelMunition' );
		return $rep->fetch ();
	}
}
?>
