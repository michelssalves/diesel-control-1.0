function retornaDiferencaHr(diferencahr) {
	return document.getElementById(diferencahr);
}
function getDiferencaHr(diferencahr) {
	let dif= document.getElementById(diferencahr).value.replace(',', '.');
	return parseFloat(dif) * 100;
}
function calcularDiferencaHr() {
	let hrAtual = getDiferencaHr('hr');
	let hrAnterior = getDiferencaHr('ultimohr');
	if (hrAnterior < hrAtual) {
		const diferencahr = hrAtual - hrAnterior;
		retornaDiferencaHr('diferencahr').value = diferencahr / 100;
	} else {
		retornaDiferencaHr('diferencahr').value = 0;
	}
}