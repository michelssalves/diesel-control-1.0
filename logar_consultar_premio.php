<?php
session_start();
require 'conexao01.php';

if (isset($_POST['matricula']) && !empty($_POST['matricula']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
	$matricula = addslashes($_POST['matricula']);
	$senha = addslashes($_POST['senha']);

	$sql = $pdo->prepare("SELECT * FROM funcionarios WHERE matricula = :matricula AND senha = :senha");
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
		$token = md5(time().rand(0,9999).time());
		$sql = $pdo->prepare("UPDATE funcionarios SET token = :token WHERE matricula = :matricula");
		$sql->bindValue(':token',($token));
		$sql->bindValue(':matricula', $matricula);
		$sql->execute();

	
		if ($tipo_acesso['tipo_acesso'] == 3) {
			$_SESSION['tipo_acesso'] = $tipo_acesso;
			$_SESSION['token'] = $token;
			$_SESSION['matricula'] = $matricula;
			$_SESSION['id_funcionario'] = $id_funcionario['id_funcionario'];
			$_SESSION['nome'] = $nome['nome'];
			header('Location: ../premio/consultarPremio.php');
			exit();
		}elseif($tipo_acesso['tipo_acesso'] == 4){
			$_SESSION['token'] = $token;
			$_SESSION['matricula'] = $matricula;
			$_SESSION['id_funcionario'] = $id_funcionario['id_funcionario'];
			$_SESSION['nome'] = $nome['nome'];
			header('Location: ../upload_premio/uploadPremioHtml.php');
			exit();
		}
	}else {
		$_SESSION['msg'] = "<div class='alert alert-danger'></div>";
		header('Location: login_consultar_premio.php');
		exit();
	}
} else {
	$_SESSION['msg'] = "<div class='alert alert-danger'></div>";
	header('Location: login_consultar_premio.php');
	exit();
}
