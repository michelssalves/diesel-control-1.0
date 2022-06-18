<?php
include('../login/verifica_login_relatorio_abastecimento.php');
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
		$return['prefixo'] = $row['prefixo'];
		$return['numero_equipamento'] = $row['numero_equipamento'];
		$return['placa'] = $row['placa'];
		$return['descricao_caminhao'] = $row['descricao_caminhao'];
		$return['renavam'] = $row['renavam'];
		$return['chassi'] = $row['chassi'];
		$return['numero_motor'] = $row['numero_motor'];
		$return['ano'] = $row['ano'];
		$return['marca'] = $row['marca'];
		$return['modelo'] = $row['modelo'];
		$return['combustivel'] = $row['combustivel'];
		$return['metodo'] = $row['metodo'];
		$return['setor'] =  $row['setor'];
		$return['status_veiculo'] =  $row['status_veiculo'];
		$return['prefixo'] = $row['prefixo'];
	}
		echo json_encode($return)
?>