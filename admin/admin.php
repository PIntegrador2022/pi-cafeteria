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

    <div style="display: flex;"> <!-- DIV p/ fazer a separação dos "contâiners" de ações -->

      <div class="formulario">
        <h1 style="text-align: center;">Cadastrar Cliente</h1>
        <form action="../php/cadastrar_cliente.php" method="post">

          <div class="campo">
            <label for="">Nome:</label>
            <input type="text" name="nome" maxlength="80" required>
          </div>

          <div class="campo">
            <label for="">Telefone: </label>
            <input type="text" name="telefone" maxlength="15" oninput="formatarTelefone(this)">
          </div>

          <!-- TEXTO DE SUCESSO/ERRO NO CADASTRO p/ APARECER NA BOX DE CADASTRO-->
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

      <script> //--- Script simples p/ padronizar a entrada do telefone, pra evitar problemas na base de dados ---

        function formatarTelefone(input) {
          // Remover todos os caracteres que não sejam números
          var numero = input.value.replace(/\D/g, '');

          // Adicionar parênteses para o DDD se o número estiver incompleto
          if (numero.length > 2 && numero.length <= 5) {
            input.value = '(' + numero.substring(0, 2) + ') ' + numero.substring(2);
          } else if (numero.length > 5) {
            // Adicionar parênteses e traço para o DDD e o número principal
            input.value = '(' + numero.substring(0, 2) + ') ' + numero.substring(2, 7) + '-' + numero.substring(7);
          }
        }

      </script>

      <div class="formulario"> <!-- botão p/ fazer novo pedido -->
        <h1 style="text-align: center;">Fazer novo pedido</h1>
        <button id="btnNovoPedido" class="campo" style="display: block; margin: 20px auto;">Novo Pedido</button>
        
        <?php if (isset($_GET['sucesso_pedido']) && $_GET['sucesso_pedido'] == 1): ?>
            <label style='color: rgb(32, 230, 104); display: block; text-align: center;'>Pedido realizado com
              sucesso!</label>
          <?php elseif (isset($_GET['erro_pedido']) && $_GET['erro_pedido'] == 1): ?>
            <label style='color: rgb(223, 0, 0); display: block; text-align: center;'>Ocorreu um erro durante o
              pedido!</label>
          <?php endif; ?>
      
      </div>

      <!-- Modal para fazer novo pedido, os produtos devem aparecer conforme a categoria selecionada -->
      <div id="modalNovoPedido" class="modal-novopedido">
        <div class="modal-content-novopedido">
          <span class="close" onclick="closeNovoPedidoModal()">&times;</span>
          <h2>Fazer novo pedido</h2>
          <form action="../php/salvar_pedido.php" method="post">
            <label for="cliente">Cliente:</label>
            <select id="cliente" name="cliente">
              <?php
              // Consulta SQL para obter os clientes
              $sql_clientes = "SELECT idCliente, nome FROM clientes";
              $stmt_clientes = $pdo->query($sql_clientes);
              while ($cliente = $stmt_clientes->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $cliente['idCliente'] . "'>" . $cliente['nome'] . "</option>";
              }
              ?>
            </select><br><br>
            <label for="categoria">Categoria do Produto:</label>
            <select id="categoria" name="categoria">
              <?php
              // Consulta SQL para obter as categorias de produtos
              $sql_categorias = "SELECT id, nome FROM categoria";
              $stmt_categorias = $pdo->query($sql_categorias);
              while ($categoria = $stmt_categorias->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $categoria['id'] . "'>" . $categoria['nome'] . "</option>";
              }
              ?>
            </select><br><br>
            <label for="produto">Produto:</label>
            <select id="produto" name="produto">
              <!-- Opções de produtos serão preenchidas dinamicamente por JavaScript -->
            </select><br><br>
            <label for="preco_total">Preço Total:</label>
            <input type="text" id="preco_total" name="preco_total" readonly><br><br>
            <input type="submit" value="Realizar Pedido">
          </form>
        </div>
      </div>

      <script>
        // Abre o modal de novo pedido
        function openNovoPedidoModal() {
          var modal = document.getElementById('modalNovoPedido');
          modal.style.display = 'block';
        }

        // Fecha o modal de novo pedido
        function closeNovoPedidoModal() {
          var modal = document.getElementById('modalNovoPedido');
          modal.style.display = 'none';
        }

        // Event listener para abrir o modal quando clicar no botão
        document.getElementById('btnNovoPedido').addEventListener('click', function () {
          openNovoPedidoModal();
        });

        // Define os valores padrão quando a página é carregada
        window.addEventListener('load', function () {
          // Define a categoria padrão como "Selecione a categoria"
          var categoriaDropdown = document.getElementById('categoria');
          categoriaDropdown.selectedIndex = 0;

          // Remove as opções de produtos
          var produtoDropdown = document.getElementById('produto');
          produtoDropdown.innerHTML = '';

          // Adiciona a opção padrão "Selecione o produto"
          var optionPlaceholderProduto = document.createElement('option');
          optionPlaceholderProduto.textContent = "Selecione o produto";
          optionPlaceholderProduto.disabled = true;
          optionPlaceholderProduto.selected = true;
          produtoDropdown.appendChild(optionPlaceholderProduto);

          // Adiciona a opção padrão "Selecione a categoria"
          var optionPlaceholderCategoria = document.createElement('option');
          optionPlaceholderCategoria.textContent = "Selecione a categoria";
          optionPlaceholderCategoria.disabled = true;
          optionPlaceholderCategoria.selected = true;
          categoriaDropdown.appendChild(optionPlaceholderCategoria);

          // Preenche as opções de categoria
          fetch('get_categorias.php')
            .then(response => response.json())
            .then(data => {
              console.log("Categorias recebidas:", data); // Mensagem de depuração

              // Adiciona as opções de categoria
              data.forEach(categoria => {
                var option = document.createElement('option');
                option.value = categoria.id;
                option.textContent = categoria.nome;
                categoriaDropdown.appendChild(option);
              });
            })
            .catch(error => {
              console.error("Erro:", error); // Mensagem de erro
            });
        });

        // Preenche as opções de produto baseado na categoria selecionada
        document.getElementById('categoria').addEventListener('change', function () {
          var categoriaId = this.value;
          fetch('../php/get_produtos.php?categoria_id=' + categoriaId)
            .then(response => response.json())
            .then(data => {
              console.log("Dados recebidos:", data); // Mensagem de depuração
              var produtoDropdown = document.getElementById('produto');
              produtoDropdown.innerHTML = '';

              // Adiciona a opção padrão "Selecione o produto"
              var optionPlaceholder = document.createElement('option');
              optionPlaceholder.textContent = "Selecione o produto";
              optionPlaceholder.disabled = true;
              optionPlaceholder.selected = true;
              produtoDropdown.appendChild(optionPlaceholder);

              // Preenche as opções com os produtos
              data.forEach(produto => {
                var option = document.createElement('option');
                option.value = produto.id;
                option.textContent = produto.nome;
                produtoDropdown.appendChild(option);
              });
            })
            .catch(error => {
              console.error("Erro:", error); // Mensagem de erro
            });
        });


        // Calcula o preço total do produto e preenche o campo correspondente
        document.getElementById('produto').addEventListener('change', function () {
          var produtoId = this.value;
          fetch('../php/get_preco.php?produto_id=' + produtoId)
            .then(response => response.json())
            .then(data => {
              document.getElementById('preco_total').value = data.preco;
            })
            .catch(error => {
              console.error("Erro:", error); // Mensagem de erro
            });
        });

      </script>


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
  header("Location: ../login.php");
endif; ?>