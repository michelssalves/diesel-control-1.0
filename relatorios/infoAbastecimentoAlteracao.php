<?php
session_start();
require '../assets/controllers/cofig.php';
    $idveiculo = intval($_POST['id']);
	$sql = $pdo->prepare('SELECT * FROM veiculos AS v  
	JOIN abastecimentos AS a 
	ON a.id_veiculo = v.id_veiculo
	WHERE v.id_veiculo = :id  ORDER BY a.km DESC LIMIT 1');
	$sql->bindValue('id', $idveiculo);
	$sql->execute();
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
	{
		$return['id_veiculo'] = $row['id_veiculo'];
		$return['numero_equipamento'] = $row['numero_equipamento'];
		$return['placa'] = $row['placa'];
		$return['metodo'] =  $row['metodo'];
		$return['combustivel'] =  $row['combustivel'];
		$return['km'] = $row['km'];
		$return['hr'] = $row['hr'];
	}
		echo json_encode($return)
?>