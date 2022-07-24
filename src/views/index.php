<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Challenge Kripton</title>

	<link rel="stylesheet" href="<?php echo join(DIRECTORY_SEPARATOR, [ASSETSDIR, 'styles', 'main.css']) ?>">
</head>
<body>
	<header>
		<h1>Desafio Kripton</h1>
	</header>
	<main>
		<h2>Tabela de Veículos</h2>
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Cor</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					include(join(DIRECTORY_SEPARATOR, [ASSETSDIR, "utils", "my_classes.php"]));
					
					foreach($cars as $car){
						echo '<tr data-motor-id="' . $car->get_motor_id() . '">';
						echo '<td>' . $car->get_id() . '</td>';
						echo '<td>' . $car->get_marca() . '</td>';
						echo '<td>' . $car->get_modelo(). '</td>';
						echo '<td>' . $car->get_cor() . addButtonView($car->get_motor_id()) . '</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
		<button onclick="showModal(event)">Novo Veículo</button>
	</main>
	<div class="modal">
		<div class='wrapper'>
			<button id='close'>x</button>
			<h2>Cadastrar Veículo</h2>
			<form action="<?php echo ASSETSDIR;?>utils/send.php" method="POST">
					<h3>Veículo</h3>
					<div class="camp">
						<label for="model">Modelo:</label>
						<input type="text" placeholder='Novo modelo' name='model' id='model'>
					</div>
					<div class="camp">
						<label for="model">Marca:</label>
						<input type="text" placeholder='Nova marca' name='brand' id='brand'>
					</div>
					<div class="camp">
						<label for="model">Cor:</label>
						<input type="text" placeholder='Cor do veículo' name='color' id='color'>
					</div>
					<h3>Motor</h3>
					<select name="motor_id" id="motor_id" class='showUp'>
						<?php
							foreach($motors as $motor){
								echo '<option value="' . $motor->get_id() . '">Motor #' . $motor->get_id() . '</option>';
							}
						?>
					</select>
					<button class='show' onclick='showMotorAdd(event)'>Adicionar Motor</button>
					<div class="newMotor">
						<div class="camp">
							<label for="model">Posicionamento Cilindro:</label>
							<input type="text" placeholder='Posição' name='position' id='position'>
						</div>
						<div class="camp">
							<label for="model">Cilindros:</label>
							<input type="number" placeholder='Quantidade' name='cylinders' id='cylinders'>
						</div>
						<div class="camp">
							<label for="model">Litragem:</label>
							<input type="text" placeholder='Consumo' name='literage' id='literage'>
						</div>
						<div class="camp">
							<label for="note">Observação:</label>
							<textarea name="note" id="note" cols="30" rows="5"></textarea>
						</div>
					</div>
					<button type="submit" id="submit" name="submit">Salvar</button>
			</form>
		</div>
		<div class="viewMotor">
			<button id='close'>x</button>
			<h2>Tipo de Motor</h2>
			<div class="container">
				<div class="viewCamp">
					<h3>Posicionamento</h3>
					<p id="viewPosition"></p>
				</div>
				<div class="viewCamp">
					<h3>Cilindros</h3>
					<p id="viewCylinders"></p>
				</div>
				<div class="viewCamp">
					<h3>Litragem</h3>
					<p id="viewLiterage"></p>
				</div>
				<div class="viewCamp">
					<h3>Observação</h3>
					<p id="viewNote"></p>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo join('/', [ASSETSDIR, 'utils', 'data.js']);?>"></script>
	<script src="<?php echo join('/', [ASSETSDIR, 'utils', 'main.js']);?>"></script>
</body>
</html>