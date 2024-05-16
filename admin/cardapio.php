<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="espaco_cabecalho">

    <?php
    // Incluindo os arquivos necessários
    require '../php/verifica.php';
    require_once 'cabecalho.php';

    if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

        <!-- Exibição de mensagens de sucesso/erro -->
        <div style="text-align: center;">
            <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
                <label style='color: rgb(32, 230, 104); font-weight: bold;'>Produto excluído!</label>
            <?php elseif (isset($_GET['sucesso']) && $_GET['sucesso'] == 2): ?>
                <label style='color: rgb(32, 230, 104); font-weight: bold;'>Produto atualizado!</label>
            <?php elseif (isset($_GET['sucesso']) && $_GET['sucesso'] == 0): ?>
                <label style='color: rgb(223, 0, 0); font-weight: bold;'>Ocorreu um erro!</label>
            <?php endif; ?>
        </div>

        <div> <!-- FORM. P/ PESQUISAR PRODUTO -->
            <form id="formPesquisaProduto" method="post">
                <input style="margin-left:18px; margin-bottom: 15px;" type="text" id="inputPesquisa" name="pesquisar"
                    placeholder="Pesquisar produto...">
                <input type="submit" value="Pesquisar">
            </form>
        </div>

        <div>
            <!-- Criação da tabela principal do cardápio -->
            <?php
            // Incluindo o arquivo de conexão com o banco de dados
            include ("../php/connect.php");

            // Consulta SQL para obter os dados do cardápio
            $sql = "SELECT p.id AS id_produto, p.nome AS produto, p.preco AS preco, c.id AS categoria_id, c.nome AS categoria, p.descricao AS descricao
                    FROM produtos p
                    INNER JOIN categoria c ON p.categoria_id = c.id
                    ORDER BY c.nome, p.nome";

            try {
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {// Verifica se tem produtos no cardápio
                    echo "<table id='tabelaCardapio' class='table-clientes'>
                            <thead>
                                <tr> 
                                    <th>Categoria</th>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>";

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr class='table-selecionada'>
                                <td>" . $row['categoria'] . "</td>
                                <td>" . $row['produto'] . "</td>
                                <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
                                <td>
                                    <form action='../php/deletar_produto.php' method='post' style='display: inline-block;'>
                                        <input type='hidden' name='id_produto' value='" . $row['id_produto'] . "'>
                                        <input class='botaoexcluir' style='width: 50px; margin: 5px;' type='submit' value='Excluir'>
                                    </form>
                                    <button class='botaoatualizar'onclick='openModal(\"myModal" . $row['id_produto'] . "\")'>Atualizar</button>
                                </td>
                            </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p class='table-cardapio'>Nenhum produto encontrado.</p>";
                    $resetSql = "ALTER TABLE produtos AUTO_INCREMENT = 1";
                    $pdo->query($resetSql);
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            ?>
        </div>

        <!-- Formulário pop-up para atualizar produto -->
        <?php
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Consulta SQL para obter todas as categorias
            $sql_categorias = "SELECT id, nome FROM categoria";
            $stmt_categorias = $pdo->query($sql_categorias);

            echo "<div id='myModal" . $row['id_produto'] . "' class='modal'>
        <div class='modal-content'>
            <span class='close' onclick='closeModal(\"myModal" . $row['id_produto'] . "\")'>&times;</span>
            <h2>Atualizar Produto</h2>
            <form action='../php/atualizar_produto.php' method='post'>
                <input type='hidden' name='id_produto' value='" . $row['id_produto'] . "'>
                <label for='novo_nome'>Novo Nome:</label>
                <input type='text' id='novo_nome' name='novo_nome' maxlength='100' value='" . $row['produto'] . "'><br><br>
                <label for='nova_descricao'>Nova Descrição:</label>
                <textarea id='nova_descricao' name='nova_descricao' rows='4' cols='25' maxlength='150' style='resize: vertical;'>" . $row['descricao'] . "</textarea><br><br>
                <label for='nova_categoria'>Nova Categoria:</label>
                <select id='nova_categoria' name='nova_categoria'>";

            // Loop p/ exibir todas as categorias como opções de um dropdown menu
            while ($categoria = $stmt_categorias->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $categoria['id'] . "'" . ($row['categoria_id'] == $categoria['id'] ? " selected" : "") . ">" . $categoria['nome'] . "</option>";
            }

            echo "</select><br><br>
                <label for='novo_preco'>Novo Preço:</label>
                <input type='number' min='1' step='any' id='novo_preco' name='novo_preco' value='" . $row['preco'] . "'><br><br>
                <input type='submit' value='Atualizar'>
            </form>
        </div>
    </div>";
        }
        ?>

        <script>
            // Função para enviar uma solicitação AJAX quando o formulário de pesquisa for enviado
            document.getElementById("formPesquisaProduto").addEventListener("submit", function(event) {
                event.preventDefault(); // Impede o envio do formulário padrão

                // Obtém o valor do campo de pesquisa
                var searchTerm = document.getElementById("inputPesquisa").value;

                // Envia uma solicitação AJAX ao servidor para buscar produtos correspondentes ao termo de pesquisa
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../php/pesquisar_produto.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Atualiza a tabela com os resultados da pesquisa
                        document.getElementById("tabelaCardapio").innerHTML = this.responseText;
                    }
                };
                xhr.send("pesquisar=" + searchTerm); //query de consulta
            });
        </script>


        <script>
            // Abre o modal (pop up)
            function openModal(modalId) {
                var modal = document.getElementById(modalId);
                modal.style.display = "block";
            }

            // Fecha o modal
            function closeModal(modalId) {
                var modal = document.getElementById(modalId);
                modal.style.display = "none";
            }

        </script>

    <?php else:
        header("Location: ../login.php");
    endif; ?>

</body>

</html>