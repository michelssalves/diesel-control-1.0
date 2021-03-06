<?php
session_start();
include '../assets/controllers/config.php';
include '../assets/controllers/alterarVeiculo.php';
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
    <link rel="stylesheet" href="diesel-control-1.0/css/style.css">
</head>

<body>
    <div class="container-sm">
       <div class="erro"> 
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        </div>
    </div>
    </div>
    <div class="container-md">
        <div class="container-lg">
            <div class="container-xl">
                <div class="container-xxl">
                    <form class="menu" method="POST">
                        <div class="field">
                            <div class="control">
                                <label>Prefixo</label>
                                <select class="form-select" id="prefixo" required>
                                    <option value="">Escolha o Prefixo</option>
                                    <?php
                                    $sql = $pdo->prepare("SELECT * FROM veiculos  ORDER BY prefixo");
                                    $sql->execute();
                                    $fetchAll = $sql->fetchAll();
                                    foreach ($fetchAll as $prefixo) {
                                        echo '<option value="' . $prefixo['id_veiculo'] . '">' . $prefixo['prefixo'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Prefixo</label>
                                <br><input id="prefixo2" name="prefixo" type="text" class="form-control" placeholder="Prefixo" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Prefixo Sap</label>
                                <br><input id="numero_equipamento" name="numero_equipamento" type="text" class="form-control" placeholder="Numero do Equipamento" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Placa</label>
                                <br><input id="placa" name="placa" type="text" class="form-control" placeholder="Placa" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Descri????o</label>
                                <br><input id="descricao_caminhao" name="descricao_caminhao" type="text" class="form-control" placeholder="Descri????o" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Renavam</label>
                                <input id="renavam" name="renavam" type="text" class="form-control" placeholder="Renavam" autofocus required>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label>Chassi</label>
                                <br><input id="chassi" name="chassi" type="text" class="form-control" placeholder="Chassi" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Numero do Motor</label>
                                <br><input id="numero_motor" name="numero_motor" type="text" class="form-control" placeholder="Numero do Motor" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Ano</label>
                                <br><input id="ano" name="ano" type="text" class="form-control" placeholder="Ano" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Marca</label>
                                <br><input id="marca" name="marca" type="text" class="form-control" placeholder="Marca" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Modelo</label>
                                <br><input id="modelo" name="modelo" type="text" class="form-control" placeholder="Modelo" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Combustivel</label>
                                <br><input id="combustivel" name="combustivel" type="text" class="form-control" placeholder="Combustivel" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Metodo</label>
                                <br><input id="metodo" name="metodo" type="text" class="form-control" placeholder="Metodo" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Setor</label>
                                <br><input  id="setor" name="setor" type="text" class="form-control" placeholder="Setor" autofocus required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label>Status</label>
                                <br><input  id="status_veiculo" name="status_veiculo" type="text" class="form-control" placeholder="Status" autofocus required>
                            </div>
                        </div>
                        <!???campos ocultos que recebem valores atraves do ajax???>
                            <div class="field">
                                <div class="control">
                                    <input readonly hidden type="text" id="id_veiculo" name="id_veiculo" required>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input  readonly hidden type="text" id="prefixoo" name="prefixo" required>
                                </div>
                            </div>
                            <br><button type="submit" name="acao" value="alterar-veiculo" class="tn btn-primary btn-lg">Alterar Veiculo</button>
                    </form>
                    <form action="controle-almoxarifado">
                        <br><button type="submit" class="tn btn-primary btn-lg">Voltar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="diesel-control-1.0/assets/js/jquery.js"></script>
</body>
</html>
<script src="diesel-control-1.0/assets/js/InfoEquipamentoAll.js"></script>
