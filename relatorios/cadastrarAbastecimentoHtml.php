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
                    <form name="form1" id="form1" class="menu" action="../controllers/cadastrarAbastecimento.php" method="POST">
                        <div class="field">
                            <div class="control">
                                <label>Prefixo</label>
                                <select class="form-select" name="prefixo" id="prefixo" required>
                                    <option value="">Escolha o Prefixo</option>
                                    <?php
                                    $sql = $pdo->prepare("SELECT * FROM veiculos ORDER BY prefixo");
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
                                    <label  class="form-check-label" for="inlineRadio2">GASOLINA</label>
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
                                <br><input id="ultimokm" name="ultimokm" type="text" class="form-control" placeholder="Km Anterior" autofocus required>
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
                                <br><input id="ultimohr" name="ultimohr" type="text" class="form-control" placeholder="Ultimo Hr" autofocus required>
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
                        <br>
                        <div class="field">
                            <div class="control">
                                <label>Frentista</label><br>
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="frentista" id="frentista" value="CAMPOS" required>
                                    <label class="form-check-label" for="inlineRadio1">CAMPOS</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="frentista" id="frentista" value="DEJAIR" required>
                                    <label class="form-check-label" for="inlineRadio2">DEJAIR</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="frentista" id="frentista" value="FABIANO" required>
                                    <label label class="form-check-label" for="inlineRadio2">FABIANO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="frentista" id="frentista" value="WILLIAN" required>
                                    <label class="form-check-label" for="inlineRadio1">WILLIAN</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="frentista" id="frentista" value="PABLO" required>
                                    <label class="form-check-label" for="inlineRadio2">PABLO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="height: 50px; width: 50px;" class="form-check-input" type="radio" name="frentista" id="frentista" value="SERGIO" required>
                                    <label class="form-check-label" for="inlineRadio3">SERGIO
                                    </label>
                                </div>

                            </div>
                        </div>
                        <br>
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
                                <label>Data  Hora do Abastecimento</label>
                                <br><input  id="data_abastecimento" name="data_abastecimento" type="datetime-local" class="form-control" placeholder="Data Hora do Abastecimento" autofocus required>
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
                                </div>
                                <div class="control">
                                    <input readonly hidden type="text" id="combustivel" name="combustivel" required>
                                </div>
                            </div>
                            <br><button type="submit" class="tn btn-primary btn-lg">Cadastrar</button>
                    </form>
                    <form action="relatoriosHtml.php">
                        <br><button type="submit" class="tn btn-primary btn-lg">Voltar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/jquery.js"></script>
</html>
<script src="../js/infoIdVeiculoCadastro.js"></script>
<script src="../js/validaNum.js"></script>
<script src="../js/calcLitros.js"></script>
<script src="../js/calcKm.js"></script>
<script src="../js/calcHr.js"></script>
<script src="../js/calcMedia.js"></script>