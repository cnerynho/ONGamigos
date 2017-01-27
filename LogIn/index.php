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
	<object class="objetoMenu" type="text/html" data="/includes/menuSuperior.html"></object>
	<div id="loginContainer" class="centralizado">
		<form method="POST" action="./">
			<label class="label">CNPJ/CPF: </label>
			<input value = "<?php if(isset($_POST['login'])){echo $_POST['login'];}?>" class="inputTexto" type="text" name="login" required/>
			<label class="label">Senha:</label>
			<input value = "<?php if(isset($_POST['senha'])){echo $_POST['senha'];}?>"class="inputTexto" type="password" name="senha" required/>
			<input id="btn-login" class="btn" type="submit" value="Login"/>
			<a href="/Cadastro">Nao possuo uma conta</a>
		</form>
	</div>
	<?php
		if(isset($_POST['login']) && isset($_POST['senha'])){
			$hostname = "localhost:3306";
			$bancodedados = "ongamg";
			$usuario = "root";
			$senha = "";
			
			$conn = new mysqli($hostname, $usuario, $senha, $bancodedados);
			if ($conn->connect_errno) {
			    echo "Falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;
			}
			
			$login = $_POST['login'];
			$senhaU = $_POST['senha'];
			$tipoU = 0;
			
					
			$sql = "SELECT * FROM `usuarios` WHERE '$login' =`login` && '$senhaU' = `senha`;";
			$query = $conn->query($sql);
			while ($dados = $query->fetch_array()) {
					$tipoU = $dados['tipo'];
			}
			if ($tipoU) {
				session_start();
				$_SESSION['login'] = $login;
				$_SESSION['tipo'] = $tipoU;
				echo "	<meta http-equiv=\"refresh\" content=\"3;url=/\">
	<div class=\"alertaSucesso\">
		LOGIN EFETUADO COM <strong>SUCESSO</strong>!
	</div>";
				
				
			} else {
				echo "Error: SENHA INCORRETA";
			}
			
			$conn->close();
		}
?>

	</body>
</html>