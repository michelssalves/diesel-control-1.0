<?php
session_start();
include 'config.php';
$base= $_SERVER['DOCUMENT_ROOT'].'/diesel-control/index.php';
$acao = $_REQUEST['acao'];

$id_funcionario = $_SESSION['id_funcionario'];
$token = $_SESSION['token'];


$sql = $pdo->prepare("SELECT * FROM funcionarios WHERE id_funcionario = :id_funcionario");
$sql->bindValue(':id_funcionario',$id_funcionario);
$sql->execute();
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach($lista as $row){
    $idLogado =  $row['id_funcionario'];
    $usuarioLogado =  $row['usuario'];
    $nomeLogado = $row['nome'];
    $tokenLogado = $row['token'];
}

if($idLogado <> $id_funcionario || $tokenLogado <> $token){
    session_destroy();
    header("Location: login-diesel-control-1.0");
}
if($acao == 'sair'){
    session_destroy();
    header("Location:  login-diesel-control-1.0");
}
?>