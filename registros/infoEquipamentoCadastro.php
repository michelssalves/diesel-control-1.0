<?php
include('../login/verifica_login_registro_abastecimento.php');
if (!isset($_SESSION)) {
    session_start();
}
require_once('../conexao01.php');
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