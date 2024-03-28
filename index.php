<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marchiatto Café</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo-univesp.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <script defer src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="main-container">
        <nav class="navbar" style="background: radial-gradient(#d4d4d4, #030303);">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/logo-univesp.png" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top">
                        <span class="titulo">MARCHIATTO CAFÉ</span>
                </a>
                <?php
                    require_once("itens-carrinho.php");
                ?>
            </div>
        </nav>
        <div><h2 class="texto-menu">MENU</h2></div>
        
        <div class="cards row">
            
            <div class="card cor col-md-3 col-5">
                <a href="itens.php" class="link">
                    <h3 class="card-title"> <img src="img/cafe.png" width="'80" height="80" alt="">Café</h3>
                </a>
            </div>
            <div class="card cor col-md-3 col-5">
            <a href="" class="link">
                <h3 class="card-title"> <img src="img/bolos.png" width="'80" height="80" alt="">Bólos</h3>
                </a>
            </div>
            <div class="card cor col-md-3 col-5">
            <a href="" class="link">
                <h3 class="card-title"> <img src="img/paes.png" width="'90" height="90" alt="">Pães</h3>
                </a>
            </div>
            <div class="card cor col-md-3 col-5">
            <a href="" class="link">
                <h3 class="card-title"> <img src="img/caputino.png" width="'90" height="90" alt="">Caputinos</h3>
                </a>
            </div>
            <div class="card cor col-md-3 col-5">
            <a href="" class="link">
              <h3 class="card-title">Café</h3>
              </a>
            </div>
            <div class="card cor col-md-3 col-5">
            <a href="" class="link">
                 <h3 class="card-title">Café</h3>
                 </a>
                </div>

        </div>
    </div>

    <?php
        require_once("rodape.php");
    ?>
    
</body>
</html>