<!DOCTYPE html>
<html>
<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
?>
<head>
	<meta charset="UTF-8"/>
	<title>Agencia Amiga</title>
	<link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
</head>
<body>
<object class="objetoMenu" type="text/html" data="/includes/menuSuperior.php"></object>
<?php
		session_start();
		unset($_SESSION['login']);
		unset($_SESSION['tipo']);
		echo "	<meta http-equiv=\"refresh\" content=\"3;url=/\">
				<div class=\"alertaSucesso\">
				LOGOUT EFETUADO COM <strong>SUCESSO</strong>!
				</div>";
				
?>

</body>
</html>