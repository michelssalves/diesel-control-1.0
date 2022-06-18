<?php
session_start();
require 'conexao01.php';

if (isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
	
	$usuario = addslashes($_POST['usuario']);
	$senha = addslashes($_POST['senha']);

	$token = md5(time() . rand(0, 9999) . time());
	$sql = $pdo->prepare("UPDATE funcionarios SET token = :token WHERE usuario = :usuario");
	$sql->bindValue(':token', ($token));
	$sql->bindValue(':usuario', $usuario);
	$sql->execute();

	$sql = "SELECT * FROM funcionarios WHERE usuario = :usuario AND senha = :senha";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(':usuario', $usuario);
	$sql->bindValue(':senha', md5($senha));
	$sql->execute();
	$qtde = $sql->rowCount();


	if ($sql->rowCount() > 0) {

		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			$id_funcionario = $row['id_funcionario'];
			$tipo_acesso = $row['tipo_acesso'];
			$nome = $row['nome'];
			$nome = $row['usuario'];
			$matricula = $row['matricula'];
			$token = $row['token'];
		}

		if ($tipo_acesso['tipo_acesso'] == 1) {
			$_SESSION['id_funcionario'] = $id_funcionario['id_funcionario'];
			$_SESSION['tipo_acesso'] = $tipo_acesso['tipo_acesso'];
			$_SESSION['nome'] = $nome;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['matricula'] = $matricula;
			$_SESSION['token'] = $token;
			
			$_SESSION['nome'] = $nome['nome'];
			header('Location: abastecimento-da-frota');
			exit();
		} elseif ($tipo_acesso['tipo_acesso'] == 2) {
			$_SESSION['id_funcionario'] = $id_funcionario['id_funcionario'];
			$_SESSION['tipo_acesso'] = $tipo_acesso['tipo_acesso'];
			$_SESSION['nome'] = $nome;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['matricula'] = $matricula;
			$_SESSION['token'] = $token;

			header('Location: controle-almoxarifado');
			exit();
		} else {
			$_SESSION['msg'] = "<div class='alert alert-danger'></div>";
			header('Location:login-diesel-control-1.0');
			exit();
		}
	}
	else {
			$_SESSION['msg'] = "<div class='alert alert-danger'></div>";
			header('Location:login-diesel-control-1.0');
			exit();
		}
}
