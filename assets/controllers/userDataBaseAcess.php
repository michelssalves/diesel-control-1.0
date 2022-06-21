<?php

$acao = $_POST['acao'];

echo $usuario = addslashes($_POST['usuario']);
echo $senha = addslashes($_POST['senha']);

if($acao == 'login'){

if (isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
	
	
	$token = md5(time() . rand(0, 9999) . time());
	$sql = $pdo->prepare("UPDATE funcionarios SET token = :token WHERE usuario = :usuario AND senha = :senha");
	$sql->bindValue(':token', $token);
	$sql->bindValue(':usuario', $usuario);
	$sql->bindValue(':senha', md5($senha));
	$sql->execute();

	$sql = $pdo->prepare("SELECT * FROM funcionarios WHERE usuario = :usuario AND senha = :senha");
	$sql->bindValue(':usuario', $usuario);
	$sql->bindValue(':senha', md5($senha));
	$sql->execute();

	var_dump($sql);

	if ($sql->rowCount() > 0) {
		

		while ($row = $sql->fetchAll(PDO::FETCH_ASSOC)) {
			$id_funcionario = $row['id_funcionario'];
			$tipo_acesso = $row['tipo_acesso'];
			$nome = $row['nome'];
			$usuario = $row['usuario'];
			$matricula = $row['matricula'];
			$token = $row['token'];
		}
		var_dump($row);
		if ($tipo_acesso == 1) {
	
			$_SESSION['id_funcionario'] = $id_funcionario;
			$_SESSION['tipo_acesso'] = $tipo_acesso;
			$_SESSION['nome'] = $nome;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['matricula'] = $matricula;
			$_SESSION['token'] = $token;
			$_SESSION['nome'] = $nome['nome'];

			header('Location: abastecimento-da-frota');
			exit();

		} elseif ($tipo_acesso == 2) {

			$_SESSION['id_funcionario'] = $id_funcionario;
			$_SESSION['tipo_acesso'] = $tipo_acesso;
			$_SESSION['nome'] = $nome;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['matricula'] = $matricula;
			$_SESSION['token'] = $token;
			
		header('Location: controle-almoxarifado');
			exit();
		} else {
			$_SESSION['msg'] = "<div class='alert alert-danger'>Usuário ou senha incorreta!</div>";
		//	header('Location:login-diesel-control-v1');
		//	exit();
		}
	}}
	else {
			$_SESSION['msg'] = "<div class='alert alert-danger'>Usuário ou senha incorreta!</div>";
		//	header('Location:login-diesel-control-v1');
		//	exit();
		}
}