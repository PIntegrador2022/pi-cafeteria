<?php 
    require_once("cabecalho.php");
?>

<body>
<nav class="navbar" style="background: radial-gradient(#d4d4d4, #030303);">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo-univesp.png" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top">
                        <span class="titulo">MARCHIATTO CAFÉ</span>
                </a>
                <?php
                     require_once("itens-carrinho.php");
                ?>
            </div>
        </nav>
        <?php
            require_once("rodape.php");
        ?>
</body>
</html>
