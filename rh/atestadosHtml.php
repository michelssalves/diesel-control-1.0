<?php
include('../verifica_login_rh.php');
if (!isset($_SESSION)) {
    session_start();
}
require_once('../conexao01.php');
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
                    <form class="menu" name="form1" id="form1" action="../controllers/formController.php" method="POST">
                        <div class="field">
                            <div class="control">
                                <label>Usuario Logado</label>
                                <input readonly id="frentista" name="frentista" type="text" class="form-control" value="<?php echo $_SESSION['usuario']; ?>" autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Matricula</label>
                                <select class="form-select" name="matricula" id="matricula" required>
                                    <option value="">Escolha a Matricula</option>
                                    <?php
                                    $ativo = 1;
                                    $sql = $pdo->prepare("SELECT * FROM funcionarios  WHERE ativo = :ativo ORDER BY matricula");
                                    $sql->bindValue(':ativo', $ativo);
                                    $sql->execute();
                                    $fetchAll = $sql->fetchAll();
                                    foreach ($fetchAll as $funcionarios) {
                                        echo '<option value="' . $funcionarios['id_funcionario'] . '">' . $funcionarios['prefixo'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
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
                    <br><button type="submit" class="tn btn-primary btn-lg">Cadastrar</button>
                    </form>
                    <form action="../login/logout.php">
                        <br><button type="submit" class="tn btn-danger btn-lg">SAIR</button>
                    </form>
            </div>
        </div>
    </div>
    </div>
    
</body>
<script src="../js/jquery.js"></script>
</html>
<script src="../js/validaNum.js"></script>
