<?php
session_start();
require '../assets/controllers/config.php';

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