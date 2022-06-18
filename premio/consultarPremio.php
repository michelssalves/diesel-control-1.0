<?php
include('../login/verifica_login_premio.php');
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
    <!DOCTYPE html>
    <html>

                            
    <div class="container-md">
        <div class="container-lg">
            <div class="container-xl">
                <div class="container-xxl">
                <div class="container">
    <div class="row">
                
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <a  href="../login/logout.php" class="btn btn-danger">Sair</a></h2>
                                <input  class readonly style="border: none;width: 210px;" type="text" value="Bem Vindo  <?php echo $_SESSION['nome']; ?>">
                            </nav>
                           
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Data Referência</th>
                                        <th>EV01</th>
                                        <th>EV02</th>
                                        <th>EV03</th>
                                        <th>EV04</th>
                                        <th>EV05</th>
                                        <th>EV06</th>
                                        <th>EV07</th>
                                        <th>EV08</th>
                                        <th>EV09</th>
                                        <th>EV10</th>
                                        <th>EV11</th>
                                        <th>EV12</th>
                                        <th>EV13</th>
                                        <th>EV14</th>
                                        <th>EV15</th>
                                        <th>EV16</th>
                                        <th>EV17</th>
                                        <th>EV18</th>
                                        <th>EV19</th>
                                        <th>EV20</th>
                                        <th>Pontos</th>
                                        <th>R$</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id_funcionario = $_SESSION['id_funcionario'];
                                    $sql = $pdo->prepare('SELECT * FROM funcionarios as f
                                        JOIN premio AS p
                                        ON f.id_funcionario = p.id_funcionario 
                                        WHERE f.id_funcionario = :id_funcionario');
                                    $sql->bindValue('id_funcionario', $id_funcionario);
                                    $sql->execute();
                                    if ($sql->rowCount() > 0) {
                                        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                        <?php foreach ($lista as $row) : ?>
                                            <tr>
                                                <td><?php echo $row['data_premio']; ?></td>
                                                <td><?php echo $row['event1']; ?></td>
                                                <td><?php echo $row['event2']; ?></td>
                                                <td><?php echo $row['event3']; ?></td>
                                                <td><?php echo $row['event4']; ?></td>
                                                <td><?php echo $row['event5']; ?></td>
                                                <td><?php echo $row['event6']; ?></td>
                                                <td><?php echo $row['event7']; ?></td>
                                                <td><?php echo $row['event8']; ?></td>
                                                <td><?php echo $row['event9']; ?></td>
                                                <td><?php echo $row['event10']; ?></td>
                                                <td><?php echo $row['event11']; ?></td>
                                                <td><?php echo $row['event12']; ?></td>
                                                <td><?php echo $row['event13']; ?></td>
                                                <td><?php echo $row['event14']; ?></td>
                                                <td><?php echo $row['event15']; ?></td>
                                                <td><?php echo $row['event16']; ?></td>
                                                <td><?php echo $row['event17']; ?></td>
                                                <td><?php echo $row['event18']; ?></td>
                                                <td><?php echo $row['event19']; ?></td>
                                                <td><?php echo $row['event20']; ?></td>
                                                <td><?php echo $row['pontos']; ?></td>
                                                <td><?php echo $row['valor_recebido']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="7">Sem Registros</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <style>
                                table,
                                th,
                                td {
                                    border: 5px solid black;
                                }
                            </style>
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                  <tbody>
                                    <tr>
                                        <td>EVENTO 01</td>
                                        <td>ACIDENTE DE TRÂNSITO COM CULPA</td>
                                        <td>100</td>
                                    </tr>
                                    <td>EVENTO 02</td>
                                    <td>COLETAR EM MARCHA RÉ / CONTRAMÃO</td>
                                    <td>100</td>
                                    </tr>
                                    <td>EVENTO 03</td>
                                    <td>FALTA DO USO DO CINTO DE SEGURANÇA</td>
                                    <td>100</td>
                                    </tr>
                                    <td>EVENTO 04</td>
                                    <td>PRÁTICA DE DIREÇÃO PERIGOSA</td>
                                    <td>100</td>
                                    </tr>
                                    <td>EVENTO 05</td>
                                    <td>DANOS NO EQUIPAMENTO - LEVE</td>
                                    <td>20</td>
                                    </tr>
                                    <td>EVENTO 06</td>
                                    <td>DANOS NO EQUIPAMENTO - MÉDIO</td>
                                    <td>50</td>
                                    </tr>
                                    <td>EVENTO 07</td>
                                    <td>DANOS NO EQUIPAMENTO - GRAVE</td>
                                    <td>100</td>
                                    </tr>
                                    <td>EVENTO 08</td>
                                    <td>MUAMBA</td>
                                    <td>100</td>
                                    </tr>
                                    <td>EVENTO 09</td>
                                    <td>LIMPEZA CABINE / BAU SEM PNEUS</td>
                                    <td>20</td>
                                    </tr>
                                    <td>EVENTO 10</td>
                                    <td>MULTA</td>
                                    <td>50</td>
                                    </tr>
                                    <td>EVENTO 11</td>
                                    <td>PERDA EXTINTOR / TRIANGULO</td>
                                    <td>20</td>
                                    </tr>
                                    <td>EVENTO 12</td>
                                    <td>EXCESSO VELOCIDADE</td>
                                    <td>50</td>
                                    </tr>
                                    <td>EVENTO 13</td>
                                    <td>CAMINHÃO NÃO ABASTECIDO</td>
                                    <td>10</td>
                                    </tr>
                                    <td>EVENTO 14</td>
                                    <td>FALTA EM PLANTÃO</td>
                                    <td>100</td>
                                    </tr>
                                    <td>EVENTO 15</td>
                                    <td>ERRO MACRO</td>
                                    <td>20</td>
                                    </tr>
                                    <td>EVENTO 16</td>
                                    <td>PREENCHIMENTO INCORRETO RD</td>
                                    <td>20</td>
                                    </tr>
                                    <td>EVENTO 17</td>
                                    <td>FALTAS</td>
                                    <td>50</td>
                                    </tr>
                                    <td>EVENTO 18</td>
                                    <td>ATRASO</td>
                                    <td>20</td>
                                    </tr>
                                    <td>EVENTO 19</td>
                                    <td>FÉRIAS</td>
                                    <td>3,33</td>
                                    </tr>
                                    <td>EVENTO 20</td>
                                    <td>ATESTADO</td>
                                    <td>5</td>
                                    </tr>
                                </thead>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/jquery.js"></script>

</html>