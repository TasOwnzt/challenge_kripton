let isAddMotorEnable = false;

const showUp = (className, displayType)=> {
	document.querySelector(className).style.display = displayType;
}

// Verifica se os campos estão vazios e retorna verdadeira se a condição se satisfaça
const checkCampEmpty = () =>{
	const brand = document.getElementById('brand').value === '';
	const model = document.getElementById('model').value === '';
	const color = document.getElementById('color').value === '';

	if(isAddMotorEnable){
		const position = document.getElementById('position').value === '';
		const cylinders = parseInt(document.getElementById('cylinders').value) === 0;
		const literege = parseInt(document.getElementById('literage').value) === 0;

		return position || cylinders || literege || brand || model || color;
	} else
		return brand || model || color;
}

const clearCamps = () => {
	document.getElementById('brand').value = '';
	document.getElementById('model').value = '';
	document.getElementById('color').value = '';

	if(isAddMotorEnable){
		document.getElementById('position').value = '';
		document.getElementById('cylinders').value = '';
		document.getElementById('literage').value = '';
		document.getElementById('note').value = '';
	}
}

const closeModal = document.querySelectorAll('#close').forEach((btn) => {
	btn.onclick = (evt) => {
		showUp('.modal', 'none');
		showUp('.newMotor', 'none');
		showUp('.modal .viewMotor', 'none');
	}
})

document.getElementById('submit').onsubmit = (evt) => {
	evt.preventDefault();

	if(checkCampEmpty()){
		alert('Os campos fornecidos não podem estar vazios.');
		return
	}
	clearCamps();
	showUp('.modal', 'none');
	isAddMotorEnable = false;
}

const showMotorAdd = (evt) => {;
	evt.preventDefault();
	isAddMotorEnable = true;
	showUp('.newMotor', 'block');
}

const showModal = (evt)=>{
	showUp('.modal', 'flex');
	showUp('.modal .wrapper', 'block');
	showUp('.modal .viewMotor', 'none');
}

const showModalMotor = async (evt)=> {
	showUp('.modal .wrapper', 'none');
	showUp('.modal', 'flex');
	showUp('.modal .viewMotor', 'flex');

	const motorId = evt.currentTarget.dataset['motorId'];

	data = await getData();

	data['motores'].forEach(motor => {

		// Imprimi no modal o motor relativo ao id correspondente
		if(motorId == motor['id']){
			document.querySelector('#viewPosition').textContent = motor['posicionamento_cilindros'];
			document.querySelector('#viewCylinders').textContent = motor['cilindros'];
			document.querySelector('#viewLiterage').textContent = motor['litragem'] + ' l/km';
			document.querySelector('#viewNote').textContent = motor['observacao'];
		}
	});
}

// Mantém oculto o modal ao iniciar a página
showUp('.modal', 'none');
showUp('.newMotor', 'none');
showUp('.modal .viewMotor', 'none');