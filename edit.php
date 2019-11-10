<?php 

require_once 'php_action/db_connect.php';

if($_GET['id']) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM Dice WHERE Id = {$id}";
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();
	$connect->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Editar DICE</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2>Editar</h2>
			<form action="php_action/create.php" method="post">
				<div class="form-group">
					<label for="text">Nome:</label>
					<input type="text" class="form-control" name="nome" placeholder="Qual nome do projeto?" value="<?php echo $data['Nome'] ?>">
				</div>
				<div class="form-group">
					<label for="text">Duração:</label>
					<input type="number" class="form-control" name="duracao" placeholder="Qual a duração do projeto?" value="<?php echo $data['Duracao'] ?>">
				</div>
				<div class="form-group">
					<label for="number">Integridade:</label>
					<input type="number" class="form-control" name="integridade" placeholder="Qual a integridade do projeto?" value="<?php echo $data['Integridade'] ?>">
				</div>
				<div class="form-group">
					<label for="number">Comprometimento da Gerência:</label>
					<input type="number" class="form-control" name="c1" placeholder="Compromentimento da diretoria" value="<?php echo $data['CGerencia'] ?>">
				</div>
				<div class="form-group">
					<label for="number">Comprometimento dos Funcionários:</label>
					<input type="number" class="form-control" name="c2" placeholder="Compromentimento dos funcionários" value="<?php echo $data['CFuncionarios'] ?>">
				</div>
				<div class="form-group">
					<label for="number">Esforço:</label>
					<input type="number" class="form-control" name="esforco" placeholder="Qual o esforço do projeto?" value="<?php echo $data['Esforco'] ?>">
				</div>
				<button type="submit" class="btn btn-default">Salvar</button></td>
				<a href="index.php"><button type="button" class="btn btn-default">Voltar</button></a>
			</form>
		</div>
	</body>
</html>

<?php
}
?>