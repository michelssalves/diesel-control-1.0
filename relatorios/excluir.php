<?php
session_start();
require '../assets/controllers/cofig.php';

$id_abastecimento = $_GET['id_abastecimento'];

if ($id_abastecimento) {

    $sql = $pdo->prepare('DELETE FROM abastecimentos WHERE id_abastecimento = :id_abastecimento');
    $sql->bindValue(':id_abastecimento', $id_abastecimento);
    $sql->execute();


header("Location:relatoriosHtml.php");
exit;

}
