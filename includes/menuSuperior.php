<!DOCTYPE html>
<html>
<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
?>
	<head>
		<title>Agência Amiga</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
	</head>
	<body>
		<div class="menuTopo">
		<ul>
			<li><a href="/" target="_top">Pagina Inicial</a></li>
			<li><a href="/Pesquisar" target="_top">Pesquisar</a></li>
			<li><a href="/Cadastro" target="_top">Cadastrar</a></li>
			<li><a href="/sobreNos" target="_top">Sobre nos</a></li>
			<?php session_start();
			if(isset($_SESSION['tipo'])){
				echo "<li><a href=\"/logOut\" target=\"_top\">Sair</a></li>";
			} else{
				echo "<li><a href=\"/LogIn\" target=\"_top\">Login</a></li>";
			}
			?>
		</ul>
		</div>

	</body>
</html>