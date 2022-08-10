function post(imparam = {
	seletor: [],
	dados :{}
}) {

	debugger
	let seletor = imparam.seletor;
	let dados = {};
	if (imparam.dados.length == 0) {
		dados = preparaDadosParaPost(seletor);
	} else {
		dados = imparam.dados;
	}

	$.ajax({
		url: "Core/mysqlControl.php",
		data: dados,
		method: "Post",
	}).done(function () {
		alert("enviado");
	});
}


function preparaDadosParaPost(elemento = []) {

	let seletor = elemento;
	const dados = {};

	//verifica se foi enviado um elemento Pai para preparar os inputs, caso contrario ele pegara todos os inputs da tela;
	seletor.length == 0 ? arrayInputs = $('[name]') : arrayInputs = $(seletor).find('[name]');
		
	for (const input of arrayInputs) {
		let value = input.value;
		let name = input.name;

		let checkName = name.split("_");
		let acao = checkName[2];

		if (checkName.length === 5 && (acao == "u" || acao == "i" || acao == "d")) {
			dados[name] = value;
		} else {
			console.log(
				`Nome de Input ${name} esta fora dos parametros e não será enviado!`
			);
		}
	}

	console.log(`dados enviados por post: `);
	console.log(dados);
	return dados;
}