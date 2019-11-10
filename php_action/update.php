<?php 

require_once 'db_connect.php';

if($_POST) {
	$nome = $_POST['nome'];
	$duracao = $_POST['duracao'];
	$integridade = $_POST['integridade'];
	$c1 = $_POST['c1'];
	$c2 = $_POST['c2'];
	$esforco = $_POST['esforco'];
	$score = $_POST['duracao'] + (2 * $_POST['integridade']) + (2 * $_POST['c1']) + $_POST['c2'] + $_POST['esforco'];

	$id = $_POST['id'];

	$sql  = "UPDATE Dice SET Nome = '$nome', Duracao = '$duracao', Integridade = '$integridade', CGerencia = '$c1', CFuncionarios = '$c2', Esforco = '$esforco', Score = '$score' WHERE Id = {$id}";
	if($connect->query($sql) === TRUE) {
		echo "<!DOCTYPE html>";
		echo "<html>";
		echo "<head>";
		echo "<title>Adicionar DICE</title>";
		echo "<meta charset='utf-8'>";
		echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
		echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>";
		echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>";
		echo "<style type='text/css'>";
		echo "fieldset {";
		echo "margin: auto;";
		echo "margin-top: 100px;";
		echo "width: 50%;";
		echo "}";
		echo "table tr th {";
		echo "padding-top: 20px;";
		echo "}";
		echo "</style>";
		echo "</head>";
		echo "<body>";
		echo "<div class='container'>";
		echo "<h2>Atualizado com sucesso!</h2>";
		echo "<a href='../index.php'><button type='button' class='btn btn-default'>Início</button></a>";
		echo "</div>";
		echo "</body>";
		echo "</html>";
	} else {
		echo "<!DOCTYPE html>";
		echo "<html>";
		echo "<head>";
		echo "<title>Adicionar DICE</title>";
		echo "<meta charset='utf-8'>";
		echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
		echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>";
		echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>";
		echo "<style type='text/css'>";
		echo "fieldset {";
		echo "margin: auto;";
		echo "margin-top: 100px;";
		echo "width: 50%;";
		echo "}";
		echo "table tr th {";
		echo "padding-top: 20px;";
		echo "}";
		echo "</style>";
		echo "</head>";
		echo "<body>";
		echo "<div class='container'>";
		echo "Erro ao atualizar registro : ". $connect->error;
		echo "</div>";
		echo "</body>";
		echo "</html>";
	}

	$connect->close();

}

?>