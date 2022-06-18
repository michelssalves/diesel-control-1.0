<?php
session_start();
include 'topo.php';
require_once 'config.php';
include 'bd.class.php';
$id = $_SESSION['lid'];
?>
<form action="07-acoesPossiveis.php" method="POST">
<label><center>Numero RD</label><br>     
<input readonly value="<?= $id ?>"type="text"><br> 
<input hidden name="id" value="<?= $id ?>"type="text"><br> 
<button type="submit" name="acao" value="fim-refeicao" >Finalizar Refeição</button>
</form>
<?php require 'rodape.php'?>