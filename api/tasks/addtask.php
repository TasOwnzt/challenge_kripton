<?php
date_default_timezone_set('America/Sao_Paulo');

$now = date("H:i");

$data = [ 
	'atividade' => 'Primeira atividade do dia',
	'hora' => $now
];

$start_api = curl_init('http://localhost/api/tasks');

curl_setopt_array($start_api, [
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => $data,
]);

curl_exec($start_api);

curl_close($start_api);
?>