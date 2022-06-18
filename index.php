<?php
session_start();
require_once('conexao01.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    if (isset($_SESSION['nao_autenticado'])) :
    ?>
        <div class="alert alert-danger">
            <p>ERRO: Usuário ou senha inválidos.</p>
        </div>
    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>
    <div class="container-md">
        <div class="container-lg">
            <div class="container-xl">
                <div class="container-xxl">
                    <div class="login">
                        <h1>Controles</h1>
                    </div>
                    <div class="borda">
                        <div class="col-xs-4">
                            <form action="login/login_controle_de_abastecimento.php" method="POST">
                                <br><button type="submit" class="btn btn-primary btn-lg btn-block">Controle de Abastecimentos</button>
                            </form>
                            <form  action="login/login_consultar_premio.php" method="POST">
                                <br><button type="submit" class="btn btn-primary btn-lg btn-block">Consultar Premio</button>
                            </form>
                            <form  action="login/login_controle_de_atestados.php" method="POST">
                                <br> <button disabled type="submit" class="btn btn-primary btn-lg btn-block">Cadastro de Atestados</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
</body>
</html>