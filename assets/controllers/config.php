<?php
$db_name = 'u338658684_ambiente_de_te';
$db_host= 'localhost';
$db_user= 'u338658684_ambiente_de_te';
$db_pass= 'Cavalo*123';
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>




