<?php
	include('my_classes.php');

	$newCar = new Vehicle(0, '', '', '', 0);
	$newMotor = new Motor(0, '', 0, 0 , '');
	$motor_id=0;

	if($_POST && isset($_POST['submit'])){
		$model = $_POST['model'];
		$brand = $_POST['brand'];
		$color = $_POST['color'];
		$motor_id = $_POST['motor_id'];

		if(isset($_POST['position'], $_POST['cylinders'], $_POST['literage'], $_POST['note'])){
			$position = $_POST['position'];
			$cylinders = $_POST['cylinders'];
			$literage = $_POST['literage'];
			$note = $_POST['note'];

			// Verifica se os campos estão vazios se não adiona
			// os novos valores a uma nova classe e adiona ao array de motores
			if($position != '' && $cylinders != 0 && $literage != 0){
				$motor_id = count($motors) + 1;
				$newMotor->set_id($motor_id);
				$newMotor->set_posicionamento_cilindro($position);
				$newMotor->set_cilindros($cylinders);
				$newMotor->set_litragem($literage);
				$newMotor->set_observacao($note);
				array_push($motors, $newMotor);
			}

			$newCar->set_motor_id($motor_id);
			
		}

		// Verifica se os campos estão vazios se não adiona
		// os novos valores a uma nova classe e adiona ao array de carros
		if($model != '' && $brand != '' && $color != ''){
			$newCar->set_id(count($cars) + 1);
			$newCar->set_modelo($model);
			$newCar->set_marca($brand);
			$newCar->set_cor($color);
			array_push($cars, $newCar);
		}
		
		$data_array = [
			'carros' => [],
			'motores' => []
		];

		foreach($cars as $car){
			array_push($data_array['carros'], $car->to_array());
		}
	
		foreach($motors as $motor){
			array_push($data_array['motores'], $motor->to_array());
		}

		$info = $data_array;
	} else {
		$info = $data;
	}

	print_r((is_string($info))? $info: json_encode($info));
	// Toda vez que executa esse commando o vscode exclui o arquivo e imprede de criá-lo novamente
	//echo sendData('localhost:8000/assets/utils/infos.php', (is_string($info))? $info: json_encode($info));
?>