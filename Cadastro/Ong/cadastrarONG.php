<html>
<head>
	<title>Cadastro</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
</head>
<body>
<?php
$hostname = "localhost:3306";
$bancodedados = "ongamg";
$usuario = "root";
$senha = "";

$conn = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($conn->connect_errno) {
    echo "Falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;
}
$login = $_POST['cnpj'];
$senhaU = $_POST['senha'];
$razaoSocial = $_POST['razaoSocial'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];




$sql = "INSERT INTO `usuarios`(`login`, `senha`, `tipo`)
		VALUES ('$login','$senhaU',2)";

if ($conn->query($sql) === TRUE) {
	$query = $conn->query("SELECT * FROM `usuarios` WHERE '$login' =`login`;");
	while ($dados = $query->fetch_array()) {
		$idUsuario = $dados['id'];
	}
	$sql = "INSERT INTO `ong`(`razaoSocial`, `cnpj`, `endereco`, `email`, `telefone`, `ID_usuario`) 
		VALUES ('$razaoSocial','$login','$email','$endereco','$telefone',$idUsuario);";
	if ($conn->query($sql) === TRUE) {
		echo "	<meta http-equiv=\"refresh\" content=\"3;url=/\">
	<div class=\"alertaSucesso\">
		ONG CADASTRADA COM <strong>SUCESSO</strong>!
	</div>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}	
	
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</body>
</html>
