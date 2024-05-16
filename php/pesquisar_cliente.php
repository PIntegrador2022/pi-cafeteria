<?php
include("connect.php");
$pesquisar = $_POST['pesquisar'];

$sql = "SELECT idCliente, nome, telefone FROM clientes WHERE nome LIKE '%$pesquisar%'";
try {
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        echo "<thead><tr> 
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Ações</th></tr></thead><tbody>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr class='table-selecionada' ><td>".$row['idCliente']."</td>
            <td>".$row['nome']."</td>
            <td>".$row['telefone']."</td>
            <td>
                <form action='../php/deletar_cliente.php' method='post' style='display: inline-block;'>
                    <input type='hidden' name='idCliente' value='".$row['idCliente']."'>
                    <input class='botaoexcluir'style='width: 50px; margin: 5px;' type='submit' value='Excluir'>
                </form>
                <button class='botaoatualizar'onclick='openModal(\"myModal".$row['idCliente']."\")'>Atualizar</button>
                <button class='botaopedidos' onclick='openPedidosModal(\"" . $row['nome'] . "\")'>Pedidos</button>
                </td></tr>";
        }
        echo "</tbody>";
    } else {
        echo "<p>Nenhum resultado.</p>";
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>