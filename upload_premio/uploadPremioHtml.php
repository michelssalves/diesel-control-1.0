<?php
include('../login/verifica_login_uploadpremio.php');
if (!isset($_SESSION)) {
    session_start();  
}
require_once('../conexao01.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Importar Dados</title>
	<head>
	<body>
		<h1>Importar Dados</h1>
		
		<form method="POST" action="../controllers/uploadPremio.php" enctype="multipart/form-data">
			<label>Arquivo</label>
			<input type="file" name="arquivo"><br><br>
			<input type="submit" value="Enviar">
		</form>
		
	</body>
</html>