<?php
session_start();
include 'topo.php';
require_once 'config.php';
include 'bd.class.php';
$id = $_SESSION['lid'];
?>
<label><center>Numero RD</label><br>    
<input readonly value="<?= $id ?>"><br><br>  
<form action="01-inicio-de-coleta.php" method="POST">  
<button type="submit">Inicio de Coleta</button>
</form>
<form action="08-saida-do-aterro.php" method="POST">  
<button type="submit" name="acao" value="segunda-viagem">Segunda Viagem</button>
</form>
<form action="13-inicio-retorno-garagem.php" method="POST">
<input hidden name="id" value="<?= $id ?>"type="text"> 
<button type="submit" name="acao" value="retorno-a-garagem">Retornar Garagem</button>
</form>
<form method="POST">
<input hidden name="id" value="<?= $id ?>"type="text">
<button type="submit" name="acao" value="inicio-refeicao">Iniciar Refeição</button>
</form>
<form  method="POST">
<input hidden name="id" value="<?= $id ?>"type="text">
<button type="submit" name="acao" value="inicio-sos">Solicitar S.O.S</button>
</form>
<form  action="16-finalizar.php" method="POST">
<button type="submit">Finalizar RD</button>
</form>
<?php require 'rodape.php'?>