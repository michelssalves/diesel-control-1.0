<?php
//ini_set('display_errors', 'on');
session_start();
require_once 'config.php';
include 'bd.class.php';
include 'topo.php';
$id = $_SESSION['lid'];
?>
<form method="POST">
    <label>Setor</label><br>
    <select required id="setor" name="setor">
        <option>Escolha o Setor</option>
        <?php
        $sql = $pdo->prepare("SELECT * FROM setores ORDER BY setor");
        $sql->execute();
        $fetchAll = $sql->fetchAll();
        foreach ($fetchAll as $setores) {
            echo '<option value="' . $setores['setor'] . '">' . $setores['setor'] . '</option>';
        }
        ?>
    </select><br>
    <label>Prefixo</label><br>
    <select required id="setor" name="prefixo">
        <option>Escolha o Prefixo</option>
        <?php
        $sql = $pdo->prepare("SELECT * FROM equipamentos ORDER BY prefixo");
        $sql->execute();
        $fetchAll = $sql->fetchAll();
        foreach ($fetchAll as $equipamentos) {
            echo '<option value="' . $equipamentos['prefixo'] . '">' . $equipamentos['prefixo'] . '</option>';
        }
        ?>
    </select><br>
    <label>Turno</label><br>
    <select required id="setor" name="turno">
        <option>Escolha o Turno</option>
        <?php
        $sql = $pdo->prepare("SELECT * FROM turno ORDER BY turno");
        $sql->execute();
        $fetchAll = $sql->fetchAll();
        foreach ($fetchAll as $turno) {
            echo '<option value="' . $turno['turno'] . '">' . $turno['turno'] . '</option>';
        }
        ?>
    </select><br>
    <label>Matricula Motorista</label><br>
    <select required id="codigofuncionario" name="codigofuncionario">
        <option>Escolha a Matricula</option>
        <?php
        $sql = $pdo->prepare("SELECT * FROM funcionariosRD  WHERE funcao = 'MOTORISTA' AND setor = 'DOMICILIAR' ORDER BY matricula");
        $sql->execute();
        $fetchAll = $sql->fetchAll();
        foreach ($fetchAll as $funcionario) {
            echo '<option value="' . $funcionario['id'] . '">' . $funcionario['matricula'] . '</option>';
        }
        ?>
    </select><br>
    <input required hidden id="matricula" name="matricula_motorista" type="text">
    <label>Nome</label><br>
    <input required readonly id="nome" name="nome" type="text"><br>
    <label>KM</label><br>
    <input required name="km" type="number"><br><br>
    <button type="submit" name="acao" value="inicio-de-coleta-01">Gravar</button>
</form>
<?php require 'rodape.php' ?>