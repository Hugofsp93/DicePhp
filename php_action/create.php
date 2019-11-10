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
	
	$sql = "INSERT INTO Dice (Nome, Duracao, Integridade, CGerencia, CFuncionarios, Esforco, Score) VALUES ('$nome', '$duracao', '$integridade', '$c1', '$c2', '$esforco', '$score')";
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
		echo "<p>Registro criado com sucesso</p>";
		echo "<a href='../create.php'><button type='button'>Voltar</button></a>";
		echo "<a href='../index.php'><button type='button'>Início</button></a>";
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
		echo "Erro " . $sql . ' ' . $connect->connect_error;
		echo "</body>";
		echo "</html>";
	}

	$connect->close();
}

?>