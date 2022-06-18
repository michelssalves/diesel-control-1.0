<?php
include('../verifica_login_registro_abastecimento.php');
if (!isset($_SESSION)) {
    session_start();
}
require_once ('../conexao01.php');

$id_veiculo = $_POST['id_veiculo'];
$numero_equipamento = $_POST['numero_equipamento'];
$placa = $_POST['placa'];
$metodo = $_POST['metodo'];
$bomba = $_POST['bomba'];
$litros_od = $_POST['litros_od'];
$media = $_POST['media'];
$prefixo = $_POST['prefixo'];
$ultimokm = $_POST['ultimokm']; 
$km = $_POST['km']; 
$diferencakm = $_POST['diferencakm'];
$hr = $_POST['hr']; 
$combustivel = $_POST['combustivel']; 
$odometroinicial = $_POST['odometroinicial']; 
$odometrofinal = $_POST['odometrofinal']; 
$litros = $_POST['litros']; 
$frentista = $_POST['frentista'];
$datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
$datahora = $datahora1->format("Y-m-d H:i:s");	
$datahora2 = $datahora1->format("d-m-Y H:i:s");	
$dataabastecimento2 = $datahora1->format("Y-m-d");
$diferenca = 3000;
$abastecimento = 400;

if($litros_od < $abastecimento){
	if($id_veiculo){
		if($id_veiculo){

		$sql = $pdo->prepare("INSERT INTO abastecimentos (
		id_veiculo,	 
		combustivel, 
		bomba,
		odometroinicial,
		ultimokm,	
		km,
		diferencakm,
		hr, 
		frentista,	
		odometrofinal, 
		litros,
		litros_od,
		media,
		data_abastecimento,
		dataabastecimento2) 
		VALUES (	
		:id_veiculo, 
		:combustivel, 
		:bomba, 
		:odometroinicial,
		:ultimokm,
		:km, 
		:diferencakm,
		:hr, 
		:frentista,
		:odometrofinal,
		:litros,
		:litros_od,
		:media,
		:datahora,
		:dataabastecimento2)");
		$sql->bindValue(':id_veiculo', $id_veiculo);
		$sql->bindValue(':combustivel', $combustivel);
		$sql->bindValue(':bomba', $bomba);
		$sql->bindValue(':odometroinicial', $odometroinicial);
		$sql->bindValue(':ultimokm', $ultimokm);
		$sql->bindValue(':km', $km);
		$sql->bindValue(':diferencakm', $diferencakm);
		$sql->bindValue(':hr', $hr);
		$sql->bindValue(':frentista', $frentista);
		$sql->bindValue(':odometrofinal', $odometrofinal);
		$sql->bindValue(':litros', $litros);
		$sql->bindValue(':litros_od', $litros_od);
		$sql->bindValue(':media', $media);
		$sql->bindValue(':datahora', $datahora);
		$sql->bindValue(':dataabastecimento2', $dataabastecimento2);
		$sql->execute();
		$_SESSION['msg'] = "<div class='alert alert-sucess'>Cadastro Realizado com Sucesso!</div>";
		header("Location: ../registros/registroDeAbastecimento.php");
		exit;
    	header("Location: ../registros/registroDeAbastecimento.php");



		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Não foi encontrado esse veiculo!</div>";
			header("Location: ../registros/registroDeAbastecimento.php");
			exit;
		}

}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>O Km Informado está incorreto!</div>";
	header("Location: ../registros/registroDeAbastecimento.php");
	exit;
}
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>O Odometro informado está incorreto!</div>";
	header("Location: ../registros/registroDeAbastecimento.php");
	exit;
}	


  

