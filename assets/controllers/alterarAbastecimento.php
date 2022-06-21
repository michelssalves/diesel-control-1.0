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

$acao = $_REQUEST['acao'];

if($acao == 'alterar-abastecimento'){

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
       header("Location: controle-almoxarifado");
        exit;
    } else {
        header("Location: alterar-abastecimento-v1");
     exit;
    }
}
 
