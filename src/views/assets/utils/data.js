
const getData = async ()=>{
	const capture = await fetch('https://apiintranet.kryptonbpo.com.br/test-dev/exercise-1');
	const data = await capture.json();
	return data;
}

// getData().then((value) => console.log(value['carros']));

// getData().then((value) => value['carros'].forEach((carro) => {
// 	// console.log('-------------------------');
// 	//addLine(carro)
// }));


// Cria uma nova linha de dados a cada nova chamada
const addLine = (datas)=>{
	const tablebody = document.querySelector('table tbody');
	const line = document.createElement('tr');
	
	tablebody.appendChild(line);
	
	// Irá criar uma nova célula de dados a cada interação
	for(const key in datas){
		if(key === 'motor_id')
			continue
		const cell = document.createElement('td');
		cell.textContent = datas[key];
		line.dataset['id'] = datas['id'];
		line.appendChild(cell);
	}
}