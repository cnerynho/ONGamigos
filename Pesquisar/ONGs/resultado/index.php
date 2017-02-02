<!DOCTYPE html>
<html>
	<head>
		<title>Sobre nós</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="./../../../css/stylesheet.css"/>
	</head>
	<body>
	<object class="objetoMenu" type="text/html" data="./../../../includes/menuSuperior.php"></object>
	<h1>Resultado da Consulta</h1>
	<table class="tabela">
		<tr>
			<th>Razão Social da ONG</th>
			<th>CNPJ</th>
			<th>Endereço</th>
			<th>E-mail</th>
			<th>Telefone</th>
		</tr>
	<?php 
		$hostname = "localhost:3306";
		$bancodedados = "ongamg";
		$usuario = "root";
		$senha = "";
		
		$conn = new mysqli($hostname, $usuario, $senha, $bancodedados);
		if ($conn->connect_errno) {
		    echo "Falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;
		}
		
		$sql = "SELECT * FROM `ong`;";
		$query = $conn->query($sql);
		while ($dados = $query->fetch_array()) {
			$nomeO = $dados['razaoSocial'];
			$cnpjO = $dados['cnpj'];
			$enderecoO = $dados['endereco'];
			$emailO = $dados['email'];
			$telefoneO = $dados['telefone'];
			echo "<tr>
					<td>$nomeO</td>
					<td>$cnpjO</td>
					<td>$enderecoO</td>
					<td>$emailO</td>
					<td>$telefoneO</td>
				</tr>";
		}
	?>
		
	
	</table>	
	</body>
</html>
