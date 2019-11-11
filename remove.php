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
		<title>Excluir Projeto</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<br>
			<div class="alert alert-danger">
				<strong>Atenção:</strong> Após confirmar a exclusão, o projeto não poderá mais ser recuperado.
			</div>
			<h2>Tem certeza que deseja excluir?</h2>
			<form action="php_action/remove.php" method="post">
				<input type="hidden" name="id" value="<?php echo $data['Id'] ?>" />
				<button type="submit" class="btn btn-default">Salvar</button>
				<a href="index.php"><button type="button" class="btn btn-default">Voltar</button></a>
			</form>
		</div>
	</body>
</html>
<?php 
}
?>