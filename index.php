<?php require_once 'php_action/db_connect.php'; ?>

<!DOCTYPE html>
<html>
	<head>
		<title>DICE</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2>Cadastro de Projetos</h2>
			<p>Projetos cadastrados para cálculo da metodologia de projetos DICE</p>            
			<table class="table">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Duração</th>
						<th>Integridade</th>
						<th>Comprometimento da Gerência</th>
						<th>Comprometimento dos Funcionários</th>
						<th>Esforço</th>
						<th>Score</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM Dice";
					$result = $connect->query($sql);

					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "<tr>
								<td>".$row['Nome']."</td>
								<td>".$row['Duracao']."</td>
								<td>".$row['Integridade']."</td>
								<td>".$row['CGerencia']."</td>
								<td>".$row['CFuncionarios']."</td>
								<td>".$row['Esforco']."</td>
								<td>".$row['Score']."</td>
								<td>
									<a href='edit.php?id=".$row['Id']."'><button type='button' class='btn btn-default'>Editar</button></a>
									<a href='remove.php?id=".$row['Id']."'><button type='button' class='btn btn-default'>Remover</button></a>
								</td>
							</tr>";
						}
					} else {
						echo "<tr><td colspan='7'><center>Sem registros</center></td></tr>";
					}
					?>
				</tbody>
			</table>
			<a href="create.php"><button type="button" class="btn btn-default">Adicionar Dice</button></a>
		</div>	
	</body>
</html>