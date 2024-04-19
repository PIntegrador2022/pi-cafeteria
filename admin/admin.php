<?php
require '../php/verifica.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">

</head>
<body>
<nav class="header">
  <div class="container-fluid">
    <div class="navbar-brand-container">
      <a class="navbar-brand" href="#">Marchiatto Café</a>
    </div>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <span style="color: #343a40; font-weight: bold;"><?php echo $nomeUser ?></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/logout.php" style="color: red;">Encerrar Sessão</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>
<?php else: header("Location: ../login.php"); endif;?>
