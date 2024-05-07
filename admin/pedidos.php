<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="espaco_cabecalho">

    <?php
    // Inclua o arquivo de verificação
    require '../php/verifica.php';
    // Inclua o cabeçalho
    require_once 'cabecalho.php';

    if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

        <!-- Exibição de mensagens de sucesso/erro -->
        <div style="text-align: center;">
            <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
                <label style='color: rgb(32, 230, 104); font-weight: bold;'>Pedido excluído!</label>
            <?php elseif (isset($_GET['sucesso']) && $_GET['sucesso'] == 0): ?>
                <label style='color: rgb(223, 0, 0); font-weight: bold;'>Ocorreu um erro!</label>
            <?php endif; ?>
        </div>

        <div>
            <!-- Criação da tabela de pedidos -->
            <?php
            // Inclua o arquivo de conexão com o banco de dados
            include("../php/connect.php");

            // Consulta SQL para obter os pedidos
            $sql = "SELECT p.id, c.nome AS cliente, pr.nome AS produto, p.preco_produto, p.data_pedido
                    FROM pedidos p
                    INNER JOIN clientes c ON p.cliente_id = c.idCliente
                    INNER JOIN produtos pr ON p.produto_id = pr.id
                    ORDER BY p.data_pedido DESC";

            try {
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                    echo "<table id='tabelaPedidos' class='table-clientes'>
                            <thead>
                                <tr> 
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Produto</th>
                                    <th>Preço do Produto</th>
                                    <th>Data do Pedido</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>";

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr class='table-selecionada'>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['cliente'] . "</td>
                                <td>" . $row['produto'] . "</td>
                                <td>R$ " . number_format($row['preco_produto'], 2, ',', '.') . "</td>
                                <td>" . $row['data_pedido'] . "</td>
                                <td>
                                    <form action='../php/deletar_pedido.php' method='post' style='display: inline-block;'>
                                        <input type='hidden' name='id_pedido' value='" . $row['id'] . "'>
                                        <input class='botaoexcluir' style='width: 50px; margin: 5px;' type='submit' value='Excluir'>
                                    </form>
                                </td>
                            </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p class='table-clientes'>Nenhum pedido encontrado.</p>";
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            ?>
        </div>

    <?php else:
        header("Location: ../login.php");
    endif; ?>

</body>

</html>
