<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="espaco_cabecalho">

    <?php
    require '../php/verifica.php';
    require_once 'cabecalho.php';

    if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

        <!--    TEXTO DE SUCESSO/ERRO AO EXCLUIR/ATUALIZAR CLIENTE    -->
        <div style="text-align: center;">
            <script>
                <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
                    document.write("<label style='color: rgb(32, 230, 104); font-weight: bold;'>Cliente excluído!</label>");
                <?php elseif (isset($_GET['sucesso']) && $_GET['sucesso'] == 2): ?>
                    document.write("<label style='color: rgb(32, 230, 104); font-weight: bold;'>Cliente atualizado!</label>");
                    <?php elseif (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
                    document.write("<label style='color: rgb(223, 0, 0); font-weight: bold;'>Não foi possível excluir o cliente pois ele possui pedidos ativos.</label>");
                    <?php elseif (isset($_GET['sucesso']) && $_GET['sucesso'] == 0): ?>
                    document.write("<label style='color: rgb(223, 0, 0); font-weight: bold;'>Ocorreu um erro!</label>");
                <?php endif; ?>
            </script>
        </div>

        <div> <!-- FORM. P/ PESQUISAR CLIENTES -->
            <form id="formPesquisa" method="post">
                <input style="margin-left:18px; margin-bottom: 15px;" type="text" id="inputPesquisa" name="pesquisar"
                    placeholder="Pesquisar cliente...">
                <input type="submit" value="Pesquisar">
            </form>
        </div>


        <div> <!--  CRIAÇÃO DA TABELA PRINCIPAL DE CLIENTES  -->

            <?php
            include ("../php/connect.php");

            $sql = "SELECT idCliente, nome, telefone FROM clientes 
            ORDER BY nome ASC";
            

            try {
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {//  CRIA A TABELA C/ CLIENTES DO BANCO DE DADOS
                    echo "<table id = 'tabelaClientes' class='table-clientes'><thead><tr> 
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Ações</th></tr></thead>";

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr class='table-selecionada'><td>" . $row['idCliente'] . "</td>
                <td>" . $row['nome'] . "</td>
                <td>" . $row['telefone'] . "</td>
                <td>
                    <form action='../php/deletar_cliente.php' method='post' style='display: inline-block;'>
                        <input type='hidden' name='idCliente' value='" . $row['idCliente'] . "'>
                        <input class='botaoexcluir'style='width: 50px; margin: 5px;' type='submit' value='Excluir'>
                    </form>
                    <button class='botaoatualizar'onclick='openModal(\"myModal" . $row['idCliente'] . "\")'>Atualizar</button>
                    <button class='botaopedidos' onclick='openPedidosModal(\"" . $row['nome'] . "\")'>Pedidos</button>
                    </td></tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p class='table-clientes'>Nenhum resultado.</p>";
                    $resetSql = "ALTER TABLE clientes AUTO_INCREMENT = 1";
                    $pdo->query($resetSql);
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            ?>
        </div>

        <!-- Formulário pop-up p/ atualizar cliente -->
        <?php
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div id='myModal" . $row['idCliente'] . "' class='modal'>
                <div class='modal-content'>
                    <span class='close' onclick='closeModal(\"myModal" . $row['idCliente'] . "\")'>&times;</span>
                    <h2>Atualizar Cliente</h2>
                    <form action='../php/atualizar_cliente.php' method='post'>
                        <input type='hidden' name='idCliente' value='" . $row['idCliente'] . "'>
                        <label for='novonome'>Novo Nome:</label>
                        <input type='text' id='novonome' name='novoNome' value='" . $row['nome'] . "'><br><br>
                        <label for='novotelefone'>Novo Telefone:</label>
                        <input type='text' id='novotelefone' name='novoTelefone' maxlength='15' oninput='formatarTelefone(this)' value='" . $row['telefone'] . "'><br><br>
                        <input type='submit' value='Atualizar'>
                        </form>
                </div>
            </div>";
        }
        ?>

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

        <script>
            document.getElementById("formPesquisa").addEventListener("submit", function (event) {
                event.preventDefault();
                var formData = new FormData(this);
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) { //atualizar a tabela principal de acordo c/ a pesquisa
                        document.getElementById("tabelaClientes").innerHTML = this.responseText;
                    }
                };
                xhr.open("POST", "../php/pesquisar_cliente.php", true);
                xhr.send(formData);
            });
        </script>


        <script>
            // Abre o modal
            function openModal(modalId) {
                var modal = document.getElementById(modalId);
                modal.style.display = "block";
                // P/ fechar o modal ao clicar fora dele
                window.addEventListener('click', function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                });
            }

            // Fecha o modal
            function closeModal(modalId) {
                var modal = document.getElementById(modalId);
                modal.style.display = "none";
                window.removeEventListener('click', function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                });
            }
        </script>

        <!-- Modal p exibir os pedidos do cliente -->
        <div id="modalPedidos" class="modal-pedidos">
            <div class="modal-content-pedidos">
                <span class="close" onclick="closePedidosModal()">&times;</span>
                <h2 id="modalTitulo"></h2>
                <div id="pedidosCliente"></div>
            </div>
        </div>

        <script>
            // Função para abrir o modal de pedidos
            function openPedidosModal(clienteNome) {
                var modal = document.getElementById('modalPedidos');
                modal.style.display = "block";
                document.getElementById('modalTitulo').innerText = "Pedidos de " + clienteNome;

                // Faz a AJAX para obter os pedidos do cliente
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById('pedidosCliente').innerHTML = this.responseText;
                    }
                };
                xhr.open("GET", "../php/get_pedidos_cliente.php?clienteNome=" + clienteNome, true);
                xhr.send();

                // Adicione um event listener para fechar o modal ao clicar fora dele
                window.addEventListener('click', function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                });
            }

            // Função para fechar o modal de pedidos
            function closePedidosModal() {
                var modal = document.getElementById('modalPedidos');
                modal.style.display = "none";
                // Remova o event listener para fechar o modal ao clicar fora dele
                window.removeEventListener('click', function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                });
            }

        </script>

    <?php else:
        header("Location: ../login.php");
    endif; ?>

</body>

</html>