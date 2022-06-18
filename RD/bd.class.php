<?php
session_start();
$acao = $_REQUEST['acao'];


if ($acao == "inicio-de-coleta-01") {

    $setor = $_REQUEST['setor'];
    $tabela = 'relatorio_diario';
    $prefixo = $_REQUEST['prefixo'];
    $turno = $_REQUEST['turno'];
    $matricula_motorista = $_REQUEST['matricula_motorista'];
    $km = $_REQUEST['km'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraInicioDeColeta = $datahora1->format("Y-m-d H:i:s");		

    $sql = $pdo->prepare("INSERT INTO $tabela (setor, prefixo, turno, matricula_motorista, km, dataHoraInicioDeColeta) VALUES(:setor, :prefixo, :turno, :matricula_motorista, :km, :dataHoraInicioDeColeta)");
    $sql->bindValue(':setor', $setor);
    $sql->bindValue(':prefixo', $prefixo);
    $sql->bindValue(':turno', $turno);
    $sql->bindValue(':matricula_motorista', $matricula_motorista);
    $sql->bindValue(':km', $km);
    $sql->bindValue(':dataHoraInicioDeColeta', $dataHoraInicioDeColeta);
    $sql->execute(); 
    echo $id = $pdo->lastInsertId();
    $_SESSION['lid'] = $id;
    header("Location: 02-saida-da-garagem.php");
}
if ($acao == "saida-da-garagem") {

    $id = $_REQUEST['id'];
    $tabela = 'relatorio_diario';
    $coletor01 = $_REQUEST['coletor01'];
    $coletor02 = $_REQUEST['coletor02'];
    $coletor03 = $_REQUEST['coletor03'];
    $coletor04 = $_REQUEST['coletor04'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraSaidaDaGaragem	 = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE $tabela SET coletor01=:coletor01, coletor02=:coletor02, coletor03=:coletor03, coletor04=:coletor04, dataHoraSaidaDaGaragem=:dataHoraSaidaDaGaragem WHERE id=:id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':coletor01', $coletor01);
    $sql->bindValue(':coletor02', $coletor02);
    $sql->bindValue(':coletor03', $coletor03);
    $sql->bindValue(':coletor04', $coletor04);
    $sql->bindValue(':dataHoraSaidaDaGaragem', $dataHoraSaidaDaGaragem	);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 03-inicio-do-setor.php");
}
if ($acao == "inicio-do-setor") {
    $id = $_REQUEST['id'];
    $tabela = 'relatorio_diario';
    $kmInicioDeSetor = $_REQUEST['kmInicioDeSetor'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraInicioDeSetor = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE $tabela SET kmInicioDeSetor=:kmInicioDeSetor, dataHoraInicioDeSetor=:dataHoraInicioDeSetor WHERE id= :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmInicioDeSetor', $kmInicioDeSetor);
    $sql->bindValue(':dataHoraInicioDeSetor', $dataHoraInicioDeSetor);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 04-fim-do-setor.php");
}
if ($acao == "fim-do-setor") {
    $id = $_REQUEST['id'];
    $tabela = 'relatorio_diario';
    $kmFinalDoSetor = $_REQUEST['kmFinalDoSetor'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraFinalDeSetor = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE $tabela SET kmFinalDoSetor=:kmFinalDoSetor, dataHoraFinalDeSetor=:dataHoraFinalDeSetor WHERE id= :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmFinalDoSetor', $kmFinalDoSetor);
    $sql->bindValue(':dataHoraFinalDeSetor', $dataHoraFinalDeSetor);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 05-inicio-de-descarga.php");
}
if ($acao == "inicio-de-descarga") {
    $id = $_REQUEST['id'];
    $tabela = 'relatorio_diario';
    $kmInicioDeDescarga = $_REQUEST['kmInicioDeDescarga'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraInicioDeDescarga = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE $tabela SET kmInicioDeDescarga=:kmInicioDeDescarga, dataHoraInicioDeDescarga=:dataHoraInicioDeDescarga WHERE id= :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmInicioDeDescarga', $kmInicioDeDescarga);
    $sql->bindValue(':dataHoraInicioDeDescarga', $dataHoraInicioDeDescarga);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 06-fim-de-descarga.php");
}
if ($acao == "fim-de-descarga") {
    $id = $_REQUEST['id'];
    $tabela = 'relatorio_diario';
    $kmFimDeDescarga = $_REQUEST['kmFimDeDescarga'];
    $peso = $_REQUEST['peso'];
    $ticket = $_REQUEST['ticket'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraFimDeDescarga = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE $tabela SET kmFimDeDescarga=:kmFimDeDescarga, peso=:peso, ticket=:ticket, dataHoraFimDeDescarga=:dataHoraFimDeDescarga WHERE id= :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmFimDeDescarga', $kmFimDeDescarga);
    $sql->bindValue(':peso', $peso);
    $sql->bindValue(':ticket', $ticket);
    $sql->bindValue(':dataHoraFimDeDescarga', $dataHoraFimDeDescarga);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 07-acoesPossiveis.php");
}
if($acao == "saida-do-aterro"){
    $id = $_REQUEST['id'];
    $kmSaidaDoAterro = $_REQUEST['kmSaidaDoAterro'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraSaidaDoAterro = $datahora1->format("Y-m-d H:i:s");		
    $sql = $pdo->prepare("INSERT INTO relatorio_diario_2a_viagem (id1aViagem, kmSaidaDoAterro, dataHoraSaidaDoAterro) VALUES(:id, :kmSaidaDoAterro, :dataHoraSaidaDoAterro)");
    
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmSaidaDoAterro', $kmSaidaDoAterro);
    $sql->bindValue(':dataHoraSaidaDoAterro', $dataHoraSaidaDoAterro);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 09-inicio-do-setor-2a-viagem.php");
}
if ($acao == "inicio-setor-2a-viagem") {
    $id = $_REQUEST['id'];
    $kmInicioSetor2aViagem = $_REQUEST['kmInicioSetor2aViagem'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraInicioSetor2aViagem = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE relatorio_diario_2a_viagem SET kmInicioSetor2aViagem=:kmInicioSetor2aViagem, dataHoraInicioSetor2aViagem=:dataHoraInicioSetor2aViagem WHERE id1aViagem = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmInicioSetor2aViagem', $kmInicioSetor2aViagem);
    $sql->bindValue(':dataHoraInicioSetor2aViagem', $dataHoraInicioSetor2aViagem);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 10-fim-do-setor-2a-viagem.php");
}
if ($acao == "fim-setor-2a-viagem") {
    $id = $_REQUEST['id'];
    $kmFimSetor2aViagem = $_REQUEST['kmFimSetor2aViagem'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraFimSetor2aViagem = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE relatorio_diario_2a_viagem SET kmFimSetor2aViagem=:kmFimSetor2aViagem, 	dataHoraFimSetor2aViagem=:dataHoraFimSetor2aViagem WHERE id1aViagem = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmFimSetor2aViagem', $kmFimSetor2aViagem);
    $sql->bindValue(':dataHoraFimSetor2aViagem', $dataHoraFimSetor2aViagem);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 11-inicio-de-descarga-2a-viagem.php");
}
if ($acao == "inicio-descarga-2a-viagem") {
    $id = $_REQUEST['id'];
    $kmInicioDeDescarga2aViagem = $_REQUEST['kmInicioDeDescarga2aViagem'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraInicioDeDescarga2aViagem = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE relatorio_diario_2a_viagem SET kmInicioDeDescarga2aViagem=:kmInicioDeDescarga2aViagem, dataHoraInicioDeDescarga2aViagem=:dataHoraInicioDeDescarga2aViagem WHERE id1aViagem = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmInicioDeDescarga2aViagem', $kmInicioDeDescarga2aViagem);
    $sql->bindValue(':dataHoraInicioDeDescarga2aViagem', $dataHoraInicioDeDescarga2aViagem);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 12-fim-de-descarga-2a-viagem.php");
}
if ($acao == "fim-descarga-2a-viagem") {

    $id = $_REQUEST['id'];
    $kmFimDeDescarga2aViagem = $_REQUEST['kmFimDeDescarga2aViagem'];
    $peso2aViagem = $_REQUEST['peso2aViagem'];
    $ticket2aViagem = $_REQUEST['ticket2aViagem'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraFimDeDescarga2aViagem = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE relatorio_diario_2a_viagem SET kmFimDeDescarga2aViagem=:kmFimDeDescarga2aViagem, ticket2aViagem=:ticket2aViagem, peso2aViagem=:peso2aViagem, dataHoraFimDeDescarga2aViagem=:dataHoraFimDeDescarga2aViagem WHERE id1aViagem = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmFimDeDescarga2aViagem', $kmFimDeDescarga2aViagem);
    $sql->bindValue(':peso2aViagem', $peso2aViagem);
    $sql->bindValue(':ticket2aViagem', $ticket2aViagem);
    $sql->bindValue(':dataHoraFimDeDescarga2aViagem', $dataHoraFimDeDescarga2aViagem);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 07-acoesPossiveis.php");
}
if ($acao == "inicio-refeicao") {

    $id = $_REQUEST['id'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $inicioRefeicao = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("INSERT INTO refeicao (numeroRd, inicioRefeicao) VALUES(:id, :inicioRefeicao)");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':inicioRefeicao', $inicioRefeicao);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    $_SESSION['msg'] = "<div class='alert alert-warning'>Refeição Inciada!</div>";
    header("Location: 17-finalizar-refeicao.php");
}
if ($acao == "fim-refeicao") {

    $id = $_REQUEST['id'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $fimRefeicao = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE refeicao SET fimRefeicao=:fimRefeicao WHERE numeroRd = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':fimRefeicao', $fimRefeicao);
    $sql->execute(); 
    $_SESSION['status'] = true;
    $_SESSION['lid'] = $id;
    $_SESSION['msg'] = "<div class='alert alert-success'>Refeição Finalizada!</div>";
    header("Location: 07-acoesPossiveis.php");
}
if ($acao == "inicio-sos") {

    $id = $_REQUEST['id'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $inicioSOS = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("INSERT INTO sos (numeroRd, inicioSOS) VALUES(:id, :inicioSOS)");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':inicioSOS', $inicioSOS);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    $_SESSION['msg'] = "<div class='alert alert-warning'>S.O.S Solicitado!</div>";
    header("Location: 18-finalizar-sos.php");
}
if ($acao == "fim-sos") {

    $id = $_REQUEST['id'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $fimSOS = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE sos SET fimSOS=:fimSOS WHERE numeroRd = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':fimSOS', $fimSOS);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    $_SESSION['msg'] = "<div class='alert alert-success'>S.O.S Finalizado!</div>";
    header("Location: 07-acoesPossiveis.php");
}
if ($acao == "inicio-retorno-garagem") {

    $id = $_REQUEST['id'];
    $kmInicioRetornoGaragem = $_REQUEST['kmInicioRetornoGaragem'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraInicioRetornoGaragem = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE relatorio_diario SET kmInicioRetornoGaragem=:kmInicioRetornoGaragem, dataHoraInicioRetornoGaragem=:dataHoraInicioRetornoGaragem WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmInicioRetornoGaragem', $kmInicioRetornoGaragem);
    $sql->bindValue(':dataHoraInicioRetornoGaragem', $dataHoraInicioRetornoGaragem);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 14-fim-retorno-garagem.php");
}
if ($acao == "fim-retorno-garagem") {

    $id = $_REQUEST['id'];
    $kmFimRetornoGaragem = $_REQUEST['kmFimRetornoGaragem'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraFimRetornoGaragem = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE relatorio_diario SET kmFimRetornoGaragem=:kmFimRetornoGaragem, dataHoraFimRetornoGaragem=:dataHoraFimRetornoGaragem WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmFimRetornoGaragem', $kmFimRetornoGaragem);
    $sql->bindValue(':dataHoraFimRetornoGaragem', $dataHoraFimRetornoGaragem);
    $sql->execute(); 
    $_SESSION['lid'] = $id;
    header("Location: 15-abastecimento.php");
}
if ($acao == "abastecimento") {

    $id = $_REQUEST['id'];
    $kmAbastecimento = $_REQUEST['kmAbastecimento'];
    $litros = $_REQUEST['litros'];
    $datahora1 = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dataHoraAbastecimento = $datahora1->format("Y-m-d H:i:s");	

    $sql = $pdo->prepare("UPDATE relatorio_diario SET kmAbastecimento=:kmAbastecimento, litros=:litros, dataHoraAbastecimento=:dataHoraAbastecimento WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':kmAbastecimento', $kmAbastecimento);
    $sql->bindValue(':litros', $litros);
    $sql->bindValue(':dataHoraAbastecimento', $dataHoraAbastecimento);
    $sql->execute(); 
    $_SESSION['lid'] = "";
    header("Location: 16-finalizar.php");
}
?>


