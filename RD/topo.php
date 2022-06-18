<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container-md">
    <div class="container-lg">
      <div class="container-xl">
        <div class="container-xxl">
          <div class="w3-container">
            <div class="w3-bar w3-light-grey">
              <div class="w3-dropdown-hover">
                <button class="w3-button">Menu</button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                  <a href="tabela.php" class="w3-bar-item w3-button">Ver Informações</a>
                  <a href="07-acoesPossiveis.php" class="w3-bar-item w3-button">Atividades</a>
                </div>
              </div>
            </div>
          </div>
</body>
<br>
<body>
<div class="w3-container">

  <?php
        if (isset($_SESSION['msg'])) { ?>
            <div >
                <h1> <?php echo $_SESSION['msg']; ?></h1>
            </div>
        <?php unset($_SESSION['msg']);
        }
        ?>
 
</body>