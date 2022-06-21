<?php
session_start();
include '../assets/controllers/config.php';
$id_funcionario = $_SESSION['id_funcionario'];
$tipo_acesso = $_SESSION['tipo_acesso'] ;
$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];
$matricula = $_SESSION['matricula'];
$token = $_SESSION['token'];
include '../assets/controllers/checkAcess.php';

$acao = $_REQUEST['acao'];

if($acao == 'alterar-veiculo'){

$id_veiculo = intval($_POST['id_veiculo']);
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

if($id_veiculo){
	if($id_veiculo){
		if($id_veiculo){
			$sql = $pdo->prepare("UPDATE veiculos SET
			numero_equipamento = :numero_equipamento,
			prefixo = :prefixo,
			placa = :placa,
			descricao_caminhao = :descricao_caminhao,
			renavam = :renavam,
			chassi = :chassi,
			numero_motor = :numero_motor,
			ano = :ano,
			marca = :marca,
			modelo = :modelo,
			combustivel = :combustivel,
			metodo = :metodo,
			setor = :setor,
			status_veiculo = :status_veiculo
			WHERE id_veiculo = :id_veiculo");
			$sql->bindValue(':id_veiculo', $id_veiculo);
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
			header("alterar-veiculo-v1");
			exit;
		}

}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>O Km Informado está incorreto!</div>";
	header("alterar-veiculo-v1");
	exit;
}
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>O Odometro informado está incorreto!</div>";
	header("Location: alterar-veiculo-v1");
	exit;
}	
}

  

