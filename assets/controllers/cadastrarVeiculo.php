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

if($acao == 'cadastrar-veiculo'){

$numero_equipamento = strtoupper($_POST['numero_equipamento']);
$prefixo = strtoupper($_POST['prefixo']);
$placa = strtoupper($_POST['placa']);
$descricao_caminhao = strtoupper($_POST['descricao_caminhao']);
$renavam = strtoupper($_POST['renavam']);
$chassi = strtoupper($_POST['chassi']);
$numero_motor = strtoupper($_POST['numero_motor']);
$ano = strtoupper($_POST['ano']);
$marca = strtoupper($_POST['marca']);
$modelo = strtoupper($_POST['modelo']);
$combustivel = strtoupper($_POST['combustivel']);
$metodo = strtoupper($_POST['metodo']);
$setor = strtoupper($_POST['setor']);
$status_veiculo = strtoupper($_POST['status_veiculo']);

if($numero_equipamento){
	if($prefixo){
		if($placa){
			$sql = $pdo->prepare("INSERT INTO veiculos(
			numero_equipamento,
			prefixo,
			placa,
			descricao_caminhao,
			renavam,
			chassi,
			numero_motor,
			ano,
			marca,
			modelo,
			combustivel,
			metodo,
			setor,
			status_veiculo)
			VALUES(
			:numero_equipamento,
			:prefixo,
			:placa,
			:descricao_caminhao,
			:renavam,
			:chassi,
			:numero_motor,
			:ano,
			:marca,
			:modelo,
			:combustivel,
			:metodo,
			:setor,
			:status_veiculo)");


			$sql->bindValue(':numero_equipamento', $numero_equipamento);
			$sql->bindValue(':prefixo', $prefixo);
			$sql->bindValue(':placa', $placa);
			$sql->bindValue(':descricao_caminhao', $descricao_caminhao);
			$sql->bindValue(':renavam', $renavam);
			$sql->bindValue(':chassi', $chassi);
			$sql->bindValue(':numero_motor', $numero_motor);
			$sql->bindValue(':ano', $ano);
			$sql->bindValue(':marca', $marca);
			$sql->bindValue(':modelo', $modelo);
			$sql->bindValue(':combustivel', $combustivel);
			$sql->bindValue(':metodo', $metodo);
			$sql->bindValue(':setor', $setor);
			$sql->bindValue(':status_veiculo', $status_veiculo);
			$sql->execute();
		   header("Location: controle-almoxarifado");
			exit;

		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Não foi encontrado esse veiculo!</div>";
			header("cadastrar-veiculo-v1");
			exit;
		}
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>O Km Informado está incorreto!</div>";
	header("cadastrar-veiculo-v1");
	exit;
}
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>O Odometro informado está incorreto!</div>";
	header("Location: cadastrar-veiculo-v1");
	exit;
}	
}

  

