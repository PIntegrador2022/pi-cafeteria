<?php 
    require_once("cabecalho.php");
?>

<body>
<nav class="navbar" style="background: radial-gradient(#f4f6f6, #dbdddd);">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo-univesp.png" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top">
                        MARCHIATTO CAFÉ
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
