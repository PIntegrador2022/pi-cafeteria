<head>
    <link rel="stylesheet" href="../css/cabecalho.css">
    <link rel="shortcut icon" href="../images/logo.ico" type="image/x-icon">
</head>
<nav class="header">
  
  <a href="#" class="logo">
    <img src="../images/logo.jpg" alt="Marchiatto Café Logo">
  </a>

  <div class="container-fluido">
    <div class="navbar-brand-container">
      <a class="navbar-brand" href="admin.php">Marchiatto Café</a>
    </div>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="admin.php">INÍCIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="clientes.php">CLIENTES</a>
      </li>
      <li class="nav-item">
        <span style="color: #fffff; font-weight: bold;"><?php echo $nomeUser ?></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/logout.php" style="color: red;">Encerrar Sessão</a>
      </li>
    </ul>
  </div>
</nav>