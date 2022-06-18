function retornaDiferencaKm(diferencakm) {
	return document.getElementById(diferencakm);
}
function getDiferencaKm(diferencakm) {
	const diferencaKm = document.getElementById(diferencakm).value.replace(',', '.');
	return parseFloat(diferencaKm) * 100;
}
function calcularDiferencaKm() {
	let kmAtual = getDiferencaKm('km');
	let kmAnterior = getDiferencaKm('ultimokm');
	if (kmAnterior < kmAtual) {
		const diferencaKm = kmAtual - kmAnterior;
		retornaDiferencaKm('diferencakm').value = diferencaKm / 100;
	} else {
		retornaDiferencaKm('diferencakm').value = 0;
	}
}