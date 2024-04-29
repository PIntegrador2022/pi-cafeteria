<?php
require '../php/verifica.php';
require_once 'cabecalho.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

  <!DOCTYPE html>
  <html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="../css/admin.css">
  </head>

  <body class="espaco_cabecalho">

  <div style = "display: flex;"> <!-- DIV p/ fazer a separação dos "contâiners" de ações -->
  
    <div class="formulario">
      <h1 style="text-align: center;">Cadastrar Cliente</h1>
      <form action="../php/cadastrar_cliente.php" method="post">

        <div class="campo">
          <label for="">Nome:</label>
          <input type="text" name="nome" maxlength="80" required>
        </div>

        <div class="campo">
          <label for="">Telefone: </label>
          <input type="text" name="telefone" maxlength="20">
        </div>

        <!-- TEXTO DE SUCESSO/ERRO NO CADASTRO p/ APARECER NA BOX -->
        <input class="campo" style="display: block; margin: 20px auto;" type="submit" value="Cadastrar Cliente">
        <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
          <label style='color: rgb(32, 230, 104); display: block; text-align: center;'>Cadastro realizado com
            sucesso!</label>
        <?php elseif (isset($_GET['sucesso']) && $_GET['sucesso'] == 0): ?>
          <label style='color: rgb(223, 0, 0); display: block; text-align: center;'>Ocorreu um erro durante o
            cadastro!</label>
        <?php endif; ?>

      </form>
    </div>

    <div class="formulario">
      <h1 style="text-align: center;">Fazer novo pedido</h1>
      <form action="#" method="post">
        <input class="campo" style="display: block; margin: 20px auto;" type="submit" value="EM CONSTRUÇÃO">
      </form>
    </div>

    <div class="formulario">
      <h1 style="text-align: center;">Demais ações em outras caixas</h1>
      <form action="#" method="post">
        <input class="campo" style="display: block; margin: 20px auto;" type="submit" value="EM CONSTRUÇÃO">
      </form>
    </div>

  </div>
  </body>

  </html>
<?php else:
  header("Location: ../login.php"); endif; ?>