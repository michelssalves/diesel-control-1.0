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
<label>KM FIM SETOR 2A VIAGEM</label><br>
<input name="kmFimSetor2aViagem" type="text"><br><br>
<input hidden name="id"  value="<?= $id ?>"type="text">
<button type="submit" name="acao" value="fim-setor-2a-viagem">Gravar</button>
</form>
<?php require 'rodape.php'?>