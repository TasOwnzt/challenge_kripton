<?php

// function sendData($url, $data){
// 	$start = curl_init($url);

// 	curl_setopt($start, CURLOPT_CUSTOMREQUEST, 'POST');
// 	//curl_setopt($start, CURLOPT_POST, true);
// 	// curl_setopt($start, CURLOPT_POSTFIELDS, is_string($data)? $data: json_encode($data));
// 	curl_setopt($start, CURLOPT_POSTFIELDS, $data);
// 	curl_setopt($start, CURLOPT_RETURNTRANSFER, true);
// 	/* curl_setopt($start, CURLOPT_HTTPHEADER, [
// 		'Content-Type: application/json'
// 	]); */

// 	$response = curl_exec($start);

// 	curl_close($start);

// 	/* if (curl_errno($start)) {
// 		echo 'Error:' . curl_error($start);
// 	} */

// 	return $response;
// }


function getExternalData(string $url= "https://apiintranet.kryptonbpo.com.br/test-dev/exercise-1"){
	$result = json_decode(file_get_contents($url), true);

	return $result;
}

$data = getExternalData();

function getVehicles($d){
	$arr = [];
	
	foreach($d['carros'] as $car){
		array_push($arr, new Vehicle($car['id'], $car['modelo'], $car['marca'], $car['cor'], $car['motor_id']));
	}
	return $arr;
}

function getMotors($d) {
	$arr = [];
	
	foreach($d['motores'] as $motor){
		array_push($arr, new Motor($motor['id'], $motor['posicionamento_cilindros'], $motor['cilindros'], $motor['litragem'], $motor['observacao'] == NULL? '': $motor['observacao']));
	}
	return $arr;
}

$cars = getVehicles($data);
$motors = getMotors($data);

function addButtonView($id):string{
	return '<button data-motor-id="' . $id . '" onclick="showModalMotor(event)"><img src="/assets/icons/eye.png"\
			 alt="Visualizar Motor" title="Visualizar Motor" ></button>';
}

class Vehicle {
	private string $modelo;
	private string $marca;
	private int $id;
	private string $cor;
	private int $motor_id;
	private array $arr;

	public function __construct(int $id =0, string $modelo='', string $marca='', string $cor='', int $motor_id=0){
		$this->modelo = $modelo;
		$this->id = $id;
		$this->cor = $cor;
		$this->motor_id = $motor_id;
		$this->marca = $marca;
	}

	public function get_modelo() {
		return $this->modelo;
	}

	public function set_modelo($modelo) {
		$this->modelo = $modelo;
	}

	public function get_marca () {
		return $this->marca;
	}
	public function set_marca ($marca) {
		$this->marca = $marca;
	}

	public function get_id(){
		return $this->id;
	}
	public function set_id($id){
		$this->id = $id;
	}

	public function get_cor(){
		return $this->cor;
	}

	public function set_cor($cor){
		$this->cor = $cor;
	}

	public function get_motor_id() {
		return $this->motor_id;
	}
	public function set_motor_id($motor_id) {
		$this->motor_id = $motor_id;
	}

	public function to_json() {
		return json_encode($this->to_array());
	}

	public function to_array(){
		return array(
			'id' => $this->id,
			'modelo' => $this->modelo,
			'marca' => $this->marca,
			'cor' => $this->cor,
			'motor_id' => $this->motor_id
		);
	}
}

class Motor {
	private int $id;
	private string $pos_cilindros;
	private int $cilindros;
	private int $litragem;
	private string $obs;

	public function __construct(int $id,
								string $pos_cilindros,
								int $cilindros,
								int $litragem,
								string $obs) {
		$this->id = $id;
		$this->pos_cilindros = $pos_cilindros;
		$this->cilindros = $cilindros;
		$this->litragem = $litragem;
		$this->obs = $obs == NULL? '': $obs;
	}

	public function get_posicionamento_cilindro() {
		return $this->pos_cilindros;
	}

	public function set_posicionamento_cilindro($pos_cilindros) {
		$this->pos_cilindros = $pos_cilindros;
	}

	public function get_cilindros () {
		return $this->cilindros;
	}
	public function set_cilindros ($cilindros) {
		$this->cilindros = $cilindros;
	}

	public function get_id(){
		return $this->id;
	}
	public function set_id($id){
		$this->id = $id;
	}

	public function get_litragem(){
		return $this->litragem;
	}

	public function set_litragem($litragem){
		$this->litragem = $litragem;
	}

	public function get_observacao() {
		return $this->obs;
	}
	public function set_observacao($obs) {
		$this->obs = $obs;
	}

	public function to_json() {
		return json_encode($this->to_array());
	}

	public function to_array(){
		return array(
			'id' => $this->id,
			'cilindros' => $this->cilindros,
			'posicionamento_cilindros' => $this->pos_cilindros,
			'litragem' => $this->litragem,
			'observacao' => $this->obs
		);
	}
}
?>