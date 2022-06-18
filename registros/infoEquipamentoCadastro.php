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

    $idveiculo = intval($_POST['id']);
	$sql = $pdo->prepare('SELECT * FROM veiculos WHERE id_veiculo = :idveiculo');
	$sql->bindValue('idveiculo', $idveiculo);
	$sql->execute();
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
	{
		$return['id_veiculo'] = $row['id_veiculo'];
		$return['numero_equipamento'] = $row['numero_equipamento'];
		$return['placa'] = $row['placa'];
		$return['metodo'] =  $row['metodo'];
		$return['combustivel'] =  $row['combustivel'];
	}
		echo json_encode($return)
?>