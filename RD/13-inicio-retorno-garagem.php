<?php
//ini_set('display_errors', 'on');
session_start();
require_once 'config.php';
include 'bd.class.php';
include 'topo.php';
$id = $_SESSION['lid'];
?>
<form method="POST">  
<label><center>Numero RD</label><br>    
<input readonly value="<?= $id ?>"><br><br> 
<label>KM INICIO RETORNO GARAGEM</label><br>
<input name="kmInicioRetornoGaragem" type="text"><br>
<input hidden name="id" value="<?= $id ?>"type="text"><br>
<button type="submit" name="acao" value="inicio-retorno-garagem">Gravar</button>
</form>
<?php require 'rodape.php'?>