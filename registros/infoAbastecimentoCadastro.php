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
	$sql = $pdo->prepare('SELECT * FROM abastecimentos  
	WHERE id_veiculo = :idveiculo  ORDER BY data_abastecimento DESC LIMIT 1');
	$sql->bindValue('idveiculo', $idveiculo);
	$sql->execute();
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
	{
		$return['km'] = $row['km'];
		$return['hr'] = $row['hr'];
	}
		echo json_encode($return)
?>