<?php
session_start();
require_once 'config.php';
include 'bd.class.php';
include 'topo.php';
$id = $_SESSION['lid'];
?>
<form method="POST">  
<label><center>Numero RD</label><br>     
<input readonly value="<?= $id ?>"><br>
<label>KM FIM DE DESCARGA</label><br>    
<input name="kmFimDeDescarga" type="number"><br>
<label>PESO</label><br>    
<input name="peso" type="number"><br>
<label>TICKET</label><br>    
<input name="ticket" type="number"><br><br>
<button type="submit" name="acao" value="fim-de-descarga">Gravar</button>
<input hidden name="id"  value="<?= $id ?>"type="text">
</form>
<?php require 'rodape.php'?>