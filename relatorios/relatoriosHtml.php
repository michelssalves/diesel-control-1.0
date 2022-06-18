<?php
include('../login/verifica_login_relatorio_abastecimento.php');
require_once('../conexao01.php');
if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../js/filtroTabela.js"></script>
</head>

<body>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
                            <form class="d-flex" action="../controllers/export.php" method="POST">
                            <div class="col-xs-4">
                                <input name="data_abastecimento"  type="date" placeholder="Pesquisar" aria-label="Pesquisar">
                                <button class="btn btn-success" type="submit">Exportar Relatório</button>
                            </div> 
                            </form>
                            <form class="d-flex" action="cadastrarAbastecimentoHtml.php">
                                <button class="btn btn-success" type="submit">Cadastrar Abastecimento</button>
                            </form> 
                            <form class="d-flex" action="cadastrarVeiculoHtml.php">
                                <button class="btn btn-success" type="submit">Cadastrar Veiculo</button>
                            </form> 
                            <form class="d-flex" action="alterarVeiculoHtml.php">
                                <button class="btn btn-success" type="submit">Alterar Veiculo</button>
                            </form>  
                                <a href="../login/logout.php" class="btn btn-danger">Sair</a></h2>   
                    </nav>
                            <div id="divConteudo">
                                <table id="tabela" class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Data</th>
                                            <th>Prefixo Sap</th>
                                            <th>Prefixo</th>
                                            <th>Placa</th>
                                            <th>Combustivel</th>
                                            <th>Litros Od</th>
                                            <th>Litros</th>
                                            <th>Km Anterior</th>
                                            <th>Km</th>
                                            <th>Km Rodado</th>
                                            <th>Hr</th>
                                            <th>Frentista</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Media</th>
                                            <th>Setor</th>
                                          
                                        </tr>
                                        <tr>
                                            <th><input  style="width:130px;" type="text" id="txtColuna1" /></th>
                                            <th><input  style="width:50px;" type="text" id="txtColuna2" /></th>
                                            <th><input  style="width:30px;" type="text" id="txtColuna3" /></th>
                                            <th><input  style="width:90px;" type="text" id="txtColuna4" /></th>
                                            <th><input  style="width:90px;" type="text" id="txtColuna5" /></th>
                                            <th><input  style="width:60px;" type="text" id="txtColuna6" /></th>
                                            <th><input  style="width:60px;" type="text" id="txtColuna7" /></th>
                                            <th><input  style="width:60px;" type="text" id="txtColuna8" /></th>
                                            <th><input  style="width:60px;" type="text" id="txtColuna9" /></th>
                                            <th><input  style="width:50px;" type="text" id="txtColuna10" /></th>
                                            <th><input  style="width:50px;" type="text" id="txtColuna11" /></th>
                                            <th><input  style="width:40px;" type="text" id="txtColuna12" /></th>
                                            <th><input  style="width:120px;" type="text" id="txtColuna13" /></th>
                                            <th><input  style="width:50px;" type="text" id="txtColuna14" /></th>
                                            <th><input  style="width:50px;" type="text" id="txtColuna15" /></th>
                                            <th><input  style="width:50px;" type="text" id="txtColuna16" /></th>
                                            <th>Alterar</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                    $sql = $pdo->prepare("SELECT 
                                    a.id_abastecimento, 
                                    a.data_abastecimento, 
                                    v.numero_equipamento, 
                                    v.prefixo, 
                                    v.placa, 
                                    v.combustivel, 
                                    a.litros_od, 
                                    a.litros, 
                                    a.ultimokm, 
                                    a.km, 
                                    a.diferencakm, 
                                    a.hr, 
                                    a.frentista, 
                                    v.marca,
                                    v.modelo,
                                    a.media,
                                    v.setor
                                    FROM veiculos AS v  
                                    JOIN abastecimentos AS a 
                                    ON a.id_veiculo = v.id_veiculo
                                    ORDER BY data_abastecimento DESC LIMIT 1000");
                                    $sql->execute();

                                    if ($sql->rowCount() > 0) {

                                        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                        <?php foreach ($lista as $row) : ?>

                                        <tr>
                                            <?php $row['id_abastecimento']; ?>
                                            <td><?php echo date('d/m/Y H:i:s', strtotime($row['data_abastecimento'])); ?>
                                            </td>
                                            <td><?php echo $row['numero_equipamento']; ?></td>
                                            <td><?php echo $row['prefixo']; ?></td>
                                            <td><?php echo $row['placa']; ?></td>
                                            <td><?php echo $row['combustivel']; ?></td>
                                            <td><?php echo $row['litros_od']; ?></td>
                                            <td><?php echo $row['litros']; ?></td>
                                            <td><?php echo $row['ultimokm']; ?></td>
                                            <td><?php echo $row['km']; ?></td>
                                            <td><?php echo $row['diferencakm']; ?></td>
                                            <td><?php echo $row['hr']; ?></td>
                                            <td><?php echo $row['frentista']; ?></td>
                                            <td><?php echo $row['marca']; ?></td>
                                            <td><?php echo $row['modelo']; ?></td>
                                            <td><?php echo $row['media']; ?></td>
                                            <td><?php echo $row['setor']; ?></td>
                                            <td>
                                                <a
                                                    href="alterarAbastecimentoHtml.php?id_abastecimento=<?= $row['id_abastecimento']; ?>">Alterar</a>
                                            </td>
                                            <td>
                                                <a href="excluir.php?id_abastecimento=<?= $row['id_abastecimento']; ?>"
                                                    onclick="return confirm('Tem certeza que deseja excluir')">Excluir</a>
                                            </td>
                                        </tr>
                                        <?php endforeach;  ?>
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
</body>
</html>