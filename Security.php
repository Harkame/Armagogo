<?php
$ROOT = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once "{$ROOT}{$DS}model{$DS}modelUtilisateur.php";
require_once "{$ROOT}{$DS}model{$DS}modelAccessoire.php";
class Security {
	private static $seed = 'j\'infiltrais ton phone tel 4ans en arrière ?';
	public static function chiffrer($texte_en_clair) {
		$texte_crypte = hash ( 'sha256', $texte_en_clair );
		return $texte_crypte;
	}
	public static function getSeed() {
		return self::$seed;
	}
}
// affiche '3a7bd3e2360a3d29eea436fcfb7e44c735d117c42d1c1835420b6b9942dd4f1b'
?>
