<?php
session_start();
require '../conexao01.php';

if (isset($_POST['matricula']) && !empty($_POST['matricula']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
	$matricula = addslashes($_POST['matricula']);
	$senha = addslashes($_POST['senha']);

	$sql = "SELECT * FROM funcionarios WHERE matricula = :matricula AND senha = :senha";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(':matricula', $matricula);
	$sql->bindValue(':senha', md5($senha));
	$sql->execute();
	$qtde = $sql->rowCount();


	if ($sql->rowCount() > 0) {
		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			$id_funcionario['id_funcionario'] = $row['id_funcionario'];
			$tipo_acesso['tipo_acesso'] = $row['tipo_acesso'];
			$nome['nome'] = $row['nome'];
		}
		if ($tipo_acesso['tipo_acesso'] == 4) {
			$_SESSION['tipo_acesso'] = $tipo_acesso;
			$_SESSION['usuario'] = $usuario;
			header('Location: ../rh/atestadosHtml.php');
			exit();
		}
	}
} else {
	header('Location: ../index.php');
	exit();
}
