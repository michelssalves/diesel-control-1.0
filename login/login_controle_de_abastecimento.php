<?php
session_start();
require '../conexao01.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container-md">
        <div class="container-lg">
            <div class="container-xl">
                <div class="container-xxl">
                    <?php
                    if (isset($_SESSION['msg'])) :
                    ?>
                        <div class="alert alert-danger">
                            <p>ERRO: Usuário ou senha inválidos.</p>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['msg']);
                    ?>
                    <div class="login">
                        <h1>Controle de Abastecimentos</h1>
                    </div>
                    <div class="borda">
                        <div class="col-2">
                            <form class="menu" action="logar_controle_de_abastecimento.php" method="POST">
                                <input name="usuario" name="text" class="input is-large" placeholder="Seu usuario" autofocus=""><br>
                                <br><input name="senha" class="input is-large" type="password" placeholder="Sua senha" autofocus=""><br>

                                <br><button type="submit" class="btn btn-primary btn-lg btn-block">Logar</button>
                            </form>
                            <form action="../index.php" method="POST">
                                <br><button type="submit" class="btn btn-primary btn-lg btn-block">Voltar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
</body>

</html>