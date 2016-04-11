<?php
require_once "{$ROOT}{$DS}config{$DS}Conf.php";
class Model {
	public static $pdo;
	public static function getPdo() {
		return self::$pdo;
	}
	public static function Init() {
		$host = Conf::getHostname ();
		$dbname = Conf::getDatabase ();
		$login = Conf::getLogin ();
		$pass = Conf::getPassworld ();
		try {
			self::$pdo = new PDO ( "mysql:host=$host;dbname=$dbname", $login, $pass );
		} catch ( PDOException $e ) {
			echo $e->getMessage (); // affiche un message d'erreur
			die ();
		}
	}
}
Model::init ();
?>
