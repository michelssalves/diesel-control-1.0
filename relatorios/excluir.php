<?php
include('../login/verifica_login_relatorio_abastecimento.php');
if (!isset($_SESSION)) {
    session_start();
}
require_once('../conexao01.php');

$id_abastecimento = $_GET['id_abastecimento'];

if ($id_abastecimento) {

    $sql = $pdo->prepare('DELETE FROM abastecimentos WHERE id_abastecimento = :id_abastecimento');
    $sql->bindValue(':id_abastecimento', $id_abastecimento);
    $sql->execute();


header("Location:relatoriosHtml.php");
exit;

}
