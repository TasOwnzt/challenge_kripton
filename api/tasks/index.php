<?php
	date_default_timezone_set('America/Sao_Paulo');

	if($_POST){
		//$limit = ($_GET['limit'])? $_GET['limit']:5;
		$limit = in_array('limite', $_POST)? $_POST['limite'] : 5;
		$page = in_array('pagina', $_POST)? $_POST['pagina'] : 1;
		//$page =  ($_GET['page'])? $_GET['page']:1;
		$now = date("H:i");

		if($limit < 1){
			echo 'O limite não pode ter um valor negativo';
		}

		if($page < 1){
			echo 'O limite não pode ter um valor negativo';
		}

		$data = array(
			'atividade' => 'Fazer alguma coisa',
			'hora' => $now
		);

		echo 'PAssou aqui';
		$data = array_push($data,
			[
			'atividade' => ($_POST['atividade'])? $_POST['atividade']: '',
			'hora' => $now
			]);
	}


	print_r(json_encode($data));