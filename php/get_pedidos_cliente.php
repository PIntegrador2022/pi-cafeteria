<?php
require 'connect.php';

if (isset($_GET['clienteNome'])) {
    $clienteNome = $_GET['clienteNome'];

    try {
        $sql = "SELECT p.id, c.nome AS cliente, pr.nome AS produto, p.preco_produto, DATE_FORMAT(p.data_pedido, '%d/%m/%Y %H:%i:%s') AS data_formatada, p.atendido
                FROM pedidos p
                INNER JOIN clientes c ON p.cliente_id = c.idCliente
                INNER JOIN produtos pr ON p.produto_id = pr.id
                WHERE c.nome = :clienteNome
                ORDER BY p.data_pedido DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':clienteNome', $clienteNome);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Constrói a lista de pedidos do cliente
            $result = "<table class='table-clientes-pedidos' >
                            <thead>
                                <tr> 
                                    <th>ID</th>
                                    <th>Produto</th>
                                    <th>Preço do Produto</th>
                                    <th>Data do Pedido</th>
                                </tr>
                            </thead>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result .= "<tr class='table-selecionada-pedidos'>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['produto'] . "</td>
                                <td>R$ " . number_format($row['preco_produto'], 2, ',', '.') . "</td>
                                <td>" . $row['data_formatada'] . "</td>
                            </tr>";
            }
            $result .= "</table>";
        } else {
            $result = "<p>Nenhum pedido encontrado para este cliente.</p>";
        }

        echo $result;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
