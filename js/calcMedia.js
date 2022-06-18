function retornaMedia(media) {
	return document.getElementById(media);
}
function getMedia(media) {
	const mediaVeiculo = document.getElementById(media).value.replace(',', '.');
	return parseFloat(mediaVeiculo);
}
function calcularMedia() {
	let kmrodado = getMedia('diferencakm');
	let litros = getMedia('litros');
 
		const mediaVeiculo = (kmrodado/litros).toFixed(2);
		retornaLitros('media').value = mediaVeiculo;
	

}