<?php
include('../login/verifica_login_relatorio_abastecimento.php');
if (!isset($_SESSION)) {
    session_start();
}
require_once('../conexao01.php');
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