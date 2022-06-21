<?php
session_start();
$id_funcionario = $_SESSION['id_funcionario'];
$tipo_acesso = $_SESSION['tipo_acesso'] ;
$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];
$matricula = $_SESSION['matricula'];
$token = $_SESSION['token'];
include '../assets/controllers/checkAcess.php';

$acao = $_REQUEST['acao'];

if($acao == 'registrar-abastecimento'){
	
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
$ultimohr = $_POST['ultimohr']; 
$hr = $_POST['hr']; 
$diferencahr = $_POST['diferencahr']; 
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
		ultimohr,
		hr,
		diferencahr,
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
	    :ultimohr,
		:hr,
		:diferencahr,
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
		$sql->bindValue(':ultimohr', $ultimohr);
		$sql->bindValue(':hr', $hr);
		$sql->bindValue(':diferencahr', $diferencahr);
		$sql->bindValue(':frentista', $frentista);
		$sql->bindValue(':odometrofinal', $odometrofinal);
		$sql->bindValue(':litros', $litros);
		$sql->bindValue(':litros_od', $litros_od);
		$sql->bindValue(':media', $media);
		$sql->bindValue(':datahora', $datahora);
		$sql->bindValue(':dataabastecimento2', $dataabastecimento2);
		$sql->execute();
		$_SESSION['msg'] = "<div class='alert alert-sucess'>Cadastro Realizado com Sucesso!</div>";
    	header("Location: abastecimento-da-frota");

		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Não foi encontrado esse veiculo!</div>";
			header("Location: abastecimento-da-frota");
			exit;
		}

}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>O Km Informado está incorreto!</div>";
	header("Location: abastecimento-da-frota");
	exit;
}
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>O Odometro informado está incorreto!</div>";
	header("Location: abastecimento-da-frota");
	exit;
}	
}






  

