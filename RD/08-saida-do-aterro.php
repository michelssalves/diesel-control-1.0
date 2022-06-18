<?php
//ini_set('display_errors', 'on');
session_start();
require_once 'config.php';
include 'bd.class.php';
include 'topo.php';
$id = $_SESSION['lid'];
?>
<form method="get">  
<label><center>Numero RD</label><br>    
<input readonly value="<?= $id ?>"><br><br> 
<label>KM SAIDA DO ATERRO</label><br>
<input name="kmSaidaDoAterro" type="number"><br><br>
<input hidden name="id"value="<?= $id ?>"type="text">
<button type="submit" name="acao" value="saida-do-aterro">Gravar</button>
</form>
<?php require 'rodape.php'?>