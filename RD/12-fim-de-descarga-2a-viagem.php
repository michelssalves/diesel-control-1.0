<?php
session_start();
require_once 'config.php';
include 'bd.class.php';
include 'topo.php';
$id = $_SESSION['lid'];
?>
<form method="POST">  
<label><center>Numero RD</label><br>    
<input readonly value="<?= $id ?>"><br><br> 
<label>KM FIM DE DESCARGA</label><br>    
<input name="kmFimDeDescarga2aViagem" type="text"><br>
<label>PESO</label><br>    
<input name="peso2aViagem" type="text"><br>
<label>TICKET</label><br>    
<input name="ticket2aViagem" type="text"><br><br>
<button type="submit" name="acao" value="fim-descarga-2a-viagem">Gravar</button>
<input hidden name="id"  value="<?= $id ?>"type="text">
</form>
<?php require 'rodape.php'?>