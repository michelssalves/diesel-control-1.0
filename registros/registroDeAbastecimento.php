<?php
session_start();
include '../assets/controllers/config.php';
include '../assets/controllers/formController.php';
$id_funcionario = $_SESSION['id_funcionario'];
$tipo_acesso = $_SESSION['tipo_acesso'] ;
$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];
$matricula = $_SESSION['matricula'];
$token = $_SESSION['token'];
include '../assets/controllers/checkAcess.php';

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="diesel-control-1.0/assets/css/style.css">
</head>

<body>
    <div class="container-sm">
        <?php
        if (isset($_SESSION['msg'])) { ?>
            <div class="alert alert-danger">
                <h1> <?php echo $_SESSION['msg']; ?></h1>
            </div>
        <?php unset($_SESSION['msg']);
        }
        ?>

    </div>
    <div class="container-md">
        <div class="container-lg">
            <div class="container-xl">
                <div class="container-xxl">
                    <form class="menu" method="POST">
                        <div class="field">
                            <div class="control">
                                <input readonly hidden id="frentista" name="frentista" type="text" class="form-control" value="<?= $_SESSION['usuario']; ?>" autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Usuario Logado</label>
                                <input readonly id="nome" name="nome" type="text" class="form-control" value="<?= $_SESSION['nome']; ?>" autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Prefixo</label>
                                <select class="form-select" name="prefixo" id="prefixo" required>
                                    <option value="">Escolha o Prefixo</option>
                                    <?php
                                    $ativado = 1;
                                    $sql = $pdo->prepare("SELECT * FROM veiculos  WHERE status_veiculo = :ativado ORDER BY prefixo");
                                    $sql->bindValue(':ativado', $ativado);
                                    $sql->execute();
                                    $fetchAll = $sql->fetchAll();
                                    foreach ($fetchAll as $prefixo) {
                                        echo '<option value="' . $prefixo['id_veiculo'] . '">' . $prefixo['prefixo'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="bomba" id="bomba" value="GASOLINA" required>
                                    <label class="form-check-label" for="inlineRadio2">GASOLINA</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="bomba" id="bomba" value="BOMBA 01" required>
                                    <label class="form-check-label" for="inlineRadio1">B01</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="bomba" id="bomba" value="BOMBA 02" required>
                                    <label class="form-check-label" for="inlineRadio2">B02</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="bomba" id="bomba" value="BOMBA 03" required>
                                    <label class="form-check-label" for="inlineRadio3">B03</label>
                                </div>
                            </div>

                        </div>
                </div>
                <br>
                <div class="field">
                    <div class="control">
                        <label>Odometro Inicial</label>
                        <br><input onkeyup="somenteNumeros(this), calcularLitrosOd();" id="odometroinicial" name="odometroinicial" type="number" step="0.01" class="form-control" placeholder="Odometro Inicial" autofocus>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Ultimo Km</label>
                        <br><input readonly id="ultimokm" name="ultimokm" type="text" class="form-control" placeholder="Km Anterior" autofocus>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Km</label>
                        <br><input onkeyup="somenteNumeros(this), calcularDiferencaKm(),calcularMedia();" id="km" name="km" type="number" step="0.01" class="form-control" placeholder="Km" autofocus required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Diferenca Km</label>
                        <br><input readonly id="diferencakm" name="diferencakm" type="text" class="form-control" placeholder="Diferenca Km" autofocus>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Ultimo Hr</label>
                        <br><input readonly id="ultimohr" name="ultimohr" type="text" class="form-control" placeholder="Ultimo Hr" autofocus>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Horimetro</label>
                        <br><input onkeyup="somenteNumeros(this), calcularDiferencaHr();" id="hr" name="hr" type="number" class="form-control" step="0.01" placeholder="Hr" autofocus required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Diferenca Hr</label>
                        <br><input readonly id="diferencahr" name="diferencahr" type="text" class="form-control" placeholder="Diferenca Hr" autofocus>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Odometro Final</label>
                        <input onkeyup="somenteNumeros(this), calcularLitrosOd();" id="odometrofinal" name="odometrofinal" type="number" step="0.01" class="form-control" placeholder="Odometro Final" autofocus required>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label>Litros</label>
                        <br><input onkeyup="somenteNumeros(this), calcularMedia();" id="litros" name="litros" type="number" step="0.01" class="form-control" placeholder="Litros" autofocus required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Litros Odometro</label>
                        <br><input readonly id="litros_od" name="litros_od" type="text" class="form-control" placeholder="Litros Odometro" autofocus required>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label>Media do Veiculo</label>
                        <br><input readonly id="media" name="media" type="text" class="form-control" placeholder="Media" autofocus required>
                    </div>
                </div>
                <!–campos ocultos que recebem valores atraves do ajax–>
                    <div class="field">
                        <div class="control">
                            <input readonly hidden type="text" id="id_veiculo" name="id_veiculo" required>
                            <input readonly hidden type="text" id="combustivel" name="combustivel" required>
                            <input readonly hidden type="text" id="numero_equipamento" name="numero_equipamento" required>
                            <input readonly hidden type="text" id="placa" name="placa" required>
                            <input readonly hidden type="text" id="metodo" name="metodo" required>
                        </div>
                    </div>
                    <br><button type="submit" name="acao" value="registrar-abastecimento" class="tn btn-primary btn-lg">Cadastrar</button>
                    </form>
                    
                    <br><a href="logout-v1"><button type="button" class="tn btn-danger btn-lg">SAIR</button></a>

            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Data</th>
                        <th>Placa</th>
                        <th>Prefixo</th>
                        <th>Media</th>
                        <th>Od Ini</th>
                        <th>Od Fin</th>
                        <th>Litros Od</th>
                        <th>Litros</th>
                        <th>Ultimo Km</th>
                        <th>Km</th>
                        <th>Diferenca</th>
                        <th>Hr</th>
                        <th>Frentista</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $pdo->prepare('SELECT a.id_abastecimento, a.data_abastecimento, v.placa, a.odometroinicial,a.odometrofinal, a.litros_od, a.litros, 
                    a.ultimokm,a.km, a.diferencakm, a.hr, a.frentista, v.prefixo, a.media
                    FROM veiculos AS v  
                    JOIN abastecimentos AS a 
                    ON a.id_veiculo = v.id_veiculo
                    ORDER BY data_abastecimento DESC LIMIT 30');
                    $sql->execute();

                    if ($sql->rowCount() > 0) {

                        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                        <?php foreach ($lista as $row) : ?>

                            <tr>
                                <?php $row['id_abastecimento']; ?>
                                <td><?php echo date('d/m/Y H:i:s', strtotime($row['data_abastecimento'])); ?></td>
                                <td><?php echo $row['placa']; ?></td>
                                <td><?php echo $row['prefixo']; ?></td>
                                <td><?php echo $row['media']; ?></td>
                                <td><?php echo $row['odometroinicial']; ?></td>
                                <td><?php echo $row['odometrofinal']; ?></td>
                                <td><?php echo $row['litros_od']; ?></td>
                                <td><?php echo $row['litros']; ?></td>
                                <td><?php echo $row['ultimokm']; ?></td>
                                <td><?php echo $row['km']; ?></td>
                                <td><?php echo $row['diferencakm']; ?></td>
                                <td><?php echo $row['hr']; ?></td>
                                <td><?php echo $row['frentista']; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    <?php
                    } else {
                    ?>
                        <tr>
                            <td colspan="7">Sem Abastecimentos</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="diesel-control-1.0/assets/js/jquery.js"></script>
</html>
<script src="diesel-control-1.0/assets/js/infoAbastecimentoCadastro.js"></script>
<script src="diesel-control-1.0/assets/js/infoEquipamentoCadastro.js"></script>
<script src="diesel-control-1.0/assets/js/validaNum.js"></script>
<script src="diesel-control-1.0/assets/js/calcLitros.js"></script>
<script src="diesel-control-1.0/assets/js/calcKm.js"></script>
<script src="diesel-control-1.0/assets/js/calcHr.js"></script>
<script src="diesel-control-1.0/assets/js/calcMedia.js"></script>