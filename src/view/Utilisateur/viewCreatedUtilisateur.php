<!DOCTYPE html>

<html>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Header.php")?>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Menu.php")?>
    <body>
        <?php						
								//if (mail ( 'louisr.daviaud@gmail.com', $subject, $message, $headers )) {
									echo 'Mail de confirmation envoye a ' . $utilisateur->getmail ();
								//} else {
									//echo "L'inscription a echoue, veuillez contacter louisr.daviaud@gmail.com";
								//}
								?>
		<p>
		<a href="index.php"> Retour au menu principale </a>
	</p>
</body>
    <?php include ("{$ROOT}{$DS}view{$DS}Generic{$DS}Footer.php")?>
</html>
