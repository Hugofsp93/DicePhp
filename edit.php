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
		<script src="js/validator.min.js"></script>
	</head>
	<body>
		<div class="container">
			<br>
			<div class="alert alert-info" style="margin-bottom: 0px;">
				<strong>Aviso:</strong> Para seguir os valores padrões do DICE, os valores devem variar de 1 a 4.
			</div>
			<div class="row" style="display: inline-flex;">
				<h2>Editar Projeto</h2>
				<button type='button' class='btn btn-default' id="info_dice" data-toggle="modal" data-target="#info_dice_modal" style="height: 35px; margin-left: 30px; margin-top: 20px;">Tabela informativa</button>
			</div>
			<br>
			<br>
			<form action="php_action/update.php" method="post">
				<div class="form-group">
					<label for="text">Nome:</label>
					<input type="text" class="form-control" name="nome" placeholder="Qual nome do projeto?" data-error="Por favor, informe o nome do projeto." required value="<?php echo $data['Nome'] ?>">
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="text">Duração:</label>
					<input type="number" class="form-control" name="duracao" placeholder="Qual a duração do projeto?" data-error="Por favor, informe a duração do projeto." required value="<?php echo $data['Duracao'] ?>">
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="number">Integridade:</label>
					<input type="number" class="form-control" name="integridade" placeholder="Qual a integridade do projeto?" data-error="Por favor, informe a integridade do projeto." required value="<?php echo $data['Integridade'] ?>">
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="number">Comprometimento da Gerência:</label>
					<input type="number" class="form-control" name="c1" placeholder="Compromentimento da diretoria" data-error="Por favor, informe o comprometimento da diretoria no projeto." required value="<?php echo $data['CGerencia'] ?>">
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="number">Comprometimento dos Funcionários:</label>
					<input type="number" class="form-control" name="c2" placeholder="Compromentimento dos funcionários" data-error="Por favor, informe o comprometimento dos funcionários no projeto." required value="<?php echo $data['CFuncionarios'] ?>">
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="number">Esforço:</label>
					<input type="number" class="form-control" name="esforco" placeholder="Qual o esforço do projeto?" data-error="Por favor, informe o esforço do projeto." required value="<?php echo $data['Esforco'] ?>">
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="id" value="<?php echo $data['Id']?>" />
				<button type="submit" class="btn btn-default">Salvar</button></td>
				<a href="index.php"><button type="button" class="btn btn-default">Voltar</button></a>
			</form>
		</div>
	</body>
	<div class="fade modal" id="info_dice_modal" tabindex="-1" role="dialog"
  aria-labelledby="info_dice_modal_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="info_dice_modal_label">Tabela informativa DICE</h4>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="background-color: rgba(0,0,0,.115);">
							<th style="width: 50%;">Pontuação</th>
							<th>Parecer</th>
						</tr>
					</thead>
					<tbody>
						<tr style="">
							<th>Entre 7 e 14</th>
							<th>Zona da vitória</th>
						</tr>
						<tr style="">						
							<th>Entre 14 e 17</th>
							<th>Zona de preocupação</th>
						</tr>
						<tr style="">
							<th>Maior que 17</th>
							<th>Zona de imprevisibilidade</th>
						</tr>
					<tbody>
				</table>
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="background-color: rgba(0,0,0,.115);">
							<th style="width: 50%;">Duração</th>
							<th>Valor de referência</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th> < 2 meses</th>
							<th>1</th>
						</tr>
						<tr>						
							<th>Entre 2 e 4 meses</th>
							<th>2</th>
						</tr>
						<tr>
							<th>Entre 4 e 8 meses</th>
							<th>3</th>
						</tr>
						<tr>						
							<th> > 8 meses</th>
							<th>4</th>
						</tr>
					<tbody>
				</table>
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="background-color: rgba(0,0,0,.115);">
							<th style="width: 50%;">Integridade</th>
							<th>Valor de referência</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>Muito bom</th>
							<th>1</th>
						</tr>
						<tr>						
							<th>Bom</th>
							<th>2</th>
						</tr>
						<tr>
							<th>Médio</th>
							<th>3</th>
						</tr>
						<tr>						
							<th>Ruim</th>
							<th>4</th>
						</tr>
					<tbody>
				</table>
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="background-color: rgba(0,0,0,.115);">
							<th style="width: 50%;">Comprometimento da Diretoria</th>
							<th>Valor de referência</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>Comunicação clara e forte</th>
							<th>1</th>
						</tr>
						<tr>						
							<th>Parece quererem sucesso apenas</th>
							<th>2</th>
						</tr>
						<tr>
							<th>Neutros</th>
							<th>3</th>
						</tr>
						<tr>						
							<th>Relutantes</th>
							<th>4</th>
						</tr>
					<tbody>
				</table>
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="background-color: rgba(0,0,0,.115);">
							<th style="width: 50%;">Comprometimento dos Funcionários</th>
							<th>Valor de referência</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>Ansiosos</th>
							<th>1</th>
						</tr>
						<tr>						
							<th>Dispostos</th>
							<th>2</th>
						</tr>
						<tr>
							<th>Relutantes</th>
							<th>3</th>
						</tr>
						<tr>						
							<th>Fortemente relutantes</th>
							<th>4</th>
						</tr>
					<tbody>
				</table>
				<table class="table table-bordered table-striped">
					<thead>
						<tr style="background-color: rgba(0,0,0,.115);">
							<th style="width: 50%;">Esforço</th>
							<th>Valor de referência</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>< 10% adicional</th>
							<th>1</th>
						</tr>
						<tr>						
							<th>10-20% adicionais</th>
							<th>2</th>
						</tr>
						<tr>
							<th>20-40% adicionais</th>
							<th>3</th>
						</tr>
						<tr>						
							<th>> 40% adicional</th>
							<th>4</th>
						</tr>
					<tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal" style="padding: 5px">Voltar</button>
			</div>
    </div>
  </div>
</html>

<?php
}
?>