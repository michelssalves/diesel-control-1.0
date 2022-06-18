<?php
session_start();
include '../assets/controllers/config.php';
    $idveiculo = intval($_POST['id']);
	$sql = $pdo->prepare('SELECT * FROM veiculos WHERE id_veiculo = :id');
	$sql->execute(array(':id' => $idveiculo));
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
	{
		$return['id_veiculo'] = $row['id_veiculo'];
		$return['combustivel'] = $row['combustivel'];
	}
		echo json_encode($return);
				
?>