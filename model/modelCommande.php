<?php
require_once "{$ROOT}{$DS}config{$DS}Conf.php";
require_once "{$ROOT}{$DS}model{$DS}Model.php";
class modelCommande {
	private $idcommande;
	private $mail;
	private $nomproduit;
	
	// un getter
	public function getid() {
		return $this->id;
	}
	public function getmail() {
		return $this->mail;
	}
	public function getnomproduit() {
		return $this->nomproduit;
	}
	// Un constructeur
	public function __construct($mail = NULL, $nomproduit = NULL) {
		if (! is_null ( $mail ) && ! is_null ( $nomproduit )) {
			$this->mail = $mail;
			$this->nomproduit = $nomproduit;
		}
	}
	public function getCommandeBymail($mail) {
		$sql = "SELECT * FROM commande WHERE mail = '$mail'";
		$rep = Model::$pdo->query ( $sql );
		$rep->setFetchMode ( PDO::FETCH_CLASS, 'modelCommande' );
		return $rep->fetchAll ();
	}
	public function save() {
		$pdo = Model::getPdo ();
		$sql = "INSERT INTO commande(mail, nomproduit) VALUES ('$this->mail', '$this->nomproduit')";
		$req_prep = $pdo->prepare ( $sql );
		$req_prep->execute ();
	}
}
?>
