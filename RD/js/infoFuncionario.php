<?php
require_once('../config.php');
    $id = $_POST['id'];
	$sql = $pdo->prepare('SELECT * FROM funcionariosRD WHERE id = :id');
	$sql->bindValue('id', $id);
	$sql->execute();
	while($row = $sql->fetch(PDO::FETCH_ASSOC))
	{
		$return['matricula'] = $row['matricula'];
		$return['nome'] = $row['nome'];
		
	}
		echo json_encode($return)
?>