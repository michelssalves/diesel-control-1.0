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
<label>KM ABASTECIMENTO</label><br>
<input name="kmAbastecimento" type="text"><br>
<label>LITROS</label><br>
<input name="litros" type="text"><br>
<input hidden name="id" value="<?= $id ?>"type="text"><br>
<button type="submit" name="acao" value="abastecimento">Gravar</button>
</form>
<?php require 'rodape.php'?>