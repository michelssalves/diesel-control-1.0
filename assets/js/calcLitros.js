function retornaLitros(litros_od, odometroinicial, odometrofinal) {
	return document.getElementById(litros_od, odometroinicial, odometrofinal);
}
function getLitrosOd(litros_od) {
	const litrosAbastecidos = document.getElementById(litros_od).value.replace(',', '.');
	return parseFloat(litrosAbastecidos);
}
function calcularLitrosOd() {
	let odometroFinal = getLitrosOd('odometrofinal');
	let odometroInicial = getLitrosOd('odometroinicial');
 
		const litrosAbastecidos = (odometroFinal - odometroInicial).toFixed(2);;
		retornaLitros('litros_od').value = litrosAbastecidos;
	

}