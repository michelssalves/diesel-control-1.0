<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
   <link rel="stylesheet" href="/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<div style="overflow-x:auto;">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nº RD</th>
                <th style="width:100px;">Data</th>
                <th>Setor</th>
                <th>Prefixo</th>
                <th>Turno</th>
                <th>Mot</th>
                <th>Col 01</th>
                <th>Col 02</th>
                <th>Col 03</th>
                <th>Col 04</th>
                <th>Km Garagem</th>
                <th>Km In Setor</th>
                <th>Km Fim Setor</th>
                <th>Km In Desc</th>
                <th>Km Fim Desc</th>
                <th>KG 1A</th>
                <th>TKT 1A</th>
                <th>Km In 2ª</th>
                <th>Km In Setor 2ª</th>
                <th>Km Fim Setor 2ª</th>
                <th>Km In Desc 2ª</th>
                <th>Km Fim Desc 2ª</th>
                <th>Peso 2ª</th>
                <th>Ticket 2ª</th>
                <th>Km In Ret Garag</th>
                <th>Km Fim Ret Garag</th>
                <th>Km Abast</th>
                <th>Litros</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'config.php';
            $sql = $pdo->prepare("SELECT * FROM relatorio_diario as RD
            JOIN relatorio_diario_2a_viagem AS RD2A 
            ON RD.id = RD2A.id1aViagem
            ");
            $sql->execute();
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($lista as $row) : ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td ><?php echo date('d-m-Y', strtotime($row['dataHoraInicioDeColeta'])); ?></td>
                    <td ><?php echo $row['setor']; ?></td>
                    <td ><?php echo $row['prefixo']; ?></td>
                    <td><?php echo $row['turno']; ?></td>
                    <td><?php echo $row['matricula_motorista']; ?></td>
                    <td><?php echo $row['coletor01']; ?></td>
                    <td><?php echo $row['coletor02']; ?></td>
                    <td><?php echo $row['coletor03']; ?></td>
                    <td><?php echo $row['coletor04']; ?></td>
                    <td><?php echo $row['km']; ?></td>
                    <td><?php echo $row['kmInicioDeSetor']; ?></td>
                    <td><?php echo $row['kmFinalDoSetor']; ?></td>
                    <td><?php echo $row['kmInicioDeDescarga']; ?></td>
                    <td><?php echo $row['kmFimDeDescarga']; ?></td>
                    <td><?php echo $row['peso']; ?></td>
                    <td><?php echo $row['ticket']; ?></td>
                    <td><?php echo $row['kmSaidaDoAterro']; ?></td>
                    <td><?php echo $row['kmInicioSetor2aViagem']; ?></td>
                    <td><?php echo $row['kmFimSetor2aViagem']; ?></td>
                    <td><?php echo $row['kmInicioDeDescarga2aViagem']; ?></td>
                    <td><?php echo $row['kmFimDeDescarga2aViagem']; ?></td>
                    <td><?php echo $row['peso2aViagem']; ?></td>
                    <td><?php echo $row['ticket2aViagem']; ?></td>
                    <td><?php echo $row['kmInicioRetornoGaragem']; ?></td>
                    <td><?php echo $row['kmFimRetornoGaragem']; ?></td>
                    <td><?php echo $row['kmAbastecimento']; ?></td>
                    <td><?php echo $row['litros']; ?></td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>
<div>REFEIÇÃO</div>
<div>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nº RD</th>
                <th>Inicio Refeição</th>
                <th>Fim Refeição</th>
                <th>Nº RD</th>
                <th>Inicio SOS</th>
                <th>Fim SOS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'config.php';
            $sql = $pdo->prepare("SELECT * FROM refeicao AS r
            JOIN sos as s
            ON r.numeroRd = s.numeroRd");
            $sql->execute();
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

            ?>
            <?php foreach ($lista as $row) : ?>

                <tr>
                    <td><?php echo $row['numeroRd']; ?></td>
                    <td><?php echo $row['inicioRefeicao']; ?></td>
                    <td><?php echo $row['fimRefeicao']; ?></td>
                    <td><?php echo $row['numeroRd']; ?></td>
                    <td><?php echo $row['inicioSOS']; ?></td>
                    <td><?php echo $row['fimSOS']; ?></td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>
</body>
</html>