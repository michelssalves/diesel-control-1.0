<?php
session_start();
include '../assets/controllers/config.php';
$id_funcionario = $_SESSION['id_funcionario'];
$tipo_acesso = $_SESSION['tipo_acesso'] ;
$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];
$matricula = $_SESSION['matricula'];
$token = $_SESSION['token'];
include '../assets/controllers/checkAcess.php';

$id_abastecimento = $_GET['id_abastecimento'];

if ($id_abastecimento) {

    $sql = $pdo->prepare('DELETE FROM abastecimentos WHERE id_abastecimento = :id_abastecimento');
    $sql->bindValue(':id_abastecimento', $id_abastecimento);
    $sql->execute();


header("Location:relatoriosHtml.php");
exit;

}
