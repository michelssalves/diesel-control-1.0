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
$row = [];
$id_abastecimento = filter_input(INPUT_GET, 'id_abastecimento');

if ($id_abastecimento) {

    $sql = $pdo->prepare('SELECT * FROM veiculos AS v  
	JOIN abastecimentos AS a 
	ON a.id_veiculo = v.id_veiculo
	WHERE a.id_abastecimento = :id_abastecimento');
    $sql->bindValue('id_abastecimento', $id_abastecimento);
    $sql->execute();

    if ($sql->rowCount() > 0) {

        $row = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container-sm">

    </div>
    <div class="container-md">
        <div class="container-lg">
            <div class="container-xl">
                <div class="container-xxl">
                    <div class="container-fluid">
                        <div class="field">
                            <div class="control">
                                <form action="../controllers/alterarAbastecimento.php" method="POST">
                                    <div class="field">
                                        <div class="control">
                                            <label>Numero do Equipamento</label>
                                            <br><input id="numero_equipamento" name="numero_equipamento" type="text" class="form-control" placeholder="Numero do Equipamento" value="<?= $row['numero_equipamento']; ?>" autofocus>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label>Combustivel</label>
                                            <br><input id="combustivel" name="combustivel" type="text" class="form-control" placeholder="Combustivel" value="<?= $row['combustivel']; ?>" autofocus>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label>Odometro Inicial</label>
                                            <br><input id="odometroinicial" name="odometroinicial" type="text" class="form-control" placeholder="Odometro Inicial" value="<?= $row['odometroinicial']; ?>" onkeyup="calcularLitrosOd();" autofocus>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label>Odometro Final</label>
                                            <br><input id="odometrofinal" name="odometrofinal" type="text" class="form-control" placeholder="Odometro Final" value="<?= $row['odometrofinal']; ?>" onkeyup="calcularLitrosOd();" autofocus>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label>Litros Frentista</label>
                                            <br><input id="litros" name="litros" type="text" class="form-control" placeholder="Litros" value="<?= $row['litros']; ?>" onkeyup="calcularMedia();" autofocus>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label>Ultimo KM</label>
                                            <br><input id="ultimokm" name="ultimokm" type="text" class="form-control" placeholder="Km Anterior" value="<?= $row['ultimokm']; ?>" onkeyup="calcularDiferencaKm(), calcularMedia();" autofocus>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label>KM</label>
                                            <br><input id="km" name="km" type="text" class="form-control" placeholder="KM" value="<?= $row['km']; ?>" onkeyup="calcularDiferencaKm(), calcularMedia();" autofocus>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label>Km Rodado</label>
                                            <br><input readonly id="diferencakm" 
                                            name="diferencakm" type="text" value="<?= $row['diferencakm'];?>" class="form-control" placeholder="Diferença Km" autofocus>
                                        </div>
                                    </div>    
                                    <div class="field">
                                        <div class="control">
                                            <label>HR</label>
                                            <br><input id="hr" name="hr" type="number" class="form-control" placeholder="HR" value="<?= $row['hr']; ?>" autofocus>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <label>Frentista</label>
                                            <br><input id="frentista" name="frentista" type="text" class="form-control" placeholder="Frentista" value="<?= $row['frentista']; ?>" autofocus>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <label>Media</label>
                                            <br><input readonly id="media" name="media" type="text" class="form-control" placeholder="Media" value="<?= $row['media']; ?>" autofocus>
                                        </div>
                                    </div>
                                        <div class="field">
                                        <div class="control">
                                            <label>Litros Od</label>
                                            <br><input readonly id="litros_od" 
                                            name="litros_od" type="text" value="<?= $row['litros_od'];?>" class="form-control" placeholder="Litros Od" autofocus>
                                        </div>
                                    </div>
                                    <!–campos ocultos para que nao haja alteraçao direta –>
                                        <div class="field">
                                            <div class="control">
                                                <input readonly hidden id="id_veiculo" name="id_veiculo" value="<?= $row['id_veiculo']; ?>" required type="text">
                                                <input  readonly hidden id="id_abastecimento" name="id_abastecimento" value="<?= $row['id_abastecimento']; ?>" required>
                                            </div>
                                        </div>
                                        <br><button type="submit" class="tn btn-primary btn-lg">Alterar Abastecimento</button>
                                </form>
                                <form action="relatoriosHtml.php">
                                    <br><button type="submit" class="tn btn-primary btn-lg">Voltar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <script src="../js/jquery.js"></script>
</body>
</html>
<script src="../js/calcMedia.js"></script>
<script src="../js/calcKm.js"></script>
<script src="../js/calcLitros.js"></script>
