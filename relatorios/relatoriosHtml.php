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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="diesel-control-1.0/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="diesel-control-1.0/assets/js/filtroTabela.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
        <form class="d-flex" method="POST">
            <?php include '../assets/controllers/config.php'; 
                include '../assets/controllers/export.php';
            ?>
            <div class="col-xs-4">
                <input name="data_abastecimento" type="date" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-success" name="acao" value="exportar" type="submit">Exportar Relatório</button>
            </div> 
        </form>
        <form class="d-flex" action="cadastrar-abastecimento-v1">
            <button class="btn btn-success" type="submit">Cadastrar Abastecimento</button>
        </form> 
        <form class="d-flex" action="cadastrar-veiculo-v1">
            <button class="btn btn-success" type="submit">Cadastrar Veiculo</button>
        </form> 
        <form class="d-flex" action="alterar-veiculo-v1">
            <button class="btn btn-success" type="submit">Alterar Veiculo</button>
        </form>  
            <a href="logout-v1" class="btn btn-danger">Sair</a></h2>   
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
                        $sql = $pdo->prepare("SELECT a.id_abastecimento, a.data_abastecimento, v.numero_equipamento, v.prefixo, v.placa, v.combustivel, 
                        a.litros_od, a.litros, a.ultimokm, a.km, a.diferencakm, a.hr, a.frentista, v.marca,v.modelo,a.media,v.setor
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
                        <td><?= date('d/m/Y H:i:s', strtotime($row['data_abastecimento'])); ?>
                        </td>
                        <td><?= $row['numero_equipamento']; ?></td>
                        <td><?= $row['prefixo']; ?></td>
                        <td><?= $row['placa']; ?></td>
                        <td><?= $row['combustivel']; ?></td>
                        <td><?= $row['litros_od']; ?></td>
                        <td><?= $row['litros']; ?></td>
                        <td><?= $row['ultimokm']; ?></td>
                        <td><?= $row['km']; ?></td>
                        <td><?= $row['diferencakm']; ?></td>
                        <td><?= $row['hr']; ?></td>
                        <td><?= $row['frentista']; ?></td>
                        <td><?= $row['marca']; ?></td>
                        <td><?= $row['modelo']; ?></td>
                        <td><?= $row['media']; ?></td>
                        <td><?= $row['setor']; ?></td>
                        <td>
                            <a href="alterar-abastecimento-v1?id_abastecimento=<?= $row['id_abastecimento']; ?>">Alterar</a>
                        </td>
                        <td>
                            <a href="excluir-abastecimento-v1?id_abastecimento=<?= $row['id_abastecimento']; ?>"onclick="return confirm('Tem certeza que deseja excluir')">Excluir</a>
                        </td>
                    </tr>

                    <?php endforeach;  
                
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