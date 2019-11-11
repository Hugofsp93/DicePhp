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
			<button type='button' class='btn btn-default' id="info_dice" data-toggle="modal" data-target="#info_dice_modal">Tabela informativa</button>
			<br>
			<br>
			<p>Projetos cadastrados para cálculo da metodologia de projetos DICE</p>  
			<table class="table table-bordered table-striped">
				<thead>
					<tr style="background-color: rgba(0,0,0,.115);">
						<th style="width: 12%;">Nome</th>
						<th style="width: 12%;">Duração</th>
						<th style="width: 12%;">Integridade</th>
						<th style="width: 12%;">Comprometimento da Gerência</th>
						<th style="width: 12%;">Comprometimento dos Funcionários</th>
						<th style="width: 12%;">Esforço</th>
						<th style="width: 12%;">Pontuação</th>
						<th style="width: 16%;"></th>
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
</div>
</div>
</html>