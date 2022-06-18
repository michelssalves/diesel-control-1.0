<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="w3-container">
<div class="alert alert-success">
    RD FINALIZADA
</div>
   <div>
       <form action="01-inicio-de-coleta.php" method="post">
       <button type="submit">Inciar Nova Rd?</button><br><br>
       </form>
       <form action="../index.php" method="post">
       <button type="submit">Sair</button>
       </form>
   </div>
   </div>
</body>
</html>