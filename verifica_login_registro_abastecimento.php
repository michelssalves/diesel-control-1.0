<?php
session_start();
require 'conexao01.php';

$id_funcionario = intval($_SESSION['id_funcionario']);
$keygen = 1;


$sql = $pdo->prepare('SELECT * FROM funcionarios where id_funcionario = :id_funcionario');
$sql->bindValue(':id_funcionario', $id_funcionario);
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
	$token['token'] = $row['token'];
	$tipo_acesso['tipo_acesso'] = $row['tipo_acesso'];
};

if(!$_SESSION['id_funcionario'] && !$_SESSION['usuario'] && !$_SESSION['nome'] && !$_SESSION['token'] && !$_SESSION['tipo_acesso'] ){
	session_destroy();
	header('Location: index.php');
	exit();
}

if($_SESSION['token'] != $token['token']){
	session_destroy();
	header('Location: index.php');
	exit();
}
if($tipo_acesso['tipo_acesso'] != $keygen){
	session_destroy();
	header('Location: index.php');
	exit();
}
