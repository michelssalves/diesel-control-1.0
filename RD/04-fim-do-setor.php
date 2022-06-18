<?php
session_start();
require_once 'config.php';
include 'bd.class.php';
include 'topo.php';
$id = $_SESSION['lid'];
?>
<form method="POST">  
<label><center>Numero RD</label><br>    
<input readonly value="<?= $id ?>"type="text"><br> 
<label>KM FINAL DO SETOR</label><br>    
<input name="kmFinalDoSetor" type="number"><br><br>
<button type="submit" name="acao" value="fim-do-setor">Gravar</button>
<input hidden name="id"  value="<?= $id ?>"type="text">
</form>
<?php require 'rodape.php'?>