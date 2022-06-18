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
<label>KM INCIO DE DESCARGA</label><br>    
<input name="kmInicioDeDescarga" type="number"><br><br>
<button type="submit" name="acao" value="inicio-de-descarga">Gravar</button>
<input hidden name="id"  value="<?= $id ?>"type="text">
</form>
<?php require 'rodape.php'?>