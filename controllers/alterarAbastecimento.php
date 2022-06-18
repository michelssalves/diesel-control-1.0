<?php
include('../verifica_login_relatorio_abastecimento.php');
if (!isset($_SESSION)) {
    session_start();
}
require_once('../conexao01.php');

$combustivel = $_POST['combustivel'];
$odometroinicial = $_POST['odometroinicial'];
$odometrofinal = $_POST['odometrofinal'];
$litros = $_POST['litros'];
$ultimokm = $_POST['ultimokm'];
$km = $_POST['km'];
$hr = $_POST['hr'];
$frentista = $_POST['frentista'];
$litros_od = $_POST['litros_od'];
$diferencakm = $_POST['diferencakm'];
$media = $_POST['media'];
$id_abastecimento = intval($_POST['id_abastecimento']);
$id_veiculo = $_POST['id_veiculo'];

if($id_veiculo){
        $sql = $pdo->prepare("UPDATE abastecimentos SET
        id_veiculo = :id_veiculo,
        odometroinicial = :odometroinicial,
        combustivel = :combustivel,
        ultimokm = :ultimokm,
        km = :km,
        diferencakm = :diferencakm,
        hr = :hr,
        frentista = :frentista,
        odometrofinal = :odometrofinal,
        litros = :litros,
        litros_od = :litros_od,
        media = :media
        WHERE id_abastecimento = :id_abastecimento");
        $sql->bindValue(':id_veiculo', $id_veiculo);
        $sql->bindValue(':odometroinicial', $odometroinicial);
        $sql->bindValue(':combustivel', $combustivel);
        $sql->bindValue(':ultimokm', $ultimokm);
        $sql->bindValue(':km', $km);
        $sql->bindValue(':diferencakm', $diferencakm);
        $sql->bindValue(':hr', $hr);
        $sql->bindValue(':frentista', $frentista);
        $sql->bindValue(':odometrofinal', $odometrofinal);
        $sql->bindValue(':litros', $litros);
        $sql->bindValue(':litros_od', $litros_od);
        $sql->bindValue(':media', $media);
        $sql->bindValue(':id_abastecimento', $id_abastecimento);
        $sql->execute();
       header("Location: ../relatorios/relatoriosHtml.php");
        exit;
    } else {
        header("Location: ../relatorios/alterarAbastecimentoHtml.php");
     exit;
    }

 
