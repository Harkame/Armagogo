<?php
class Conf {
	private static $databases = array (
			'hostname' => 'hostname',
			'database' => 'database',
			'login' => 'login',
			'password' => 'password' 
	);
	static public function getLogin() {
		return self::$databases ['login'];
	}
	static public function getHostname() {
		return self::$databases ['hostname'];
	}
	static public function getDatabase() {
		return self::$databases ['database'];
	}
	static public function getPassworld() {
		return self::$databases ['password'];
	}
}
?>
